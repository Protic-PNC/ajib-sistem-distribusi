<x-layout.base>
    <div class="flex items-center justify-center h-full">
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <img src="{{ Vite::asset('resources/images/ajib-logo.png') }}" class="w-48 mx-auto" alt="Ajib Darkah" />
            <a href="{{ route('login') }}"
                class="mt-4 inline-block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                Masuk ke akun Anda
            </a>
        </div>
    </div>
</x-layout.base>
