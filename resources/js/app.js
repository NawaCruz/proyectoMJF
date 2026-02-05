import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import AppRouter from './AppRouter.vue';
import Login from './views/Login.vue';
import Register from './views/Register.vue';
import router from './router';

const appElement = document.getElementById('app');

if (appElement) {
    const page = appElement.dataset.page;
    const RootComponent = page === 'login'
        ? Login
        : page === 'register'
            ? Register
            : page === 'spa'
                ? AppRouter
                : App;

    const app = createApp(RootComponent);

    if (page === 'spa') {
        app.use(router);
    }

    app.mount('#app');
}

