<!DOCTYPE html>
<html lang="{{ str_replace(search: '_', replace: '-', subject: app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Elfelejtett Jelszó - {{ config(key: 'app.name', default: 'MALFRAME') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />

    <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus6.webp">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #F1F9FF;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .page-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .auth-container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            min-height: 600px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .form-section {
            flex: 1;
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-content-wrapper {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
        }

        .form-header {
            margin-bottom: 2.5rem;
            text-align: left;
        }

        .form-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 0.75rem;
        }

        .form-description {
            color: #6B7280;
            font-size: 1rem;
            line-height: 1.5;
        }

        .status-message {
            padding: 0.75rem 1rem;
            background-color: #DCFCE7;
            border: 1px solid #86EFAC;
            border-radius: 0.375rem;
            color: #166534;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .input-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
        }

        .input-field {
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

        .input-field:focus {
            outline: none;
            border-color: #322799;
            box-shadow: 0 0 0 3px rgba(50, 39, 153, 0.1);
        }

        .input-field::placeholder {
            color: #9CA3AF;
        }

        .button-group {
            margin-top: 2rem;
        }

        .submit-button {
            width: 100%;
            height: 2.75rem;
            background-color: #322799;
            color: white;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-family: inherit;
            letter-spacing: 0.025em;
        }

        .submit-button:hover:not(:disabled) {
            background-color: #271f6e;
        }

        .submit-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .spinner {
            width: 1rem;
            height: 1rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .footer-links {
            text-align: center;
            font-size: 0.875rem;
        }

        .footer-text {
            color: #6B7280;
        }

        .login-link {
            color: #322799;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }

        .login-link:hover {
            color: #271f6e;
            text-decoration: underline;
        }

        .brand-section {
            flex: 1;
            background: linear-gradient(135deg, #322799 0%, #271f6e 100%);
            color: white;
            padding: 3rem 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .brand-content {
            text-align: center;
            max-width: 300px;
            width: 100%;
        }

        .brand-name {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 3rem;
            letter-spacing: 0.1em;
        }

        .brand-tagline {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            font-size: 1.125rem;
            line-height: 1.6;
        }

        .tagline-item {
            color: rgba(255, 255, 255, 0.9);
            transition: color 0.2s;
        }

        .tagline-item:first-child {
            font-weight: 700;
            color: white;
        }

        .tagline-item:hover {
            color: white;
        }

        .lab-links {
            margin-top: 1rem;
            font-size: 0.875rem;
            text-align: center;
        }

        .error-message {
            color: #DC2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
                min-height: auto;
            }

            .brand-section {
                display: none;
            }

            .form-section {
                padding: 2rem 1.5rem;
            }

            .form-header {
                text-align: center;
            }

            .footer-links {
                text-align: center;
            }

            .main-content {
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            .form-section {
                padding: 1.5rem 1rem;
            }

            .form-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        @include('components.navbar')

        <main class="main-content">
            <div class="auth-container">
                <div class="form-section">
                    <div class="form-content-wrapper">
                        <div class="form-header">
                            <h1 class="form-title">Elfelejtett jelszó</h1>
                            <p class="form-description">
                                Írja be e-mail címét, hogy megkapja a jelszó-visszaállítási linket.
                            </p>
                        </div>

                        @if (session('status'))
                            <div class="status-message">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" class="form">
                            @csrf

                            <div class="input-group">
                                <label for="email" class="input-label">E-mail cím</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    autocomplete="email" autofocus placeholder="email@példa.com" class="input-field"
                                    required />
                                @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="button-group">
                                <button type="submit" class="submit-button">
                                    jelszó visszaállítási link küldése
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