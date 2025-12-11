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

        <link rel="stylesheet" href="{{ asset('/../css/account_settings.css') }}">
    </head>
    <body>
        <div class="page-wrapper">
            @include('components.navbar')
            
            <main class="main-content">
                <div class="page-container text-center d-flex d-flex-column flex-column align-items-center">
                    <h1 class="page-title">Fiók Beállítások</h1>
                    
                    <form action="{{ route('update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mezo">
                            <label for="from-label">Név:</label>
                            <div class="input-wrapper">
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="valtoztat">
                                @error('name') <div>{{ $message }}</div> @enderror
                            </div>
                            
                        </div>
                        
                        <div class="mezo">
                            <label for="from-label">Email:</label>
                            <div class="input-wrapper">
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="valtoztat">
                                @error('email') <div>{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                        <div class="mezo">
                            <label for="from-label">Tell.:</label>
                            <div class="input-wrapper">
                                <input type="tel" name="tell" value="{{ old('tell', $user->tell) }}" class="valtoztat">
                                @error('tell') <div>{{ $message }}</div> @enderror
                            </div>
                            
                        </div>
                        
                        <div class="mezo">
                            <label for="from-label">Cégnév:</label>
                            <div class="input-wrapper">
                                <input type="text" name="c_name" value="{{ old('c_name', $user->c_name) }}" class="valtoztat">
                                @error('c_name') <div>{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                        <div class="mezo">
                            <label for="from-label">Beosztás:</label>
                            <div class="input-wrapper">
                                <input type="text" name="job_title" value="{{ old('job_title', $user->job_title) }}" class="valtoztat">
                                @error('job_title') <div>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mezo">
                            <label for="from-label">Kép link:</label>
                            <div class="input-wrapper">
                                <input type="text" name="piclink" value="{{ old('piclink', $user->piclink) }}" class="valtoztat">
                                @error('piclink') <div>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mezo1">
                            <!--<div class="btn-mezo">
                                <button class="btn" >Profilkép módosítása</button>
                            </div>-->
                            <div class="btn-mentes-mezo">
                                <button class="btn-mentes" type="submit">Módosítás mentése</button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>

            @include('components.footer')
        </div>
    </body>
</html>
