<style>
    .tpl-6 {
        max-width: 1000px;
        margin: 40px auto;
        position: relative;
    }
    .tpl-6 .inner-wrapper {
        background: #233D4C url('https://cdn.hexaverse.hu/narancs.svg') right center / auto 185% no-repeat;
        border-radius: 20px;
        padding: 32px;
        border: 3px solid #e06100ff;
        display: flex;
        gap: 32px;
        align-items: flex-start;
        position: relative;
        overflow: hidden;
    }
    .tpl-6 .left-section {
        flex: 0 0 200px;
        text-align: center;
    }
    .tpl-6 .left-section img {
        width: 180px;
        height: 180px;
        border-radius: 20px;
        border: 4px solid #ffffff;
        background: #f5f5f5;
        display: block;
        margin: 0 auto 16px;
        object-fit: cover;
    }
    .tpl-6 .left-section .logo {
        font-family: serif;
        font-size: 32px;
        font-style: italic;
        letter-spacing: 2px;
        margin-top: 12px;
        color: #333;
    }
    .tpl-6 .right-section {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .tpl-6 .name-and-socials {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        border-bottom: 3px solid #ea511aff;
        padding-bottom: 8px;
    }
    .tpl-6 .name {
        font-family: 'ivypresto-display', Georgia, serif;
        font-size: 40px;
        color: #ea511aff;
        font-weight: 600;
        line-height: 1.2;
    }
    .tpl-6 .socials {
        display: flex;
        gap: 8px;
        flex-shrink: 0;
    }
    .tpl-6 .socials a {
        display: inline-flex;
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: #fff;
        border: 2px solid #8d8df5;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }
    .tpl-6 .details {
        font-size: 18px;
        color: #fda900ff;
        line-height: 1.8;
    }
    .tpl-6 .details strong {
        color: #000000ff;
    }
    .tpl-6 .details a {
        color: #fda900ff;
        text-decoration: underline;
    }
    .tpl-6 .weblink {
        font-size: 18px;
        color: #8d8df5;
        text-decoration: underline;
        margin-top: 4px;
        display: inline-block;
    }
</style>

<div class="signature-card tpl-6">
    <div class="inner-wrapper">
        <div class="left-section">
            <img id="cardImage" src="__IMG__" alt="Profile" />
            <div id="cardLogo" class="logo">__COMPANY__</div>
        </div>
        <div class="right-section">
            <div class="name-and-socials">
                <div id="cardTitle" class="name">__TITLE__</div>
                <div class="socials">
                </div>
            </div>
            <div class="details">
                <strong>Email cím:</strong> <a id="cardEmail" href="mailto:__EMAIL__">__EMAIL__</a><br/>
                <strong>Beosztás:</strong> <span id="cardPosition">__POSITION__</span><br/>
                <strong>Weboldal:</strong> <a id="cardWebsite" href="__WEBSITE_HREF__" class="weblink">__WEBSITE_TEXT__</a>
            </div>
        </div>
    </div>
</div>