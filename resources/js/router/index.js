import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../views/Dashboard.vue';
import ModulePage from '../views/ModulePage.vue';

const routes = [
    {
        path: '/home',
        redirect: '/app/dashboard',
    },
    {
        path: '/app',
        redirect: '/app/dashboard',
    },
    {
        path: '/app/dashboard',
        name: 'dashboard',
        component: Dashboard,
    },
    {
        path: '/app/ventas',
        name: 'ventas',
        component: ModulePage,
        props: { title: 'Ventas' },
    },
    {
        path: '/app/compras',
        name: 'compras',
        component: ModulePage,
        props: { title: 'Compras' },
    },
    {
        path: '/app/caja',
        name: 'caja',
        component: ModulePage,
        props: { title: 'Caja' },
    },
    {
        path: '/app/clientes',
        name: 'clientes',
        component: ModulePage,
        props: { title: 'Clientes' },
    },
    {
        path: '/app/productos',
        name: 'productos',
        component: ModulePage,
        props: { title: 'Productos' },
    },
    {
        path: '/app/categorias',
        name: 'categorias',
        component: ModulePage,
        props: { title: 'Categorias' },
    },
    {
        path: '/app/proveedores',
        name: 'proveedores',
        component: ModulePage,
        props: { title: 'Proveedores' },
    },
    {
        path: '/app/metodos-pago',
        name: 'metodos-pago',
        component: ModulePage,
        props: { title: 'Metodos de pago' },
    },
    {
        path: '/app/productos-proveedores',
        name: 'productos-proveedores',
        component: ModulePage,
        props: { title: 'Productos x Proveedores' },
    },
    {
        path: '/app/movimientos',
        name: 'movimientos',
        component: ModulePage,
        props: { title: 'Movimientos' },
    },
    {
        path: '/app/historial-compras',
        name: 'historial-compras',
        component: ModulePage,
        props: { title: 'Historial de compras' },
    },
    {
        path: '/app/notificaciones',
        name: 'notificaciones',
        component: ModulePage,
        props: { title: 'Notificaciones' },
    },
    {
        path: '/app/configuracion/ajustes',
        name: 'ajustes',
        component: ModulePage,
        props: { title: 'Ajustes' },
    },
    {
        path: '/app/configuracion/usuarios',
        name: 'usuarios',
        component: ModulePage,
        props: { title: 'Usuarios / Roles' },
    },
    {
        path: '/app/configuracion/reportes',
        name: 'reportes',
        component: ModulePage,
        props: { title: 'Reportes' },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass: 'active',
    linkExactActiveClass: 'active',
    scrollBehavior() {
        return { top: 0 };
    },
});

export default router;

