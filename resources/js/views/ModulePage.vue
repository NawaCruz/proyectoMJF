<template>
    <Layout :title="title">
        <section class="module-placeholder">
            <h2>{{ title }}</h2>
            <p>Este modulo aun no tiene contenido real. Aqui puedes agregar tu vista.</p>
        </section>
    </Layout>
</template>

<script setup>
import Layout from '../layouts/Layout.vue';

// Pagina generica para modulos sin vista propia.
defineProps({
    title: {
        type: String,
        default: 'Modulo',
    },
});
</script>

<style>
.module-placeholder {
    background: white;
    border-radius: var(--radius);
    padding: 24px;
    box-shadow: var(--shadow);
}

.module-placeholder h2 {
    font-size: 1.4rem;
    color: var(--dark-color);
    margin-bottom: 8px;
}

.module-placeholder p {
    color: var(--gray-dark);
}
</style>
