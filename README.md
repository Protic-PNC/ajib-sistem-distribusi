# Ajib Template

## Instructions

1. Clone this repository.

   Using SSO
   ```shell
   git clone --depth 1 https://github.com/Protic-PNC/ajib-template
   git remote remove origin
   ```

   Without SSO
   ```shell
   git clone -b flowbite --depth 1 https://github.com/Protic-PNC/ajib-template
   git remote remove origin
   ```

2. Install Composer dependencies.
   ```shell
   composer install
   ```
3. Install NPM dependencies.
   ```shell
   npm install
   ```
4. Copy env file and configure it.
   ```shell
   cp .env.example .env
   ```
5. Run Vite dev server in another terminal session.
   ```shell
   npm run dev
   ```
6. Start Laravel.
   ```shell
   php artisan serve
   ```

## References

### Styling

This template utilizes [Tailwind CSS](https://tailwindcss.com) and [Flowbite](https://flowbite.com) for components. Please refer to the following documentation for more details:

1. [Tailwind CSS Documentation](https://tailwindcss.com/docs)
1. [Flowbite Documentation](https://flowbite.com/docs)

### Icons

[Phosphor Icons](https://phosphoricons.com/) is used in this template, leveraging the [blade-phosphor-icons](https://github.com/codeat3/blade-phosphor-icons) library. Here are some usage examples:

Using blade component:

```blade
<x-phosphor-bell class="text-red-500" />
```

Or using the `@svg` directive:

```blade
@svg("phosphor-bell", "text-red-500")
```

For a complete list of available icons, please visit the [Phosphor Icons website](https://phosphoricons.com). You can find detailed documentation for the blade-phosphor-icons library [here](https://github.com/codeat3/blade-phosphor-icons#usage).
