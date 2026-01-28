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
    name: initialErrors.name?.[0] ?? '',
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

<style>
.register-page {
    --primary-color: #4a6bff;
    --secondary-color: #6c63ff;
    --light-color: #f8f9fa;
    --text-color: #444;
    --border-color: #e0e6f0;
    --shadow: 0 20px 40px rgba(27, 39, 94, 0.12);
    --transition: all 0.3s ease;
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #f5f7ff 0%, #eef2ff 100%);
    color: var(--text-color);
    min-height: 100vh;
}

.register-card {
    background: white;
    border-radius: 16px;
    padding: 48px 40px;
    box-shadow: var(--shadow);
    text-align: left;
}

.register-brand {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-weight: 700;
    color: var(--primary-color);
    font-size: 20px;
    margin-bottom: 24px;
}

.register-card h1 {
    font-family: 'Poppins', sans-serif;
    font-size: 28px;
    margin-bottom: 8px;
    color: #333;
}

.register-subtitle {
    margin-bottom: 32px;
    color: #666;
}

.register-form {
    display: grid;
    gap: 18px;
}

.register-main {
    padding: 140px 0 90px;
}

.register-shell {
    display: grid;
    grid-template-columns: minmax(0, 460px);
    gap: 40px;
    align-items: start;
    justify-content: center;
}

.register-btn {
    width: 100%;
    margin-top: 8px;
}

.register-divider {
    position: relative;
    text-align: center;
    margin: 6px 0 2px;
    color: #9aa4b2;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.15em;
}

.register-divider::before,
.register-divider::after {
    content: '';
    position: absolute;
    top: 50%;
    width: 44%;
    height: 1px;
    background: #e2e8f0;
}

.register-divider::before {
    left: 0;
}

.register-divider::after {
    right: 0;
}

.google-btn {
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    opacity: 0.6;
    cursor: not-allowed;
}

.google-btn:disabled {
    border-color: #d7dce5;
    color: #8a94a6;
    background: #f7f8fb;
}

.register-footer {
    margin-top: 24px;
    text-align: center;
    display: flex;
    justify-content: center;
    gap: 6px;
}

.register-footer a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
}

.register-footer a:hover {
    color: var(--secondary-color);
}

@media (max-width: 992px) {
    .register-main {
        padding-top: 120px;
    }
}
</style>
