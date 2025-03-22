<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body
        x-data="{ object: true }"
        x-init="function() { this.object = false }"
        x-cloak
        class="min-h-screen max-w-screen-2xl mx-auto bg-white dark:bg-zinc-800"
    >
        <flux:main>
            {{ $slot }}
        </flux:main>

        @persist('toast')
            <flux:toast />
        @endpersist

        @fluxScripts
    </body>
</html>
