<script setup lang="ts">
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

interface Props {
    user?: {
        name: string;
        avatar?: string;
    } | null;
}

const props = withDefaults(defineProps<Props>(), {
    user: null,
});

const isMenuOpen = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const menuItems = [
    { name: 'Főoldal', href: '/' },
    { name: 'Aláírás generálása', href: '/generate' },
    { name: 'Előző Aláírásaim', href: '/signatures' },
];
</script>

<template>
    <div class="navbar-wrapper">
        <div class="top-bar">
            <span class="top-bar-text">Most akár DUPLA annyi Email címet is generálhat!</span>
        </div>

        <nav class="main-navbar">
            <div class="navbar-container">
                <Link href="/" class="navbar-brand">
                    <img src="https://cdn.hexaverse.hu/erasmus1.png" alt="Logo" class="navbar-logo" width="32" height="32" />
                    <span class="navbar-title">AILFRAME</span>
                </Link>

                <ul class="navbar-menu">
                    <li v-for="item in menuItems" :key="item.name">
                        <Link :href="item.href" class="nav-link">{{ item.name }}</Link>
                    </li>
                </ul>

                <div class="navbar-actions">
                    <template v-if="props.user">
                        <Link href="/dashboard" class="user-btn">
                            <img 
                                :src="props.user.avatar || 'https://ui-avatars.com/api/?name=' + encodeURIComponent(props.user.name) + '&background=4ade80&color=fff'" 
                                :alt="props.user.name"
                                class="user-avatar"
                            />
                            <span>{{ props.user.name }}</span>
                        </Link>
                    </template>
                    <template v-else>
                        <Link href="/register" class="register-btn">
                            <span>Regisztráció</span>
                        </Link>
                    </template>
                    
                    <Link href="/account-settings" class="settings-btn" aria-label="Beállítások">
                        <img src="https://cdn.hexaverse.hu/erasmus2.png" alt="Beállítások" width="24" height="24" />
                    </Link>
                </div>

                <button class="mobile-toggle" @click="toggleMenu" :class="{ active: isMenuOpen }">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            <div class="mobile-menu" :class="{ open: isMenuOpen }">
                <ul class="mobile-nav">
                    <li v-for="item in menuItems" :key="item.name">
                        <Link :href="item.href" class="mobile-link">{{ item.name }}</Link>
                    </li>
                </ul>
                <div class="mobile-actions">
                    <template v-if="props.user">
                        <Link href="/dashboard" class="user-btn">
                            <img 
                                :src="props.user.avatar || 'https://ui-avatars.com/api/?name=' + encodeURIComponent(props.user.name) + '&background=4ade80&color=fff'" 
                                :alt="props.user.name"
                                class="user-avatar"
                            />
                            <span>{{ props.user.name }}</span>
                        </Link>
                    </template>
                    <template v-else>
                        <Link href="/register" class="register-btn">
                            <span>Regisztráció</span>
                        </Link>
                    </template>
                    <Link href="/account-settings" class="settings-btn" aria-label="Beállítások">
                        <img src="https://cdn.hexaverse.hu/erasmus2.png" alt="Beállítások" width="24" height="24" />
                    </Link>
                </div>
            </div>
        </nav>
    </div>

    <div class="navbar-spacer"></div>
</template>

<style>
.navbar-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1050;
}

.top-bar {
    background: linear-gradient(to right, #32279A, #1D174B);
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.top-bar-text {
    color: white;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 400;
    white-space: nowrap;
}

.main-navbar {
    background-color: #F1F9FF;
    min-height: 64px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.navbar-container {
    display: flex;
    align-items: center;
    padding: 0 24px;
    height: 64px;
    max-width: 1400px;
    margin: 0 auto;
}

.navbar-brand {
    display: flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
}

.navbar-logo {
    height: 32px;
    width: auto;
}

.navbar-title {
    color: #2B2281;
    font-family: 'Inter', sans-serif;
    font-weight: 800;
    font-size: 20px;
    letter-spacing: 0.3px;
}

.navbar-menu {
    display: flex;
    align-items: center;
    gap: 8px;
    list-style: none;
    margin: 0;
    padding: 0;
    margin-left: 32px;
}

.nav-link {
    color: #2B2281;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 15px;
    padding: 8px 16px;
    text-decoration: none;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.nav-link:hover {
    text-decoration: underline;
}

.navbar-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-left: auto;
}

.user-btn {
    background: linear-gradient(135deg, #4338CA 0%, #1D174B 100%);
    color: white;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 14px;
    padding: 8px 18px 8px 8px;
    border-radius: 25px;
    border: none;
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.user-btn:hover {
    opacity: 0.9;
    color: white;
    transform: translateY(-1px);
}

.user-btn .user-avatar {
    height: 28px;
    width: 28px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.login-btn {
    background: transparent;
    color: white;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 14px;
    padding: 10px 20px;
    border-radius: 8px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.login-btn:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transform: translateY(-1px);
}

.register-btn {
    background: #201957;
    color: white;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 14px;
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.register-btn:hover {
    opacity: 0.9;
    color: white;
    transform: translateY(-1px);
}

.settings-btn {
    background: #201957;
    border: none;
    cursor: pointer;
    padding: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    border-radius: 8px;
    width: 40px;
    height: 40px;
}

.settings-btn:hover {
    background-color: #2d2170;
    transform: translateY(-1px);
}

.settings-btn img {
    height: 24px;
    width: 24px;
    object-fit: contain;
}

.mobile-toggle {
    display: none;
    flex-direction: column;
    justify-content: center;
    gap: 5px;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 8px;
    width: 40px;
    height: 40px;
    margin-left: auto;
}

.mobile-toggle span {
    display: block;
    width: 24px;
    height: 2px;
    background-color: #2B2281;
    transition: all 0.3s ease;
}

.mobile-toggle.active span:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
}

.mobile-toggle.active span:nth-child(2) {
    opacity: 0;
}

.mobile-toggle.active span:nth-child(3) {
    transform: rotate(-45deg) translate(5px, -5px);
}

.mobile-menu {
    display: none;
    background-color: #F1F9FF;
    padding: 16px 24px;
    border-top: 1px solid rgba(43, 34, 129, 0.1);
}

.mobile-menu.open {
    display: block;
}

.mobile-nav {
    list-style: none;
    margin: 0;
    padding: 0;
}

.mobile-link {
    display: block;
    color: #2B2281;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 16px;
    padding: 12px 0;
    text-decoration: none;
    border-bottom: 1px solid rgba(43, 34, 129, 0.1);
}

.mobile-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding-top: 16px;
    margin-top: 8px;
}

.navbar-spacer {
    height: 96px;
}

@media (max-width: 991px) {
    .navbar-menu {
        display: none;
    }

    .navbar-actions {
        display: none;
    }

    .mobile-toggle {
        display: flex;
    }
}

@media (max-width: 575px) {
    .navbar-title {
        font-size: 18px;
    }

    .navbar-logo {
        height: 32px;
    }

    .top-bar {
        height: 28px;
    }

    .top-bar-text {
        font-size: 11px;
    }

    .navbar-container {
        padding: 0 16px;
    }
}
</style>
