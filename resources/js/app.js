import { createApp } from 'vue';
import App from './App.vue';
import Navegacion from './includes/navegacion.vue';
import router from './router/index';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

createApp(App)
    .use(router)
    .mount('#app');

createApp(Navegacion).use(router).mount('#navegacion');
