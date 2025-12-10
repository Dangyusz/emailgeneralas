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
            font-size: 75px;
            font-weight: 700;
            color: #1D174B;
            margin-bottom: 10px;
            text-align: center;
            font-family: 'Karma';

        }

        .content-placeholder {

            padding-left: 21%;
            padding-right: 21%;
            padding-top: 2.5%;
            padding-bottom: 4%;
            min-height: 50%;
        }

        .content-placeholder p {
            color: #666;
            font-size: 16px;
            background-color: white;

        }

        .input input {
            width: 100%;
            height: 2.75rem;
            padding: 10px;
            font-size: 0.875rem;
            border: 1px solid #352d74ff;
            border-radius: 0.375rem;
            transition: all 0.2s;
            font-family: inherit;
        }

        .input-label {
            font-size: 0.875rem;
            color: #1D174B;
            font-family: 'Inter', sans-serif;
            text-align: left;
        }

        .input div {
            padding-top: 10px;
        }

        .login {
            text-align: center;
            margin-top: 20px;
            font-size: 15px;
            color: #19427A;
        }

        .login a {
            color: #322799;
            font-weight: bold;
            text-decoration: none;
        }

        .login a:hover {
            color: #4338CA;
        }

        .tovabb-button {
            text-align: center;
            position: relative;
            max-height: 50%;
            ;
        }

        .tov-but:hover {
            background: linear-gradient(135deg, #4338CA 0%, #1D174B 100%);
            transform: translateY(-1px);

        }

        button {
            background-color: #322799;
            color: white;
            max-height: 50%;
            padding: 12px 10px;
            font-size: 16px;
            min-width: 200px;
            float: center;
            background: #1D174B;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            /box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);/ /transition: transform 0.2s, box-shadow 0.2s;/ /display: block;/
        }

        .page-wrapper {
            position: relative;
            overflow: hidden;
            z-index: 0;
        }

        .page-wrapper::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 27%;
            height: 100%;
            background:
                linear-gradient(to left, rgba(241, 249, 255, 1), rgba(241, 249, 255, 0)),
                repeating-linear-gradient(145deg,
                    #19427A 0px,
                    #19427A 80px,
                    #F4FCFF 80px,
                    #F4FCFF 120px);
            opacity: 0.50;
            pointer-events: none;
            z-index: -1;
        }

        .page-wrapper::after {
            content: "";
            position: absolute;
            right: 0;
            top: 0;
            width: 27%;
            height: 100%;
            background:
                linear-gradient(to right, rgba(241, 249, 255, 1), rgba(25, 66, 122, 0)),
                repeating-linear-gradient(145deg,
                    #19427A 0px,
                    #19427A 80px,
                    #F4FCFF 80px,
                    #F4FCFF 120px);
            opacity: 0.50;
            pointer-events: none;
            z-index: -1;
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
                        <label for="email" class="input-label">E-mail cím</label>
                        <input type="email" name="email" class="form-control" placeholder="E-mail cím" required>
                    </div>

                    <div>
                        <label for="username" class="input-label">Felhasználónév</label>
                        <input type="text" name="username" class="form-control" placeholder="Felhasználónév" required>
                    </div>

                    <div>
                        <label for="password" class="input-label">Jelszó</label>
                        <input type="password" name="password" class="form-control" placeholder="Jelszó" required>
                    </div>

                    <div>
                        <label for="password_confirmation" class="input-label">Jelszó újra</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Jelszó újra" required>
                    </div>
                </div>

            </div>
            <div class="tovabb-button">
                <a href="/" class="tov-but"><button class="tov-but">Tovább</button></a>
            </div>

            <div class="login">Van már fiókod?<a href="/login">Jelentkezz be!</a></div>


        </main>

        @include('components.footer')
    </div>
</body>

</html>