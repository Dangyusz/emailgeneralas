<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Navbar from '@/components/Navbar.vue';
import Footer from '@/components/Footer.vue';
</script>

<template>
    <Head title="Fiók Beállítások">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    </Head>
    
    <div class="page-wrapper">
        <Navbar :user="$page.props.auth?.user" />
        
        <main class="page-content">
            <div class="page-container text-center d-flex d-flex-column flex-column align-items-center">
                <img src="../assets/image.png" alt="bena vagy balint" width="40px" height="40px">
                <h1 class="page-title">Kavics Szander</h1>
                <p class="page-description">Ez itt a Fiók oldal.</p>
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
            </div>
        </main>

        <Footer />
    </div>
</template>

<style scoped>
.page-wrapper {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    background-color: #F1F9FF;
    font-family: 'Inter', sans-serif;
}

.page-content {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    /*padding: 80px 24px;*/
}

.page-container {
    text-align: center;
    max-width: 600px;
}

.page-title {
    font-family: 'Inter', sans-serif;
    font-size: 48px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 16px;
}

.page-description {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    color: #64748b;
}

.data-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    gap: 32px;

}

.data-card {
    background: #F1F9FF;
    border-radius: 16px;
    padding: 40px 32px;
    text-align: start;
    flex: 1;
    position: relative;
    padding-top: 50px;
    margin-bottom: 50px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    width: 500px;
    padding-left: 80px;
    padding-right: 80px;
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
    color: #322799;
    line-height: 1.5;
    margin: 0;
    word-wrap: break-word;
}
</style>
