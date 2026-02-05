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
    name: initialOld.name ?? '',
    email: initialOld.email ?? '',
    password: '',
    password_confirmation: '',
});

const errors = reactive({
    general: initialErrors.general?.[0] ?? '',
    name: initialErrors.name?.[0] ?? '',
    email: initialErrors.email?.[0] ?? '',
    password: initialErrors.password?.[0] ?? '',
    password_confirmation: initialErrors.password_confirmation?.[0] ?? '',
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
    <div class="register-page">
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

        <main class="register-main">
            <div class="container">
                <div class="register-shell">
                    <section class="register-card">
                        <div class="register-brand">
                            <i class="fas fa-user-plus"></i>
                            Crea tu cuenta
                        </div>

                        <h1>Registro</h1>
                        <p class="register-subtitle">Empieza a administrar tu negocio en minutos.</p>

                        <form class="register-form" method="post" action="/register">
                            <input type="hidden" name="_token" :value="csrfToken">

                            <p v-if="errors.general" class="form-error">{{ errors.general }}</p>

                            <label class="field">
                                <span>Nombre completo</span>
                                <input v-model="form.name" type="text" name="name" autocomplete="name" required>
                                <span v-if="errors.name" class="field-error">{{ errors.name }}</span>
                            </label>

                            <label class="field">
                                <span>Email</span>
                                <input v-model="form.email" type="email" name="email" autocomplete="email" required>
                                <span v-if="errors.email" class="field-error">{{ errors.email }}</span>
                            </label>

                            <label class="field">
                                <span>Contrasena</span>
                                <input v-model="form.password" type="password" name="password" autocomplete="new-password" required>
                                <span v-if="errors.password" class="field-error">{{ errors.password }}</span>
                            </label>

                            <label class="field">
                                <span>Confirmar contrasena</span>
                                <input v-model="form.password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>
                                <span v-if="errors.password_confirmation" class="field-error">{{ errors.password_confirmation }}</span>
                            </label>

                            <button type="submit" class="btn register-btn">Crear cuenta</button>

                            <div class="register-divider">
                                <span>o</span>
                            </div>

                            <button type="button" class="btn-outline btn google-btn" disabled>
                                <i class="fab fa-google"></i>
                                Crear con Google (Proximamente)
                            </button>
                        </form>

                        <div class="register-footer">
                            <span>Ya tienes cuenta?</span>
                            <a href="/login">Inicia sesion</a>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
</template>

<style src="@/assets/css/theme.css"></style>
<style src="@/assets/css/auth.css"></style>

