<template>
    <div class="modal" :class="{ open }" @click.self="$emit('close')">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Notificaciones</h3>
                <button class="modal-close" type="button" @click="$emit('close')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="notification-row">
                    <div class="notification-icon notification-icon--primary">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div>
                        <div class="notification-title">Nueva orden recibida</div>
                        <div class="notification-time">Hace 10 minutos</div>
                    </div>
                </div>

                <div class="notification-row">
                    <div class="notification-icon notification-icon--success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <div class="notification-title">Proyecto completado</div>
                        <div class="notification-time">Hace 2 horas</div>
                    </div>
                </div>

                <div class="notification-row notification-row--last">
                    <div class="notification-icon notification-icon--warning">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div>
                        <div class="notification-title">Ticket urgente asignado</div>
                        <div class="notification-time">Hace 5 horas</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
// El modal recibe el estado abierto y avisa cuando debe cerrarse.
defineProps({
    open: {
        type: Boolean,
        default: false,
    },
});

defineEmits(['close']);
</script>

<style src="@/assets/css/components/notifications-modal.css"></style>


