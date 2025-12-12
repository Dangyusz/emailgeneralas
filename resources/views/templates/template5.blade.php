<div class="signature-card">
    <table cellpadding="0" cellspacing="0" border="0" style="font-family: Inter, Arial, sans-serif; border-radius:6px; padding:14px; max-width:600px;">
        <tr>
            <td style="vertical-align:top; padding-right:12px;">
                <img id="cardImage" src="__IMG__" width="100" height="100" alt="Profile" style="display:block; border-radius:8px; border:2px solid #f7f7f7;" />
            </td>
            <td style="vertical-align:top;">
                <div id="cardTitle" style="font-family: 'ivypresto-display', Georgia, serif; font-size:24px; color:#b02a86; font-weight:700; margin-bottom:6px;">__TITLE__</div>
                <div style="font-size:14px; color:#444; line-height:1.5;">
                    <strong>Email:</strong> <a id="cardEmail" href="mailto:__EMAIL__" style="color:#b02a86; text-decoration:underline;">__EMAIL__</a><br />
                    <strong>Beosztás:</strong> <span id="cardPosition">__POSITION__</span><br />
                    <strong>Web:</strong> <a id="cardWebsite" href="__WEBSITE_HREF__" style="color:#b02a86; text-decoration:underline;">__WEBSITE_TEXT__</a>
                </div>
            </td>
        </tr>
    </table>
</div>
<style>
    .tpl-5 {
        background: url('https://cdn.hexaverse.hu/Group%202620.svg') right center/contain no-repeat;
        border-radius: 20px;
        padding: 32px;
        max-width: 900px;
        margin: 40px auto;
        overflow: hidden;
    }
    .tpl-5 .inner-card { background: #f4fff9; border-radius: 12px; padding: 24px; border: 2px solid #9fd6b8; }
    .tpl-5 .content-wrapper { display: flex; gap: 24px; align-items: flex-start; }
    .tpl-5 .left-col { flex: 0 0 180px; text-align: center; }
    .tpl-5 .right-col { flex: 1; }
    .tpl-5 img { width: 150px; height: 150px; border-radius: 50%; display: block; margin: 0 auto 12px; }
    .tpl-5 .logo { font-family: serif; font-size: 28px; font-style: italic; letter-spacing: 1px; }
    .tpl-5 .card-title { font-family: 'ivypresto-display', Georgia, serif; font-size: 30px; color: #1f6a4a; font-weight: 700; margin-bottom: 8px; }
    .tpl-5 .card-details { font-size: 15px; color: #224; line-height: 1.8; margin-bottom: 12px; }
    .tpl-5 .socials { display: flex; gap: 12px; margin-top: 12px; }
    .tpl-5 .socials a { display: inline-flex; width: 36px; height: 36px; border-radius: 8px; background: #fff; border: 2px solid #9fd6b8; align-items: center; justify-content: center; }
</style>

<div class="signature-card tpl-5">
    <div class="inner-card">
        <div class="content-wrapper">
            <div class="left-col">
                <img id="cardImage" src="__IMG__" alt="Profile" />
                <div class="logo">MAILFRAME</div>
            </div>
            <div class="right-col">
                <div id="cardTitle" class="card-title">__TITLE__</div>
                <div class="card-details">
                    <strong>Email cím:</strong> <a id="cardEmail" href="mailto:__EMAIL__" style="color:#1f6a4a; text-decoration:underline;">__EMAIL__</a><br />
                    <strong>Beosztás:</strong> <span id="cardPosition">__POSITION__</span><br />
                    <strong>Weboldal:</strong> <a id="cardWebsite" href="__WEBSITE_HREF__" style="color:#1f6a4a; text-decoration:underline;">__WEBSITE_TEXT__</a>
                </div>
                <div class="socials">
                    <a href="https://facebook.com" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#1f6a4a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                    <a href="https://instagram.com" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#1f6a4a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
