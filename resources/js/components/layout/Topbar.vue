<template>
    <header class="header">
        <div class="header-left">
            <button class="sidebar-toggle" type="button" @click="$emit('toggle-sidebar')">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="page-title">{{ title }}</h1>
        </div>

        <div class="header-right">
            <div class="header-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Buscar en el sistema...">
            </div>

            <div class="header-actions">
                <button class="header-action" type="button" @click="$emit('open-notifications')">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </button>

                <button class="header-action" type="button">
                    <i class="fas fa-envelope"></i>
                    <span class="badge">5</span>
                </button>

                <button class="header-action" type="button">
                    <i class="fas fa-cog"></i>
                </button>
            </div>

            <button class="user-profile" type="button" @click="$emit('show-profile')">
                <div class="user-avatar">MJF</div>
                <div class="user-info">
                    <div class="user-name">MJF Team</div>
                    <div class="user-role">Administrador</div>
                </div>
                <i class="fas fa-chevron-down user-chevron"></i>
            </button>
        </div>
    </header>
</template>

<script setup>
// El topbar emite eventos para que el layout responda.
defineProps({
    title: {
        type: String,
        default: 'Dashboard',
    },
});

defineEmits(['toggle-sidebar', 'open-notifications', 'show-profile']);
</script>

<style src="@/assets/css/components/topbar.css"></style>


