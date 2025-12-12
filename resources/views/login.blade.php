<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/../style/login.css') }}">

    <title>Bejelentkezés - {{ config('app.name', 'AILFRAME') }}</title>
    <title>Bejelentkezés - {{ config('app.name', 'AILFRAME') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />

    {{-- Preload footer background --}}
    <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus6.webp">
    {{-- Preload footer background --}}
    <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus6.webp">


</head>

<body>
    <div class="page-wrapper">
        @include('components.navbar')

        <main class="main-content">
            <h1 class="page-title">Bejelentkezés</h1>
            <div class="content-placeholder">

                <form method="POST" action="/login">
                    @csrf
                    <div class="mezők">
                        <label for="form-label">Email-cím</label>
                        <input type="email" name="email" class="form-control" placeholder="Email@example.com"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        {{-- A munkatársak ide dolgozhatnak --}}
                    </div>
                    <div class="mez">

                        <label for="form-label">Jelszó <a class="pass" href="/forgot-password">Elfelejtett
                                jelszó?</a></label>

                        <input type="password" name="password" class="form-control
                       @error('password') is-invalid @enderror" placeholder="Jelszó" required>

                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                        <div class="kpozepremenobutton">
                            <a type="submit"><button>Tovább</button></a>
                        </div>



                    </div>



                    <div class="fiok">
                        Nincs még fiókod?<a class="reg" href="/register"><b>Regisztrálj!</b></a></div>

            </div>
            </form>
        </main>

        @include('components.footer')
    </div>
</body>


</html>