<script setup>
import { ref } from 'vue';

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

const scrollToSection = (hash) => {
    if (!hash || hash === '#') {
        closeMenu();
        return;
    }

    const target = document.querySelector(hash);
    if (!target) {
        closeMenu();
        return;
    }

    window.scrollTo({
        top: target.offsetTop - 80,
        behavior: 'smooth',
    });

    closeMenu();
};
</script>

<template>
    <div>
        <header>
            <div class="container">
                <nav class="navbar">
                    <div class="logo">
                        <i class="fas fa-globe"></i>
                        WebServ
                    </div>
                    <ul :class="['nav-links', { active: isMenuOpen }]">
                        <li v-for="link in navLinks" :key="link.id">
                            <a :href="`#${link.id}`" @click.prevent="scrollToSection(`#${link.id}`)">
                                {{ link.label }}
                            </a>
                        </li>
                    </ul>
                    <div class="nav-actions">
                        <a href="/login" class="btn-outline btn">Iniciar Sesion</a>
                        <a href="#registro" class="btn" @click.prevent="scrollToSection('#registro')">Registro Gratis</a>
                    </div>
                    <button class="mobile-toggle" type="button" @click="toggleMenu">
                        <i :class="['fas', isMenuOpen ? 'fa-times' : 'fa-bars']"></i>
                    </button>
                </nav>
            </div>
        </header>

        <section class="hero" id="inicio">
            <div class="container">
                <h1>Sistemas Web <span class="highlight">Profesionales</span> para Tu Negocio</h1>
                <p>Desarrollamos soluciones web a medida para impulsar tu presencia digital. Acceso instantaneo, sin tarjeta de credito, con soporte especializado.</p>
                <div class="hero-btns">
                    <a href="#registro" class="btn" @click.prevent="scrollToSection('#registro')">Comenzar Gratis</a>
                    <a href="#servicios" class="btn-outline btn" @click.prevent="scrollToSection('#servicios')">Ver Servicios</a>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-title">
                    <h2>Por que Elegirnos</h2>
                    <p>Ofrecemos las mejores soluciones tecnologicas para que tu negocio crezca en el mundo digital.</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3>Implementacion Rapida</h3>
                        <p>Desplegamos tu sistema web en tiempo record, sin complicaciones y con todas las funcionalidades que necesitas.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Seguridad Garantizada</h3>
                        <p>Protegemos tus datos y los de tus clientes con los mas altos estandares de seguridad y cifrado.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>Soporte 24/7</h3>
                        <p>Nuestro equipo de soporte esta disponible en todo momento para resolver cualquier duda o problema.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section services" id="servicios">
            <div class="container">
                <div class="section-title">
                    <h2>Nuestros Servicios Web</h2>
                    <p>Ofrecemos soluciones especializadas para diferentes tipos de negocios y necesidades.</p>
                </div>
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-img">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="service-content">
                            <h3>Comercio Electronico</h3>
                            <p>Tiendas online completas con carrito de compras, pasarelas de pago y gestion de inventario.</p>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check"></i> Diseno responsive</li>
                                <li><i class="fas fa-check"></i> Integracion de pagos</li>
                                <li><i class="fas fa-check"></i> Panel de administracion</li>
                            </ul>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-img">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="service-content">
                            <h3>E-Learning</h3>
                            <p>Plataformas educativas con gestion de cursos, estudiantes, evaluaciones y contenido multimedia.</p>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check"></i> Sistema de lecciones</li>
                                <li><i class="fas fa-check"></i> Certificaciones automaticas</li>
                                <li><i class="fas fa-check"></i> Foros y comunidad</li>
                            </ul>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-img">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="service-content">
                            <h3>Gestion de Eventos</h3>
                            <p>Sistemas para organizacion de eventos, venta de entradas, gestion de asistentes y promocion.</p>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check"></i> Venta de entradas online</li>
                                <li><i class="fas fa-check"></i> Control de acceso</li>
                                <li><i class="fas fa-check"></i> Analisis de asistencia</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="precios">
            <div class="container">
                <div class="section-title">
                    <h2>Planes y Precios</h2>
                    <p>Elige el plan que mejor se adapte a las necesidades de tu negocio. Todos incluyen soporte tecnico.</p>
                </div>
                <div class="pricing-grid">
                    <div class="pricing-card">
                        <h3>Basico</h3>
                        <div class="price">$49<span>/mes</span></div>
                        <p>Ideal para pequenas empresas que comienzan</p>
                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Hasta 100 productos</li>
                            <li><i class="fas fa-check"></i> 5 GB de almacenamiento</li>
                            <li><i class="fas fa-check"></i> Soporte por email</li>
                            <li><i class="fas fa-check"></i> Plantillas basicas</li>
                        </ul>
                        <a href="#registro" class="btn" @click.prevent="scrollToSection('#registro')">Comenzar</a>
                    </div>
                    <div class="pricing-card popular">
                        <div class="popular-badge">MAS POPULAR</div>
                        <h3>Profesional</h3>
                        <div class="price">$99<span>/mes</span></div>
                        <p>Perfecto para negocios en crecimiento</p>
                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Productos ilimitados</li>
                            <li><i class="fas fa-check"></i> 50 GB de almacenamiento</li>
                            <li><i class="fas fa-check"></i> Soporte prioritario 24/7</li>
                            <li><i class="fas fa-check"></i> Disenos personalizados</li>
                            <li><i class="fas fa-check"></i> Integracion con redes sociales</li>
                        </ul>
                        <a href="#registro" class="btn" @click.prevent="scrollToSection('#registro')">Comenzar</a>
                    </div>
                    <div class="pricing-card">
                        <h3>Empresarial</h3>
                        <div class="price">$199<span>/mes</span></div>
                        <p>Para grandes empresas con necesidades especificas</p>
                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Soluciones a medida</li>
                            <li><i class="fas fa-check"></i> Almacenamiento ilimitado</li>
                            <li><i class="fas fa-check"></i> Soporte dedicado</li>
                            <li><i class="fas fa-check"></i> Desarrollo personalizado</li>
                            <li><i class="fas fa-check"></i> API y integraciones</li>
                        </ul>
                        <a href="#registro" class="btn" @click.prevent="scrollToSection('#registro')">Comenzar</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta" id="registro">
            <div class="container">
                <h2>Comienza Tu Proyecto Web Hoy</h2>
                <p>Obten acceso instantaneo a nuestras soluciones. No necesitas tarjeta de credito para comenzar con el plan gratuito.</p>
                <a href="#registro" class="btn" @click.prevent="scrollToSection('#registro')">Registro Gratuito</a>
            </div>
        </section>

        <footer id="contacto">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-column">
                        <h3>WebServ</h3>
                        <p>Desarrollamos sistemas web profesionales para empresas de todos los tamanos. Impulsamos tu presencia digital con soluciones innovadoras.</p>
                    </div>
                    <div class="footer-column">
                        <h3>Servicios</h3>
                        <ul class="footer-links">
                            <li><a href="#servicios" @click.prevent="scrollToSection('#servicios')">Comercio Electronico</a></li>
                            <li><a href="#servicios" @click.prevent="scrollToSection('#servicios')">E-Learning</a></li>
                            <li><a href="#servicios" @click.prevent="scrollToSection('#servicios')">Gestion de Eventos</a></li>
                            <li><a href="#servicios" @click.prevent="scrollToSection('#servicios')">Sistemas Personalizados</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Contacto</h3>
                        <ul class="footer-links">
                            <li><i class="fas fa-map-marker-alt"></i> Av. Principal 123, Ciudad</li>
                            <li><i class="fas fa-phone"></i> +1 234 567 890</li>
                            <li><i class="fas fa-envelope"></i> info@webserv.com</li>
                        </ul>
                    </div>
                </div>
                <div class="copyright">
                    <p>&copy; 2023 WebServ. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    </div>
</template>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --primary-color: #4a6bff;
    --secondary-color: #6c63ff;
    --accent-color: #ff6b8b;
    --dark-color: #333;
    --light-color: #f8f9fa;
    --gray-color: #eef2f7;
    --text-color: #444;
    --border-color: #e0e6f0;
    --success-color: #28a745;
    --shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    --transition: all 0.3s ease;
}

body {
    font-family: 'Roboto', sans-serif;
    line-height: 1.6;
    color: var(--text-color);
    background-color: var(--light-color);
}

h1,
h2,
h3,
h4,
h5 {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    color: var(--dark-color);
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

header {
    background-color: white;
    box-shadow: var(--shadow);
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
}

.logo {
    font-size: 24px;
    font-weight: 700;
    color: var(--primary-color);
    display: flex;
    align-items: center;
}

.logo i {
    margin-right: 8px;
}

.nav-links {
    display: flex;
    list-style: none;
}

.nav-links li {
    margin-left: 30px;
}

.nav-links a {
    text-decoration: none;
    color: var(--dark-color);
    font-weight: 500;
    transition: var(--transition);
}

.nav-links a:hover {
    color: var(--primary-color);
}

.btn {
    display: inline-block;
    background-color: var(--primary-color);
    color: white;
    padding: 12px 28px;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: var(--transition);
}

.btn:hover {
    background-color: var(--secondary-color);
    transform: translateY(-3px);
    box-shadow: var(--shadow);
}

.btn-outline {
    background-color: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
}

.btn-outline:hover {
    background-color: var(--primary-color);
    color: white;
}

.mobile-toggle {
    display: none;
    font-size: 24px;
    cursor: pointer;
    background: none;
    border: none;
}

.hero {
    padding: 180px 0 100px;
    background: linear-gradient(135deg, #f5f7ff 0%, #eef2ff 100%);
    text-align: center;
}

.hero h1 {
    font-size: 3.2rem;
    margin-bottom: 20px;
    line-height: 1.2;
}

.hero p {
    font-size: 1.2rem;
    max-width: 700px;
    margin: 0 auto 30px;
    color: #666;
}

.highlight {
    color: var(--primary-color);
}

.nav-actions {
    display: flex;
    align-items: center;
    gap: 18px;
}

.hero-btns {
    margin-top: 40px;
}

.hero-btns .btn {
    margin: 0 10px;
}

.section {
    padding: 80px 0;
}

.section-title {
    text-align: center;
    margin-bottom: 60px;
}

.section-title h2 {
    font-size: 2.5rem;
    margin-bottom: 15px;
}

.section-title p {
    max-width: 700px;
    margin: 0 auto;
    color: #666;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.feature-card {
    background-color: white;
    border-radius: 8px;
    padding: 30px;
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.feature-card:hover {
    transform: translateY(-10px);
}

.feature-icon {
    background-color: rgba(74, 107, 255, 0.1);
    color: var(--primary-color);
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    font-size: 28px;
}

.feature-card h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
}

.services {
    background-color: var(--gray-color);
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
}

.service-card {
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.service-card:hover {
    transform: translateY(-5px);
}

.service-img {
    height: 200px;
    background-color: #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 50px;
    color: var(--primary-color);
}

.service-content {
    padding: 25px;
}

.service-content h3 {
    margin-bottom: 10px;
}

.pricing-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    align-items: stretch;
}

.pricing-card {
    background-color: white;
    border-radius: 8px;
    padding: 40px 30px;
    box-shadow: var(--shadow);
    text-align: center;
    position: relative;
    transition: var(--transition);
    display: flex;
    flex-direction: column;
    height: 100%;
}

.pricing-card:hover {
    transform: translateY(-10px);
}

.pricing-card.popular {
    border-top: 5px solid var(--primary-color);
    transform: none;
}

.pricing-card.popular:hover {
    transform: scale(1.05) translateY(-10px);
}

.popular-badge {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background-color: var(--primary-color);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.price {
    font-size: 3rem;
    font-weight: 700;
    color: var(--primary-color);
    margin: 20px 0;
}

.price span {
    font-size: 1rem;
    color: #777;
}

.pricing-features {
    list-style: none;
    margin: 30px 0;
    text-align: left;
    flex: 1;
}

.pricing-features li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.pricing-features li i {
    color: var(--success-color);
    margin-right: 10px;
}

.pricing-card .btn {
    align-self: center;
    margin-top: auto;
}

.cta {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    text-align: center;
    padding: 100px 0;
}

.cta h2 {
    color: white;
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.cta p {
    max-width: 700px;
    margin: 0 auto 40px;
    font-size: 1.1rem;
    opacity: 0.9;
}

.cta .btn {
    background-color: white;
    color: var(--primary-color);
    font-weight: 600;
}

.cta .btn:hover {
    background-color: var(--gray-color);
}

footer {
    background-color: var(--dark-color);
    color: #aaa;
    padding: 70px 0 30px;
}

.footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    margin-bottom: 50px;
}

.footer-column h3 {
    color: white;
    font-size: 1.3rem;
    margin-bottom: 25px;
}

.footer-links {
    list-style: none;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    color: #aaa;
    text-decoration: none;
    transition: var(--transition);
}

.footer-links a:hover {
    color: white;
    padding-left: 5px;
}

.copyright {
    text-align: center;
    padding-top: 30px;
    border-top: 1px solid #444;
    font-size: 0.9rem;
}

@media (max-width: 992px) {
    .hero h1 {
        font-size: 2.5rem;
    }

    .pricing-card.popular {
        transform: none;
    }

    .pricing-card.popular:hover {
        transform: translateY(-10px);
    }
}

@media (max-width: 768px) {
    .mobile-toggle {
        display: block;
    }

    .nav-links {
        position: fixed;
        top: 70px;
        left: 0;
        width: 100%;
        background-color: white;
        flex-direction: column;
        align-items: center;
        padding: 20px 0;
        box-shadow: var(--shadow);
        transform: translateY(-100%);
        opacity: 0;
        transition: var(--transition);
        z-index: 999;
    }

    .nav-links.active {
        transform: translateY(0);
        opacity: 1;
    }

    .nav-links li {
        margin: 15px 0;
    }

    .hero h1 {
        font-size: 2rem;
    }

    .section-title h2 {
        font-size: 2rem;
    }
}
</style>
