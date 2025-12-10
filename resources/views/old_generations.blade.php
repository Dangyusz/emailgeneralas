<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
            text-align: center;
        }

        .content-placeholder {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            min-height: 400px;
        }

        .content-placeholder p {
            color: #666;
            font-size: 16px;
        }

        .signature-card {
            background: url('https://cdn.hexaverse.hu/Group%202619.svg') center/cover no-repeat;
            border-radius: 20px;
            border: 3px solid #c77fdc;
            padding: 32px 32px 16px 32px;
            display: flex;
            gap: 32px;
            align-items: flex-start;
            position: relative;
            max-width: 900px;
            margin: 20px auto 24px auto;
        }

        .signature-card .card-image {
            flex: 0 0 180px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .signature-card .card-image img {
            width: 160px;
            height: 160px;
            object-fit: contain;
            border-radius: 24px;
            border: 4px solid #fff;
            background: #fff;
            margin-bottom: 12px;
        }

        .signature-card .mailframe-logo {
            font-family: serif;
            font-size: 32px;
            font-style: italic;
            margin-top: 8px;
            letter-spacing: 2px;
        }

        .signature-card .card-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .signature-card .card-title {
            font-size: 48px;
            font-weight: 900;
            color: #99007A;
            font-weight: 600;
            margin-bottom: 8px;
            font-family: "ivypresto-display", serif;
            border-bottom: 3px solid #ae2f94;
            margin-bottom: 16px;
            padding-bottom: 4px;
        }

        .signature-card .card-details {
            font-size: 22px;
            margin-bottom: 12px;
            color: #4D003D;
            border-bottom: 3px solid #ae2f94;
            padding-bottom: 12px;
        }

        .signature-card .card-details a {
            text-decoration: underline;
        }

        .signature-card .card-socials {
            display: flex;
            gap: 16px;
            margin-top: 12px;
        }

        .signature-card .card-socials a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: #fff;
            border: 2px solid #c77fdc;
            font-size: 24px;
            transition: background 0.2s, color 0.2s;
        }

        .signature-card .card-socials a:hover {
            background: #f8e6fa;
        }

        .signature-card .copy-icon {
            position: absolute;
            top: 18px;
            right: 18px;
            font-size: 32px;
            color: #b3b3e6;
            cursor: pointer;
            transition: color 0.2s;
        }

        .signature-card .copy-icon:hover {
            color: #8d3c8f;
        }
    </style>
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