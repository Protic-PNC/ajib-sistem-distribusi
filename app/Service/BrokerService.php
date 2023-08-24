<?php

namespace App\Service;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BrokerService
{
    private string $serverUrl;
    private string $clientId;
    private string $clientSecret;
    private string $redirectUri;
    private ?array $token = null;
    private ?array $user = null;

    public const SESSION_KEY = 'sso_sid';
    public const SESSION_USER_KEY = 'sso_user';
    public const SCOPE = ["view-user"];

    function __construct()
    {
        $this->serverUrl = env('SSO_SERVER', '');
        $this->clientId = env('SSO_CLIENT_ID', '');
        $this->clientSecret = env('SSO_CLIENT_SECRET', '');
        $this->redirectUri = route('sso.callback');

        if (!$this->serverUrl || !$this->clientId || !$this->clientSecret) {
            throw new Exception('Missing SSO environment variables.');
        }
    }

    /**
     * Generate request url.
     *
     * @param string $command
     * @param array $parameters
     *
     * @return string
     */
    protected function request(string $path, string $method = "GET", mixed $data = [], $token = true)
    {
        $token = $this->getToken();

        $headers = ["Accept" => "application/json"];
        if ($token) $headers["Authorization"] = "Bearer " . $token["access_token"];

        $http = Http::baseUrl($this->serverUrl)->withHeaders($headers)->throw();

        switch ($method) {
            case "GET":
                $res = $http->get($path, $data);
                return $res->json();
                break;
            case "POST":
                $res = $http->asForm()->post($path, $data);
                return $res->json();
                break;
            default:
                throw new Exception("Invalid HTTP method.");
                break;
        }
    }

    /**
     * Generate request url.
     *
     * @param string $command
     * @param array $parameters
     *
     * @return string
     */
    protected function getOAuthUrl(string $command, array $parameters = [])
    {
        $query = '';
        if (!empty($parameters)) {
            $query = '?' . http_build_query($parameters);
        }

        return $this->serverUrl . '/oauth/' . $command . $query;
    }

    public function authorize()
    {
        $state = Str::random(40);
        request()->session()->put("sso_state", $state);

        return redirect($this->getOAuthUrl("authorize", [
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'response_type' => 'code',
            'scope' => implode(",", BrokerService::SCOPE),
            'state' => $state,
            // 'prompt' => '', // "none", "consent", or "login"
        ]));
    }

    public function handleCallback(string $code, string $state)
    {
        $_state = request()->session()->pull("sso_state");

        if (!isset($code) || strlen($code) < 1) {
            return redirect(route('home'))->withErrors(["message" => "Missing callback code."]);
        }

        if ($_state !== $state) {
            return redirect(route('home'))->withErrors(["message" => "Invalid state."]);
        }

        $token = $this->retrieveToken($code);
        $this->setToken($token);
        $this->getUser();

        return redirect(route('dashboard'));
    }

    public function retrieveToken(string $code)
    {
        $data = $this->request('/oauth/token', "POST", [
            'grant_type' => 'authorization_code',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri' => $this->redirectUri,
            'code' => $code,
        ], false);

        return $data;
    }

    private function getToken()
    {
        if (!isset($this->token) || is_null($this->token)) {
            $this->token = request()->session()->get(BrokerService::SESSION_KEY);
        }

        return $this->token;
    }

    private function setToken(mixed $value)
    {
        request()->session()->put(BrokerService::SESSION_KEY, $value);
        $this->token = $value;
    }

    private function setUser(mixed $value)
    {
        request()->session()->put(BrokerService::SESSION_USER_KEY, $value);
        $this->user = $value;
    }

    public function getUser()
    {
        if (is_null($this->user)) {
            $data = $this->request("/api/auth/user");

            $this->setUser($data);
        }

        return $this->user;
    }

    public function logout()
    {
        $this->request('/api/auth/logout');

        request()->session()->remove(BrokerService::SESSION_KEY);
        request()->session()->remove(BrokerService::SESSION_USER_KEY);

        return redirect(route('home'));
    }
}
