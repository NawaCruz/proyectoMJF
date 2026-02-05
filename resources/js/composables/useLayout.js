import { onBeforeUnmount, onMounted, ref } from 'vue';

// Estado y acciones compartidas para el layout (sidebar, modal y animaciones).
export const useLayout = () => {
    // Estados base del layout.
    const isSidebarOpen = ref(false);
    const isSidebarCollapsed = ref(false);
    const isNotificationsOpen = ref(false);
    const contentVisible = ref(false);

    // Detecta si estamos en vista desktop.
    const isDesktop = () => window.innerWidth >= 992;

    // Alterna sidebar: colapsa en desktop, abre/cierra en mobile.
    const toggleSidebar = () => {
        if (isDesktop()) {
            isSidebarCollapsed.value = !isSidebarCollapsed.value;
            return;
        }

        isSidebarOpen.value = !isSidebarOpen.value;
    };

    // Cierra el sidebar (uso general).
    const closeSidebar = () => {
        isSidebarOpen.value = false;
    };

    // Cierra el sidebar solo en mobile.
    const closeSidebarOnMobile = () => {
        if (!isDesktop()) {
            isSidebarOpen.value = false;
        }
    };

    // Controla la apertura del modal de notificaciones.
    const openNotifications = () => {
        isNotificationsOpen.value = true;
    };

    const closeNotifications = () => {
        isNotificationsOpen.value = false;
    };

    // Ajusta estados si cambia el tamaño de la pantalla.
    const handleResize = () => {
        if (!isDesktop()) {
            isSidebarCollapsed.value = false;
        }
    };

    // Placeholder para el menú de usuario.
    const showProfileMenu = () => {
        alert('Menu de usuario desplegado. Aqui irian opciones como perfil, ajustes, cerrar sesion.');
    };

    let contentTimer = null;

    onMounted(() => {
        // Escucha cambios de tamaño y habilita la animación del contenido.
        window.addEventListener('resize', handleResize);

        contentTimer = setTimeout(() => {
            contentVisible.value = true;
        }, 300);
    });

    onBeforeUnmount(() => {
        // Limpia listeners y timers para evitar fugas de memoria.
        window.removeEventListener('resize', handleResize);

        if (contentTimer) {
            clearTimeout(contentTimer);
        }
    });

    return {
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
    };
};

