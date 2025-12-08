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
            font-family: 'Karma';
            color: #19427A;
            font-size: 60px;
        }

        .content-placeholder {

            border-radius: 12px;
            padding-top: none;

            /*box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);*/
            min-height: 400px;
            padding-right: 21%;
            ;
            padding-left: 21%;
            ;

        }

        .content-placeholder p {
            color: #666;
            font-size: 16px;
            padding-right: 200px;
            padding-left: 200px;


        }

        .mezők {
            padding-right: 200px;
            padding-left: 200px;
            width: 100%;
            padding: 12px 16px;
            color: #19427A;
            border-radius: 8px;
            font-size: 16px;
        }

        .mez {
            color: #19427A;
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
            margin-left: 10px;
            margin-right: 10px;
            display: ;
        }

        .but {
            text-align: center;
            float: center;
            position: relative;
            max-height: 50%;
            width: 200px%;
        }

        button {
            background-color: #19427A;
            color: white;
            max-height: 50%;
            width: 200px%;
            padding: 12px 24px;
            font-size: 16px;
            min-width: 200px;
            margin-top: 50px;
            float: center;

            border: none;
            border-radius: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            /*box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);*/
            /*transition: transform 0.2s, box-shadow 0.2s;*/
            /*display: block;*/
        }

        button:hover {
            background: linear-gradient(135deg, #4F709B 0%, #19427A 100%);
        }

        .fiok {
            color: #19427A;
            text-align: center;
            padding-top: 50px;
        }

        .reg {
            text-decoration: none;
            color: #322799;
        }

        .reg:hover {
            color: #10094bff;

        }

        .pass {
            text-align: right;
            float: right;
            color: #322799;
        }

        .pass:hover {
            color: #10094bff;
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

                    <label for="form-label">Jelszó <a class="pass" href="/forgot-password">Elfelejtett
                            jelszó?</a></label>

                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Jelszó" required>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="but">
                    <a href="/"><button>Tovább</button></a>
                </div>

                <div class="fiok">
                    Nincs még fiókod?<a class="reg" href="/register"><b>Regisztrálj!</b></a></div>

            </div>
        </main>

        @include('components.footer')
    </div>
</body>

</html>