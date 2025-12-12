<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Regisztráció - {{ config('app.name', 'MAILFRAME') }}</title>

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
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #322799;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #322799;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 14px;
            margin-top: 4px;
            display: block;
        }

        .submit-btn {
            background-color: #322799;
            color: white;
            padding: 12px 32px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background-color: #271f7a;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }

        .login-link a {
            color: #322799;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .required {
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        @include('components.navbar')

        <main class="main-content">
            <h1 class="page-title">Regisztráció</h1>
            <div class="content-placeholder">
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

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">Név <span class="required">*</span></label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Teljes név"
                            value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">E-mail cím <span class="required">*</span></label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="email@példa.com"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Jelszó <span class="required">*</span></label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Jelszó" required>
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Jelszó megerősítése <span
                                class="required">*</span></label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Jelszó megerősítése" required>
                    </div>

                    <div class="form-group">
                        <label for="c_name" class="form-label">Cégnév</label>
                        <input type="text" name="c_name" id="c_name"
                            class="form-control @error('c_name') is-invalid @enderror" placeholder="Cégnév (opcionális)"
                            value="{{ old('c_name') }}">
                        @error('c_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="job_title" class="form-label">Munkakör</label>
                        <input type="text" name="job_title" id="job_title"
                            class="form-control @error('job_title') is-invalid @enderror"
                            placeholder="Munkakör (opcionális)" value="{{ old('job_title') }}">
                        @error('job_title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tell" class="form-label">Telefonszám</label>
                        <input type="tel" name="tell" id="tell" class="form-control @error('tell') is-invalid @enderror"
                            placeholder="Telefonszám (opcionális)" value="{{ old('tell') }}">
                        @error('tell')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="submit-btn">Regisztráció</button>
                </form>

                <div class="login-link">
                    Van már fiókja? <a href="{{ route('login') }}">Jelentkezzen be!</a>
                </div>
            </div>
        </main>

        @include('components.footer')
    </div>
</body>

</html>