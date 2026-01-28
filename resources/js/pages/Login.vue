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

<style>
.login-page {
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

.login-card {
    background: white;
    border-radius: 16px;
    padding: 48px 40px;
    box-shadow: var(--shadow);
    text-align: left;
}

.login-brand {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-weight: 700;
    color: var(--primary-color);
    font-size: 20px;
    margin-bottom: 24px;
}

.login-card h1 {
    font-family: 'Poppins', sans-serif;
    font-size: 28px;
    margin-bottom: 8px;
    color: #333;
}

.login-subtitle {
    margin-bottom: 32px;
    color: #666;
}

.login-form {
    display: grid;
    gap: 18px;
}

.login-main {
    padding: 140px 0 90px;
}

.login-shell {
    display: grid;
    grid-template-columns: minmax(0, 420px);
    gap: 40px;
    align-items: start;
    justify-content: center;
}

.login-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
    gap: 12px;
}

.forgot-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
}

.forgot-link:hover {
    color: var(--secondary-color);
}

.forgot-link--placeholder {
    cursor: not-allowed;
    opacity: 0.7;
    pointer-events: none;
}

.field {
    display: grid;
    gap: 8px;
    font-weight: 500;
}

.field input {
    border: 1px solid var(--border-color);
    border-radius: 10px;
    padding: 12px 14px;
    font-size: 15px;
    transition: var(--transition);
}

.field input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(74, 107, 255, 0.15);
}

.field-error {
    color: #d43d3d;
    font-size: 13px;
}

.remember {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
}

.login-btn {
    width: 100%;
    margin-top: 8px;
}

.login-divider {
    position: relative;
    text-align: center;
    margin: 6px 0 2px;
    color: #9aa4b2;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.15em;
}

.login-divider::before,
.login-divider::after {
    content: '';
    position: absolute;
    top: 50%;
    width: 44%;
    height: 1px;
    background: #e2e8f0;
}

.login-divider::before {
    left: 0;
}

.login-divider::after {
    right: 0;
}

.login-secondary {
    width: 100%;
    text-align: center;
}
.login-footer {
    margin-top: 24px;
    text-align: center;
    display: flex;
    justify-content: center;
    gap: 6px;
}

.login-footer a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
}

.login-footer a:hover {
    color: var(--secondary-color);
}

@media (max-width: 992px) {
    .login-main {
        padding-top: 120px;
    }
}

@media (max-width: 768px) {
    .login-meta {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>
