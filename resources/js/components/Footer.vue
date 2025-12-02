<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <div class="footer-logo">
                    <img src="https://cdn.hexaverse.hu/erasmus7.png" alt="Mailframe" width="40" height="40" />
                    <span class="footer-logo-text">AILFRAME</span>
                </div>
                <p class="footer-description">
                    A professzionális email aláírás<br/>
                    szakértői. A minőség nálunk alap<br/>
                    és ami a legjobb, hogy ingyenes!
                </p>
                <div class="footer-social">
                    <a href="#" class="social-link" aria-label="Discord">
                        <img src="https://cdn.hexaverse.hu/erasmus8.png" alt="Discord" width="28" height="28" />
                    </a>
                    <a href="#" class="social-link" aria-label="Instagram">
                        <img src="https://cdn.hexaverse.hu/erasmus9.png" alt="Instagram" width="28" height="28" />
                    </a>
                    <a href="#" class="social-link" aria-label="Facebook">
                        <img src="https://cdn.hexaverse.hu/erasmus10.png" alt="Facebook" width="28" height="28" />
                    </a>
                </div>
            </div>

            <div class="footer-links">
                <div class="footer-column">
                    <h3 class="footer-title">Információk</h3>
                    <ul class="footer-list">
                        <li><Link href="/about">Rólunk</Link></li>
                        <li><Link href="/contact">Kapcsolat</Link></li>
                        <li><Link href="/privacy">Adatvégelmi Irányelvek</Link></li>
                        <li><Link href="/terms">Általános Szerződési Feltételek</Link></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3 class="footer-title">Kapcsolat</h3>
                    <ul class="footer-list contact-list">
                        <li>0000 Pécs, Rigó utaca 8.</li>
                        <li>info@mailframe.hu</li>
                        <li>+36 30 836 5125</li>
                        <li>+ 36 70 993 1783</li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3 class="footer-title">Oldalak</h3>
                    <ul class="footer-list">
                        <li><Link href="/">Főoldal</Link></li>
                        <li><Link href="/generate">Aláírás Generálása</Link></li>
                        <li><Link href="/signatures">Előző aláírásaim</Link></li>
                        <li><Link href="/account-settings">Fiók Beállítások</Link></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>

<style>
.footer {
    background-image: url('https://cdn.hexaverse.hu/erasmus6.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 60px 24px;
    font-family: 'Inter', sans-serif;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    gap: 60px;
}

.footer-brand {
    flex: 0 0 auto;
    min-width: 280px;
}

.footer-logo {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 16px;
}

.footer-logo img {
    width: auto;
    height: 40px;
}

.footer-logo-text {
    font-size: 24px;
    font-weight: 700;
    color: white;
    letter-spacing: 1px;
}

.footer-description {
    font-size: 14px;
    font-style: italic;
    color: white;
    line-height: 1.6;
    margin-bottom: 20px;
}

.footer-social {
    display: flex;
    gap: 12px;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    transition: opacity 0.2s ease;
}

.social-link:hover {
    opacity: 0.8;
}

.social-link img {
    width: auto;
    height: 28px;
}

.footer-links {
    display: flex;
    gap: 80px;
}

.footer-column {
    min-width: 180px;
}

.footer-title {
    font-size: 18px;
    font-weight: 700;
    color: white;
    margin-bottom: 20px;
}

.footer-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.footer-list li {
    font-size: 14px;
    color: white;
}

.footer-list a {
    color: white;
    text-decoration: none;
    transition: opacity 0.2s ease;
}

.footer-list a:hover {
    opacity: 0.8;
}

.contact-list li {
    font-style: normal;
}

@media (max-width: 991px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .footer-brand {
        flex: none;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .footer-logo {
        justify-content: center;
    }

    .footer-social {
        justify-content: center;
    }

    .footer-links {
        flex-wrap: wrap;
        justify-content: center;
        gap: 40px;
    }

    .footer-column {
        min-width: 200px;
    }
}

@media (max-width: 575px) {
    .footer {
        padding: 40px 16px;
    }

    .footer-links {
        flex-direction: column;
        gap: 32px;
    }

    .footer-column {
        min-width: auto;
        width: 100%;
    }
}
</style>
