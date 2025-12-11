<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href='/../style/login.css'>

    <title>Bejelentkezés - {{ config('app.name', 'AILFRAME') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />

    {{-- Preload footer background --}}
    <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus6.webp">


</head>

<body>
    <div class="page-wrapper">
        @include('components.navbar')

        <main class="main-content">
            <h1 class="page-title">Bejelentkezés</h1>
            <div class="content-placeholder">
                <p>Itt a bejelentkezési űrlap fog megjelenni.</p>
                {{-- A munkatársak ide dolgozhatnak --}}
            </div>
        </main>

        @include('components.footer')
    </div>
</body>

</html>