<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Regisztráció - {{ config('app.name', 'AILFRAME') }}</title>

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
            text-align: center;
        }

        .content-placeholder {
            background: white;
            padding: 40px;
            min-height: 400px;
            text-align: center;
        }

        .content-placeholder p {
            color: #666;
            font-size: 16px;
        }

        .input div {
            width: 100%;
            height: 2.75rem;
            padding: 0 1rem;
            font-size: 0.875rem;
            border: 1px solid #D1D5DB;
            border-radius: 0.375rem;
            background-color: white;
            transition: all 0.2s;
            font-family: inherit;

        }

        .input-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        @include('components.navbar')

        <main class="main-content">
            <h1 class="page-title">Regisztráció</h1>

            <div class="content-placeholder">
                <div class="input">
                    <div>
                        <label for="emil" class="input-label">E-mail cím</label>
                        <input type="email" name="email" class="form-control" placeholder="e-mail cím" required>
                    </div>

                    <div>
                        <input type="text" name="username" class="form-control" placeholder="felhasználónév" required>
                    </div>

                    <div>
                        <input type="password" name="password" class="form-control" placeholder="jelszó" required>
                    </div>

                    <div>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="jelszó újra" required>
                    </div>
                </div>
            </div>

            <div><a href="/login">Bejelentkezés</a></div>
        </main>

        @include('components.footer')
    </div>
</body>

</html>