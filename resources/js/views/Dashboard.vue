<template>
    <Layout title="Dashboard">
        <section class="table-container">
            <div class="table-header">
                <h3 class="table-title">Ordenes Recientes</h3>
                <div class="table-actions">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-plus"></i> Nueva Orden
                    </button>
                    <button class="btn btn-secondary" type="button">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#00125</td>
                        <td>Empresa XYZ</td>
                        <td>15 Mar 2023</td>
                        <td>$1,250.00</td>
                        <td><span class="status-badge status-active">Completado</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit" type="button" @click="editItem">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon delete" type="button" @click="deleteItem">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#00124</td>
                        <td>Tienda ABC</td>
                        <td>14 Mar 2023</td>
                        <td>$850.50</td>
                        <td><span class="status-badge status-pending">Pendiente</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit" type="button" @click="editItem">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon delete" type="button" @click="deleteItem">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#00123</td>
                        <td>Academia Plus</td>
                        <td>13 Mar 2023</td>
                        <td>$2,150.00</td>
                        <td><span class="status-badge status-active">Completado</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit" type="button" @click="editItem">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon delete" type="button" @click="deleteItem">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#00122</td>
                        <td>Eventos Grandes</td>
                        <td>12 Mar 2023</td>
                        <td>$3,750.00</td>
                        <td><span class="status-badge status-active">Completado</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit" type="button" @click="editItem">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon delete" type="button" @click="deleteItem">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#00121</td>
                        <td>Corporacion DEF</td>
                        <td>11 Mar 2023</td>
                        <td>$950.00</td>
                        <td><span class="status-badge status-cancelled">Cancelado</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit" type="button" @click="editItem">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon delete" type="button" @click="deleteItem">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </Layout>
</template>

<script setup>
import Layout from '../layouts/Layout.vue';

// Las acciones de la tabla son temporales hasta conectar datos reales.
const editItem = () => {
    alert('Editar elemento seleccionado');
};

const deleteItem = () => {
    if (confirm('Estas seguro de eliminar este elemento?')) {
        alert('Elemento eliminado');
    }
};
</script>

<style src="@/assets/css/components/recent-orders.css"></style>

