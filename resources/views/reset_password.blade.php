<!DOCTYPE html>
<html lang="{{ str_replace(search: '_', replace: '-', subject: app()->getLocale()) }}">
<link rel="stylesheet" href="/forgstyle.css">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jelszó Visszaállítás - {{ config(key: 'app.name', default: 'MALFRAME') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />

    <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus6.webp">
</head>

<body>
    <div class="page-wrapper">
        @include('components.navbar')

        <main class="main-content2">
            <div class="auth-container">
                <div class="form-section">
                    <div class="form-content-wrapper">
                        <div class="form-header">
                            <h1 class="form-title">Jelszó visszaállítás</h1>
                            <p class="form-description">
                                Adja meg új jelszavát.
                            </p>
                        </div>

                        @if (session('success'))
                            <div
                                style="padding: 1rem; margin-bottom: 1rem; background-color: #d4edda; color: #155724; border-radius: 0.25rem;">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div
                                style="padding: 1rem; margin-bottom: 1rem; background-color: #f8d7da; color: #721c24; border-radius: 0.25rem;">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div
                                style="padding: 1rem; margin-bottom: 1rem; background-color: #f8d7da; color: #721c24; border-radius: 0.25rem;">
                                <ul style="margin: 0; padding-left: 1.25rem;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}" class="form">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="input-group">
                                <label for="email" class="input-label">E-mail cím</label>
                                <input id="email" type="email" name="email" value="{{ old('email', $email) }}"
                                    autocomplete="email" autofocus placeholder="email@példa.com" class="input-field"
                                    required />
                            </div>

                            <div class="input-group">
                                <label for="password" class="input-label">Új jelszó</label>
                                <input id="password" type="password" name="password" placeholder="Új jelszó"
                                    class="input-field" required />
                            </div>

                            <div class="input-group">
                                <label for="password_confirmation" class="input-label">Jelszó megerősítése</label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    placeholder="Jelszó megerősítése" class="input-field" required />
                            </div>

                            <div class="button-group">
                                <button type="submit" class="submit-button">
                                    Jelszó megváltoztatása
                                </button>
                            </div>
                        </form>

                        <div class="lab-links">
                            <span class="footer-text">Vagy térjen vissza a </span>
                            <a href="{{ route('login') }}" class="login-link">bejelentkezéshez</a>
                        </div>
                    </div>
                </div>

                <div class="brand-section">
                    <div class="brand-content">
                        <img style="height: 225px" width="auto" src="https://cdn.hexaverse.hu/erasmus7.webp" alt="">
                        <h2 class="brand-name">MAILFRAME</h2>
                    </div>
                </div>
            </div>
        </main>

        @include('components.footer')
    </div>
</body>

</html>