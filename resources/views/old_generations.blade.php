<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="style.css">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Előző Aláírásaim - {{ config('app.name', 'AILFRAME') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />

    {{-- Preload footer background --}}
    <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus6.webp">
</head>

<body>
    <div class="page-wrapper">
        @include('components.navbar')

        <main class="main-content">
            <h1 class="page-title">Előző Aláírásaim</h1>
            <div class="signature-card">
                <table cellpadding="0" cellspacing="0" border="0"
                    style="font-family: Inter, Arial, sans-serif; border-radius:6px; padding:14px; max-width:600px;">
                    <tr>
                        <td style="vertical-align:top; padding-right:12px;">
                            <img id="cardImage" src="__IMG__" width="100" height="100" alt="Profile"
                                style="display:block; border-radius:8px; border:2px solid #f7f7f7;" />
                        </td>
                        <td style="vertical-align:top;">
                            <div id="cardTitle"
                                style="font-family: 'ivypresto-display', Georgia, serif; font-size:24px; color:#b02a86; font-weight:700; margin-bottom:6px;">
                                __TITLE__</div>
                            <div style="font-size:14px; color:#444; line-height:1.5;">
                                <strong>Email:</strong> <a id="cardEmail" href="mailto:__EMAIL__"
                                    style="color:#b02a86; text-decoration:underline;">__EMAIL__</a><br />
                                <strong>Beosztás:</strong> <span id="cardPosition">__POSITION__</span><br />
                                <strong>Web:</strong> <a id="cardWebsite" href="__WEBSITE_HREF__"
                                    style="color:#b02a86; text-decoration:underline;">__WEBSITE_TEXT__</a>
                            </div>

                        </td>
                    </tr>
                </table>
            </div>
            <div class="signature-card">
                <table cellpadding="0" cellspacing="0" border="0"
                    style="font-family: Inter, Arial, sans-serif; border-radius:6px; padding:14px; max-width:600px;">
                    <tr>
                        <td style="vertical-align:top; padding-right:12px;">
                            <img id="cardImage" src="__IMG__" width="100" height="100" alt="Profile"
                                style="display:block; border-radius:8px; border:2px solid #f7f7f7;" />
                        </td>
                        <td style="vertical-align:top;">
                            <div id="cardTitle"
                                style="font-family: 'ivypresto-display', Georgia, serif; font-size:24px; color:#b02a86; font-weight:700; margin-bottom:6px;">
                                __TITLE__</div>
                            <div style="font-size:14px; color:#444; line-height:1.5;">
                                <strong>Email:</strong> <a id="cardEmail" href="mailto:__EMAIL__"
                                    style="color:#b02a86; text-decoration:underline;">__EMAIL__</a><br />
                                <strong>Beosztás:</strong> <span id="cardPosition">__POSITION__</span><br />
                                <strong>Web:</strong> <a id="cardWebsite" href="__WEBSITE_HREF__"
                                    style="color:#b02a86; text-decoration:underline;">__WEBSITE_TEXT__</a>
                            </div>

                        </td>
                    </tr>
                </table>
            </div>
    </div>
    </main>

    @include('components.footer')
    </div>
</body>

</html>