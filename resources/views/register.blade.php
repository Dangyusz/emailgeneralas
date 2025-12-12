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
    <link rel="stylesheet" href="public/css/style.css">


</head>

<body>
    <div class="page-wrapper">
        @include('components.navbar')

        <main class="main-content">
            <h1 class="page-title">Regisztráció</h1>

            <form action="{{ route('store') }}" method="POST">

                @csrf
                @method('POST')
                <div class="input">
                    <div>
                        <label for="email" class="input-label">E-mail cím</label>
                        <input type="email" name="email" class="form-control" placeholder="E-mail cím" required value="{{ 'email' }}">
                    </div>

                    <div>
                        <label for="username" class="input-label">Felhasználónév</label>
                        <input type="text" name="name" class="form-control" placeholder="Felhasználónév" required value="{{ 'name' }}">
                    </div>

                    <div>
                        <label for="password" class="input-label">Jelszó</label>
                        <input type="password" name="password" class="form-control" placeholder="Jelszó" required value="{{ 'password' }}">
                    </div>

                    <div>
                        <label for="password_confirmation" class="input-label">Jelszó újra</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Jelszó újra" required>
                    </div>
                </div>
                <div class="tovabb-button">
                    <button class="tov-but" type="submit">Regisztráció</button>
                </div>

                <div class="login">Van már fiókod?<a href="/login">Jelentkezz be!</a></div>
            </form>


    </div>


    </main>

    @include('components.footer')
    </div>
</body>

</html>