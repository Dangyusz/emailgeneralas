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
            <div class="page-container">
                <h1 class="page-title">Fiók Beállítások</h1>
                <p class="page-description">Ez itt a Fiók Beállítások oldal.</p>
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
    padding: 80px 24px;
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
</style>
