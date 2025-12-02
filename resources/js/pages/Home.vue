<script setup lang="ts">
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import Navbar from '@/components/Navbar.vue';
import Footer from '@/components/Footer.vue';

interface Props {
    canRegister?: boolean;
}

withDefaults(defineProps<Props>(), {
    canRegister: true,
});

const openFaq = ref<number | null>(null);

const toggleFaq = (index: number) => {
    openFaq.value = openFaq.value === index ? null : index;
};
</script>

<template>
    <Head title="Főoldal">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Karma:wght@700&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://cdn.hexaverse.hu" />
        <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus1.png" />
        <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus2.png" />
        <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus3.png" />
        <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus4.png" />
        <link rel="preload" as="image" href="https://cdn.hexaverse.hu/erasmus5.png" />
    </Head>
    
    <div class="home-page">
        <Navbar :user="$page.props.auth?.user" />
        
        <main class="hero-section">
            <div class="hero-container">
                <div class="hero-image">
                    <img src="https://cdn.hexaverse.hu/erasmus3.png" alt="Email aláírás" width="380" height="380" loading="eager" decoding="async" />
                </div>
                <div class="hero-content">
                    <h1 class="hero-title">EGYEDI EMAIL ALÁÍRÁS<br/>EGY PILLANAT ALATT</h1>
                    <p class="hero-text">Próbáld ki professziónális generálónkat<br/>10 alkalommal ingyen</p>
                    <div class="hero-buttons">
                        <a href="/generate" class="btn-primary">Kipróbálom</a>
                        <a href="/register" class="btn-secondary">Regisztrálok</a>
                    </div>
                </div>
            </div>
        </main>

        <section class="features-section">
            <div class="features-container">
                <div class="feature-card">
                    <span class="feature-badge">Gyors</span>
                    <p class="feature-text">Akár már pár másodperc alatt hozzájuthatsz saját Email aláírásodhoz!</p>
                </div>
                <div class="feature-card">
                    <span class="feature-badge">Innovatív</span>
                    <p class="feature-text">Sehol máshoz nem találsz ilyen szuper aláírás generálót!</p>
                </div>
                <div class="feature-card">
                    <span class="feature-badge">Ingyenes</span>
                    <p class="feature-text">És a legjobb? Szolgáltatásunk teljesen ingyenesen használható!</p>
                </div>
            </div>
        </section>

        <section class="faq-section">
            <div class="faq-container">
                <div class="faq-list">
                    <div class="faq-item">
                        <button class="faq-question" @click="toggleFaq(0)">
                            <span>Tényleg ingyenes?</span>
                            <svg class="faq-arrow" :class="{ open: openFaq === 0 }" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>
                        <div class="faq-answer" v-show="openFaq === 0">
                            <p>Igen, szolgáltatásunk teljesen ingyenesen használható!</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question" @click="toggleFaq(1)">
                            <span>Mennyi aláírást tudok tárolni?</span>
                            <svg class="faq-arrow" :class="{ open: openFaq === 1 }" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>
                        <div class="faq-answer" v-show="openFaq === 1">
                            <p>Korlátlan számú aláírást tudsz létrehozni és tárolni.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question" @click="toggleFaq(2)">
                            <span>Hozzá tudok adni embereket?</span>
                            <svg class="faq-arrow" :class="{ open: openFaq === 2 }" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>
                        <div class="faq-answer" v-show="openFaq === 2">
                            <p>Igen, meghívhatsz másokat a csapatodba.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question" @click="toggleFaq(3)">
                            <span>Hozzá csatolhatom a Discordomat?</span>
                            <svg class="faq-arrow" :class="{ open: openFaq === 3 }" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>
                        <div class="faq-answer" v-show="openFaq === 3">
                            <p>Igen, lehetőség van Discord fiók összekapcsolására.</p>
                        </div>
                    </div>
                </div>
                <div class="faq-image">
                    <img src="https://cdn.hexaverse.hu/erasmus4.png" alt="FAQ" width="400" height="400" loading="lazy" decoding="async" />
                </div>
            </div>
        </section>

        <Footer />
    </div>
</template>

<style>
* {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

.home-page {
    background-color: #F1F9FF;
    min-height: 100vh;
    font-family: 'Inter', sans-serif;
    overflow-x: hidden;
}

.hero-section {
    padding: 60px 24px;
    max-width: 1200px;
    margin: 0 auto;
}

.hero-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 80px;
}

.hero-image {
    flex: 0 0 auto;
    width: 380px;
}

.hero-image img {
    width: 100%;
    height: auto;
    will-change: auto;
    content-visibility: auto;
}

.hero-content {
    flex: 1;
}

.hero-title {
    font-family: 'Karma', serif;
    font-weight: 700;
    font-size: 52px;
    color: #322799;
    line-height: 1.1;
    margin-bottom: 24px;
    font-style: italic;
}

.hero-text {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    color: #322799;
    line-height: 1.5;
    margin-bottom: 32px;
    font-weight: 400;
}

.hero-buttons {
    display: flex;
    gap: 16px;
}

.btn-primary {
    background: #201957;
    color: white;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 14px;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.2s ease;
}

.btn-primary:hover {
    opacity: 0.9;
    color: white;
    transform: translateY(-1px);
}

.btn-secondary {
    background: #F1F9FF;
    color: #322799;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 14px;
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.btn-secondary:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transform: translateY(-1px);
}

@media (max-width: 991px) {
    .hero-container {
        flex-direction: column;
        text-align: center;
    }

    .hero-image {
        width: 320px;
        order: -1;
    }

    .hero-buttons {
        justify-content: center;
    }
}

@media (max-width: 575px) {
    .hero-section {
        padding: 40px 16px;
    }

    .hero-title {
        font-size: 32px;
    }

    .hero-text {
        font-size: 16px;
    }

    .hero-image {
        width: 280px;
    }

    .hero-buttons {
        flex-direction: column;
    }

    .btn-primary,
    .btn-secondary {
        width: 100%;
        text-align: center;
    }
}

.features-section {
    background-image: url('https://cdn.hexaverse.hu/erasmus5.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: scroll;
    padding: 80px 24px;
    will-change: auto;
}

.features-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    gap: 32px;
}

.feature-card {
    background: #F1F9FF;
    border-radius: 16px;
    padding: 40px 32px;
    text-align: center;
    flex: 1;
    max-width: 320px;
    position: relative;
    padding-top: 50px;
}

.feature-badge {
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

.feature-text {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #322799;
    line-height: 1.5;
    margin: 0;
}

@media (max-width: 991px) {
    .features-container {
        flex-direction: column;
        align-items: center;
    }

    .feature-card {
        max-width: 400px;
        width: 100%;
    }
}

@media (max-width: 575px) {
    .features-section {
        padding: 60px 16px;
    }

    .feature-card {
        padding: 40px 24px;
        padding-top: 50px;
    }

    .feature-text {
        font-size: 16px;
    }
}

.faq-section {
    background-color: #F1F9FF;
    padding: 80px 24px;
}

.faq-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    gap: 60px;
}

.faq-list {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.faq-item {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

.faq-question {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 24px;
    background: transparent;
    border: none;
    cursor: pointer;
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #322799;
    text-align: left;
    transition: all 0.2s ease;
}

.faq-question:hover {
    background: rgba(50, 39, 153, 0.03);
}

.faq-arrow {
    color: #322799;
    transition: transform 0.3s ease;
    flex-shrink: 0;
}

.faq-arrow.open {
    transform: rotate(180deg);
}

.faq-answer {
    padding: 0 24px 20px 24px;
}

.faq-answer p {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    color: #555;
    line-height: 1.6;
    margin: 0;
}

.faq-image {
    flex: 1;
    display: flex;
    justify-content: center;
}

.faq-image img {
    max-width: 100%;
    height: auto;
    will-change: auto;
    content-visibility: auto;
}

@media (max-width: 991px) {
    .faq-container {
        flex-direction: column;
    }

    .faq-image {
        order: -1;
        max-width: 400px;
    }
}

@media (max-width: 575px) {
    .faq-section {
        padding: 60px 16px;
    }

    .faq-question {
        font-size: 16px;
        padding: 16px 20px;
    }

    .faq-answer {
        padding: 0 20px 16px 20px;
    }
}
</style>
