<template>
    <div class="layout" :class="{ 'sidebar-collapsed': isSidebarCollapsed }">
        <!-- Layout shell: sidebar + topbar + content + footer -->
        <Sidebar
            :is-open="isSidebarOpen"
            @close="closeSidebar"
            @menu-click="closeSidebarOnMobile"
        />

        <div class="main-content">
            <Topbar
                :title="title"
                @toggle-sidebar="toggleSidebar"
                @open-notifications="openNotifications"
                @show-profile="showProfileMenu"
            />

            <main class="content" :class="{ 'content-visible': contentVisible }">
                <slot />
            </main>

            <Footer />
        </div>

        <NotificationsModal :open="isNotificationsOpen" @close="closeNotifications" />
    </div>
</template>

<script setup>
import Footer from '../components/layout/Footer.vue';
import NotificationsModal from '../components/layout/NotificationsModal.vue';
import Sidebar from '../components/layout/Sidebar.vue';
import Topbar from '../components/layout/Topbar.vue';
import { useLayout } from '../composables/useLayout';

// El titulo lo provee la pagina que usa el layout.
const props = defineProps({
    title: {
        type: String,
        default: 'Dashboard',
    },
});

const {
    isSidebarOpen,
    isSidebarCollapsed,
    isNotificationsOpen,
    contentVisible,
    toggleSidebar,
    closeSidebar,
    closeSidebarOnMobile,
    openNotifications,
    closeNotifications,
    showProfileMenu,
} = useLayout();
</script>

<style src="@/assets/css/theme.css"></style>
<style src="@/assets/css/layout.css"></style>


