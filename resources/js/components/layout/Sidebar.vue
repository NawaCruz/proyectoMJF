<template>
    <aside class="sidebar" :class="{ active: isOpen }">
        <div class="sidebar-header">
            <div class="logo">
                <div class="logo-icon">MJF</div>
                <div class="logo-text">Sistema MJF</div>
            </div>
            <button class="sidebar-toggle" type="button" @click="$emit('close')">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <nav class="sidebar-menu">
            <RouterLink to="/app/dashboard" class="menu-item" @click="onMenuClick">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </RouterLink>

            <div class="menu-title">Operaciones</div>

            <RouterLink to="/app/ventas" class="menu-item" @click="onMenuClick">
                <i class="fas fa-shopping-cart"></i>
                <span>Ventas</span>
            </RouterLink>

            <RouterLink to="/app/compras" class="menu-item" @click="onMenuClick">
                <i class="fas fa-clipboard-list"></i>
                <span>Compras</span>
            </RouterLink>

            <RouterLink to="/app/caja" class="menu-item" @click="onMenuClick">
                <i class="fas fa-cash-register"></i>
                <span>Caja</span>
            </RouterLink>

            <div class="menu-title">Catalogos</div>

            <RouterLink to="/app/clientes" class="menu-item" @click="onMenuClick">
                <i class="fas fa-users"></i>
                <span>Clientes</span>
            </RouterLink>

            <RouterLink to="/app/productos" class="menu-item" @click="onMenuClick">
                <i class="fas fa-box"></i>
                <span>Productos</span>
            </RouterLink>

            <RouterLink to="/app/categorias" class="menu-item" @click="onMenuClick">
                <i class="fas fa-tags"></i>
                <span>Categorias</span>
            </RouterLink>

            <RouterLink to="/app/proveedores" class="menu-item" @click="onMenuClick">
                <i class="fas fa-truck"></i>
                <span>Proveedores</span>
            </RouterLink>

            <RouterLink to="/app/metodos-pago" class="menu-item" @click="onMenuClick">
                <i class="fas fa-credit-card"></i>
                <span>Metodos de pago</span>
            </RouterLink>

            <RouterLink to="/app/productos-proveedores" class="menu-item" @click="onMenuClick">
                <i class="fas fa-link"></i>
                <span>Productos x Proveedores</span>
            </RouterLink>

            <div class="menu-title">Control</div>

            <RouterLink to="/app/movimientos" class="menu-item" @click="onMenuClick">
                <i class="fas fa-exchange-alt"></i>
                <span>Movimientos</span>
            </RouterLink>

            <RouterLink to="/app/historial-compras" class="menu-item" @click="onMenuClick">
                <i class="fas fa-history"></i>
                <span>Historial de compras</span>
            </RouterLink>

            <RouterLink to="/app/notificaciones" class="menu-item" @click="onMenuClick">
                <i class="fas fa-bell"></i>
                <span>Notificaciones</span>
            </RouterLink>

            <div class="menu-title">Configuracion</div>

            <RouterLink to="/app/configuracion/ajustes" class="menu-item" @click="onMenuClick">
                <i class="fas fa-cog"></i>
                <span>Ajustes</span>
            </RouterLink>

            <RouterLink to="/app/configuracion/usuarios" class="menu-item" @click="onMenuClick">
                <i class="fas fa-user-shield"></i>
                <span>Usuarios / Roles</span>
            </RouterLink>

            <RouterLink to="/app/configuracion/reportes" class="menu-item" @click="onMenuClick">
                <i class="fas fa-chart-bar"></i>
                <span>Reportes</span>
            </RouterLink>

            <div class="menu-divider"></div>

            <a href="/logout" class="menu-item" @click.prevent="onLogout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Cerrar Sesion</span>
            </a>
        </nav>
    </aside>
</template>

<script setup>
// El sidebar es solo UI; el comportamiento lo maneja el layout padre.
defineProps({
    isOpen: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['close', 'menu-click']);

const onMenuClick = () => {
    // El layout decide si debe cerrarse en mobile.
    emit('menu-click');
};

const onLogout = async () => {
    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    try {
        await fetch('/logout', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'X-CSRF-TOKEN': token ?? '',
                'Accept': 'application/json',
            },
        });
    } catch (error) {
        // Si falla, intentamos redirigir de todas formas.
    }

    window.location.href = '/';
};
</script>

<style src="@/assets/css/components/sidebar.css"></style>


