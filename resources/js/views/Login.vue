<script setup>
import { reactive, ref } from 'vue';

const appElement = document.getElementById('app');
const csrfToken =
    appElement?.dataset.csrf ??
    document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ??
    '';

const initialErrors = appElement?.dataset.errors ? JSON.parse(appElement.dataset.errors) : {};
const initialOld = appElement?.dataset.old ? JSON.parse(appElement.dataset.old) : {};

const form = reactive({
    email: initialOld.email ?? '',
    password: '',
    remember: false,
});

const errors = reactive({
    general: initialErrors.general?.[0] ?? '',
    email: initialErrors.email?.[0] ?? '',
    password: initialErrors.password?.[0] ?? '',
});

const navLinks = [
    { id: 'inicio', label: 'Inicio' },
    { id: 'servicios', label: 'Servicios' },
    { id: 'precios', label: 'Precios' },
    { id: 'nosotros', label: 'Nosotros' },
    { id: 'contacto', label: 'Contacto' },
];

const isMenuOpen = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const closeMenu = () => {
    isMenuOpen.value = false;
};
</script>

<template>
    <div class="login-page">
        <header>
            <div class="container">
                <nav class="navbar">
                    <div class="logo">
                        <i class="fas fa-globe"></i>
                        WebServ
                    </div>
                    <ul :class="['nav-links', { active: isMenuOpen }]">
                        <li v-for="link in navLinks" :key="link.id">
                            <a :href="`/#${link.id}`" @click="closeMenu">{{ link.label }}</a>
                        </li>
                    </ul>
                    <div class="nav-actions">
                        <a href="/login" class="btn-outline btn">Iniciar Sesion</a>
                        <a href="/register" class="btn">Registro Gratis</a>
                    </div>
                    <button class="mobile-toggle" type="button" @click="toggleMenu">
                        <i :class="['fas', isMenuOpen ? 'fa-times' : 'fa-bars']"></i>
                    </button>
                </nav>
            </div>
        </header>

        <main class="login-main">
            <div class="container">
                <div class="login-shell">
                    <section class="login-card">
                        <div class="login-brand">
                            <i class="fas fa-globe"></i>
                            WebServ
                        </div>

                        <h1>Iniciar Sesion</h1>
                        <p class="login-subtitle">Accede a tu panel y administra tu negocio.</p>

                        <form class="login-form" method="post" action="/login">
                            <input type="hidden" name="_token" :value="csrfToken">

                            <p v-if="errors.general" class="form-error">{{ errors.general }}</p>

                            <label class="field">
                                <span>Email</span>
                                <input v-model="form.email" type="email" name="email" autocomplete="email" required>
                                <span v-if="errors.email" class="field-error">{{ errors.email }}</span>
                            </label>

                            <label class="field">
                                <span>Contrasena</span>
                                <input v-model="form.password" type="password" name="password" autocomplete="current-password" required>
                                <span v-if="errors.password" class="field-error">{{ errors.password }}</span>
                            </label>

                            <div class="login-meta">
                                <label class="remember">
                                    <input v-model="form.remember" type="checkbox" name="remember">
                                    <span>Recordarme</span>
                                </label>
                                <span class="forgot-link forgot-link--placeholder">Olvide mi contrasena</span>
                            </div>

                            <button type="submit" class="btn login-btn">Entrar</button>

                            <div class="login-divider">
                                <span>o</span>
                            </div>

                            <a class="btn-outline btn login-secondary" href="/register">Crear cuenta</a>
                        </form>

                        <div class="login-footer">
                            <span>No tienes cuenta?</span>
                            <a href="/register">Registrate aqui</a>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
</template>

<style src="@/assets/css/theme.css"></style>
<style src="@/assets/css/auth.css"></style>

