<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fiók Beállítások - {{ config('app.name', 'AILFRAME') }}</title>

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
                max-width: 1200px;
                margin: 0 auto;
                width: 100%;
            }

            .page-title {
                text-align: center;
                font-family: 'Inter', sans-serif;
                font-size: 48px;
                font-weight: 700;
                color: #1e293b;
                margin-bottom: 50px;
                margin-top: 20px;
            }

            .page-container {
                text-align: center;
                background-color: #E3EEF6;
                max-width: 1000px;
                padding-left: 200px;
                padding-right: 200px;
            }



            .data-container {
                max-width: 10200px;
                margin: 0 auto;
                justify-content: center;
                gap: 32px;

            }

            .input-wrapper {
                background: white;
                border-radius: 16px;
                text-align: start;
                flex: 1;
                position: relative;
                margin-bottom: 20px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                width: 500px;
                height: 35px;
                padding: 5px;
                align-items: center;
            }

            .valtoztat{
                font-family: 'Inter', sans-serif;
                font-size: 15px;
                font-weight: 600;
                color: #1D174B;
                line-height: 1.5;
                margin-top: 2px;
                margin-bottom: 2px;
                margin-left: 5px;
                margin-right: 5px;
                word-wrap: break-word;
                border: none;
                background: none;
                width: 95%;
            }

            .valtoztat:focus {
                outline: none;
            }

            label{
                font-family: 'Inter', sans-serif;
                font-size: 18px;
                font-weight: 600;
                color: #1D174B;
                line-height: 1.5;
                margin-bottom: 1px;
                display: block;
                text-align: start;
            }

            .mezo{
                flex-direction: column;
                display: flex;
                justify-content: center;
            }

            .mezo1{
                flex-direction: column;
                display: flex;
                justify-content: center;
            }

            /*/////////////////////////////////////*/
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
                /*padding: 80px 24px;*/
            }

            .page-description {
                font-family: 'Inter', sans-serif;
                font-size: 18px;
                color: #64748b;
            }

            .btn-mezo {
                margin-bottom: 20px;
                display: flex;
                justify-content: center;
                border: none;
            }

            .btn {
                border: none;
                background-color: white;
                color: #1D174B;
                font-family: 'Inter', sans-serif;
                font-size: 16px;
                font-weight: 600;
                border-radius: 16px;
                padding: 5px 10px;
                margin-bottom: 20px;
                box-shadow: 0 4px 12px rgb(0 0 0 / 27%);
                transition-duration: 8ms;
                text-align: center;
                align-items: center;
                flex: 1;
                position: relative;
                max-width: 500px;
                width: 200px;
                height: 200px;
                
            }

            .btn:hover {
                border: none;
                background-color: #1D174B;
                color: white;
                cursor: pointer;
            }

            .btn-mentes-mezo {
                margin-bottom: 20px;
                display: flex;
                justify-content: center;
                border: none;
                max-width: 500px;
            }

            .btn-mentes {
                background-color: #1D174B;
                color: white;
                font-family: 'Inter', sans-serif;
                font-size: 16px;
                font-weight: 600;
                border-radius: 16px;
                padding: 5px 10px;
                margin-bottom: 20px;
                box-shadow: 0 4px 12px rgb(0 0 0 / 27%);
                border: 2px;
                border-style: solid;
                border-color: #1D174B;
                transition-duration: 8ms;
                text-align: center;
                align-items: center;
                flex: 1;
                position: relative;
                max-width: 210px;
                max-height: 100px;
                height: 35px;
            }

            .btn-mentes:hover {
                background-color: white;
                color: #1D174B;
                cursor: pointer;
                border-style: solid ;
                border-color: #1D174B;
            }
            
        </style>
    </head>
    <body>
        <div class="page-wrapper">
            @include('components.navbar')
            
            <main class="main-content">
                <div class="page-container text-center d-flex d-flex-column flex-column align-items-center">
                    <h1 class="page-title">Fiók Beállítások</h1>
                    <section class="data-container">

                        <div class="mezo">
                            <label for="from-label">Név:</label>
                            <div class="input-wrapper">
                                <input type="text" class="valtoztat">
                            </div>
                        </div>

                        <div class="mezo">
                            <label for="from-label">E-mail:</label>
                            <div class="input-wrapper">
                                <input type="text" class="valtoztat">
                            </div>
                        </div>

                        <div class="mezo">
                            <label for="from-label">Cégnév:</label>
                            <div class="input-wrapper">
                                <input type="text" class="valtoztat">
                            </div>
                        </div>

                        <div class="mezo">
                            <label for="from-label">Beosztás:</label>
                            <div class="input-wrapper">
                                <input type="text" class="valtoztat">
                            </div>
                        </div>

                        <div class="mezo">
                            <label for="from-label">Weboldalak:</label>
                            <div class="input-wrapper">
                                <input type="text" class="valtoztat">
                            </div>
                        </div>

                        <div class="mezo">
                            <label for="from-label">Közösségimédia:</label>
                            <div class="input-wrapper">
                                <input type="text" class="valtoztat">
                            </div>
                        </div>
                        
                        <div class="mezo1">
                            <div class="btn-mezo">
                                <button class="btn" >Profilkép módosítása</button>
                            </div>
                            <div class="btn-mentes-mezo">
                                <button class="btn-mentes">Módosítás mentése</button>
                            </div>
                            
                        </div>
                        
                    </section>
                    
                </div>
            </main>

            @include('components.footer')
        </div>
    </body>
</html>
