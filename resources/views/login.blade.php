<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bejelentkezés - {{ config('app.name', 'AILFRAME') }}</title>

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
            font-size: 50px;
            font-weight: 700;
            color: #322799;
            margin-bottom: 24px;
            text-align: center;
        }

        .content-placeholder {
            background: #F1F9FF;
            border-radius: 12px;
            padding-top: none;
            padding: 40px;
            /*box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);*/
            min-height: 400px;

        }

        .content-placeholder p {
            color: #666;
            font-size: 16px;
        }

        .mezők {

            width: 100%;
            padding: 12px 16px;

            border-radius: 8px;
            font-size: 16px;
        }

        .mez {

            width: 100%;
            padding: 12px 16px;

            border-radius: 8px;
            font-size: 16px;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #E0E0E0;
            border-radius: 8px;
            font-size: 16px;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s ease;
        }

        h4 {
            text-align: right;
            color: #322799;
        }

        .but {
            text-align: center;
            float: center;
            position: relative;
            max-height: 50%;
            width: 200px%;
        }

        button {
            background-color: #322799;
            color: white;
            max-height: 50%;
            width: 200px%;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        @include('components.navbar')

        <main class="main-content">
            <h1 class="page-title">Bejelentkezés</h1>
            <div class="content-placeholder">
                <div class="mezők">
                    <label for="form-label">Email-cím</label>
                    <input type="email" name="email" class="form-control" placeholder="Email@example.com" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    {{-- A munkatársak ide dolgozhatnak --}}
                </div>
                <div class="mez">
                    <label for="form-label">Jelszó</label>
                    <a href="/forgot-password">
                        <h4>Elfelejtett jelszó?</h4>
                    </a>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Jelszó" required>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="but">
                    <a href="/"><button>Tovább</button></a>
                </div>
            </div>
        </main>

        @include('components.footer')
    </div>
</body>

</html>