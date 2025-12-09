<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fiókom - {{ config('app.name', 'AILFRAME') }}</title>

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

            body{
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            .page-wrapper {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                background-color: #F1F9FF;
                font-family: 'Inter', sans-serif;
            }

            .main-content {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                padding-left: 3% !important;
                max-width: 97%;
                /*padding: 80px 24px;*/
            }

            .page-container {
                text-align: center;
                background-color: #E3EEF6;
                max-width: 10000px;
                padding-left: 11%;
                padding-right: 11%;
                width: 97%;
            }

            .page-title {
                text-align: center;
                font-family: 'Inter', sans-serif;
                font-size: 48px;
                font-weight: 700;
                color: #1e293b;
                margin-bottom: 50px;
                margin-top: 10px;
            }

            .page-description {
                font-family: 'Inter', sans-serif;
                font-size: 18px;
                color: #64748b;
            }

            .data-container {
                max-width: 50% !important;
                margin: 0 auto;
                display: flex;
                justify-content: center;
                gap: 32px;

            }

            .data-card {
                background: #F1F9FF;
                border-radius: 16px;
                padding: 40px 40px !important;
                text-align: center;
                flex: 1;
                position: relative;
                /*
                padding-top: 50px;
                margin-bottom: 20px;
                */
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                width: 200%;
                /*
                padding-left: 10%;
                padding-right: 10%;
                */
            }

            .data-badge {
                position: absolute;
                top: -16px;
                left: 50%;
                transform: translateX(-50%);
                background: #1D174B;
                color: white;
                font-family: 'Inter', sans-serif;
                font-weight: 500;
                font-size: 14px;
                padding: 10px 28px;
                border-radius: 25px;
            }

            .data-text {
                font-family: 'Inter', sans-serif;
                font-size: 18px;
                font-weight: 600;
                color: #1D174B;
                line-height: 1.5;
                margin: 0;
                word-wrap: break-word;
            }

            .btn {
                background-color: #1D174B;
                color: white;
                font-family: 'Inter', sans-serif;
                font-size: 16px;
                font-weight: 600;
                border-radius: 25px;
                padding: 10px 20px;
                margin-bottom: 50px;
                box-shadow: 0 4px 12px rgb(0 0 0 / 27%);
                border: 2px;
                border-style: solid;
                border-color: #1D174B;
                transition-duration: 0.3s;
                margin-top: 20px;
            }

            .btn:hover {
                background-color: #ffffffff;
                color: #1D174B;
                cursor: pointer;
                border-style: solid ;
                border-color: #1D174B;
            }

            a {
                text-decoration: none;
                color: inherit;
            }

            .account-img {
                border-radius: 30px;
                border: 2px;
                border-color: #1D174B;
                border-style: solid;
            }

        </style>
    </head>
    <body>
        <div class="page-wrapper">
            @include('components.navbar')
            
            <main class="main-content">
                <div class="page-container text-center d-flex d-flex-column flex-column align-items-center">
                <h1 class="page-title" style="margin-top: 30px">Fiókom</h1>  
                <img class="account-img" src="assets/kavics_szander.png" alt="bena vagy balint" width="200px" height="200px">
                <h1 class="page-title" style="font-size: 40px">Kavics Szander</h1>
                <section class="data-container">
                    <div class="data-card">
                        <span class="data-badge" style="text-align: center !important;">Adatok</span>
                        <p class="data-text">E-mail:</p>
                        <p class="data-text">Tell.:</p>
                        <p class="data-text">Cégnév:</p>
                        <p class="data-text">Beosztás:</p>
                        <p class="data-text">Weboldalak:</p>
                        <p class="data-text">Közösségimédia:</p>
                    </div>
                    
                </section>
                <button class="btn"><a href="account-settings">Adatok módosítása</a></button>
                
            </div>
            </main>

            @include('components.footer')
        </div>
    </body>
</html>
