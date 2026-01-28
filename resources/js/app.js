import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import Login from './pages/Login.vue';
import Register from './pages/Register.vue';

const appElement = document.getElementById('app');

if (appElement) {
    const page = appElement.dataset.page;
    const RootComponent = page === 'login' ? Login : page === 'register' ? Register : App;
    createApp(RootComponent).mount('#app');
}
