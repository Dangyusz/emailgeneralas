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

        <link rel="stylesheet" href="{{ asset('/../css/account.css') }}">

        
    </head>
    <body>
        <div class="page-wrapper">
            @include('components.navbar')
            
            <main class="main-content">
                <div class="page-container text-center d-flex d-flex-column flex-column align-items-center">
                <h1 class="page-title" style="margin-top: 30px">Fiókom</h1>  
                <img class="account-img" src="{{ $user->piclink }}" alt="bena vagy balint" width="200px" height="200px">
                <h1 class="page-title" style="font-size: 40px">{{ $user->name }}</h1>
                <section class="data-container">
                    <div class="data-card">
                        <span class="data-badge" style="text-align: center !important;">Adatok</span>
                        <p class="data-text"><b>E-mail:</b> <i>{{ $user->email }}</i></p>
                        <p class="data-text"><b>Tell.:</b> <i>{{ $user->tell }}</i></p>
                        <p class="data-text"><b>Cégnév:</b> <i>{{ $user->c_name }}</i></p>
                        <p class="data-text" style="margin-bottom: 0px"><b>Beosztás:</b> <i>{{ $user->job_title}}</i></p>
                        <!--<p class="data-text"><b>Közösségimédia:</b></p>-->
                    </div>
                    
                </section>
                <button class="btn"><a href="/account_settings/{{ $user->id }}">Adatok módosítása</a></button>
                
            </div>
            </main>

            @include('components.footer')
        </div>
    </body>
</html>
