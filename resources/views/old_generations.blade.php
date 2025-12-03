<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Előző Aláírásaim - {{ config('app.name', 'AILFRAME') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />

        {{-- Preload footer background --}}
        <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus6.webp">

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .page-wrapper {
                background-color: #F1F9FF;
                min-height: 100vh;
                font-family: 'Inter', sans-serif;
                display: flex;
                flex-direction: column;
            }

            .main-content {
                flex: 1;
                padding: 40px 24px;
                max-width: 1200px;
                margin: 0 auto;
                width: 100%;
            }

            .page-title {
                font-size: 32px;
                font-weight: 700;
                color: #322799;
                margin-bottom: 24px;
            }

            .content-placeholder {
                background: white;
                border-radius: 12px;
                padding: 40px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
                min-height: 400px;
            }

            .content-placeholder p {
                color: #666;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <div class="page-wrapper">
            @include('components.navbar')
            
            <main class="main-content">
                <h1 class="page-title">Előző Aláírásaim</h1>
                <div class="content-placeholder">
                    <p>Itt az előző aláírások listája fog megjelenni.</p>
                    {{-- A munkatársak ide dolgozhatnak --}}
                </div>
            </main>

            @include('components.footer')
        </div>
    </body>
</html>
