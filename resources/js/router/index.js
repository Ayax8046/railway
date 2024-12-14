import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import paintball from '../views/servicios/paintball.vue';
import restaurante from '../views/servicios/restaurante.vue';
import ocio from '../views/servicios/ocio.vue';
import karts from '../views/servicios/karts.vue';
import jumping from '../views/servicios/jumping.vue';
import NotFound from '../views/Errores/NotFound.vue';
import NotPermission from '../views/Errores/NotPermission.vue';

const routes = [
    { path: '/', name: 'home', component: Home }, // Ruta para Home
    { path: '/servicios/paintball', name: 'paintball', component: paintball }, // Ruta para Paintball
    { path: '/servicios/restaurante', name: 'restaurante', component: restaurante }, // Ruta para Paintball
    { path: '/servicios/ocio', name: 'ocio', component: ocio }, // Ruta para Paintball
    { path: '/servicios/karts', name: 'karts', component: karts }, // Ruta para Paintball
    { path: '/servicios/jumping', name: 'jumping', component: jumping }, // Ruta para Paintball
    { path: '/:pathMatch(.*)*', name: 'not-found', component: NotFound }, // Ruta para las páginas no encontradas
    { path: '/errores/NotPermission', name: 'Not-Permission', component: NotPermission }
];

const router = createRouter({
    history: createWebHistory(), // Usa el modo de historial para que coincida con las rutas de Laravel
    routes,
});

// Cambiar el fondo según la ruta
router.beforeEach((to, from, next) => {
    const body = document.body;

    // Definir los colores de fondo según la ruta
    if (to.name === 'home') {
        body.style.background = 'linear-gradient(to right, #009edb, #009edb)';
    } else if (to.name === 'paintball') {
        body.style.background = 'linear-gradient(to right, #FF5733, #FFBD33)';
    } else if (to.name === 'restaurante') {
        body.style.background = 'linear-gradient(to right, #8B0000, #FF6347)';
    } else if (to.name === 'ocio') {
        body.style.background = 'linear-gradient(to bottom, #FFD700, #FF4500)';
    } else if (to.name === 'karts') {
        body.style.background = 'radial-gradient(circle, #f8f9fa, #d1d1d1)';
    } else if (to.name === 'jumping') {
        body.style.background = 'linear-gradient(to right, #5ce1e6, #5ce1e6)';
    } else if (to.name === 'not-found') {

    } else {
        body.style.background = ''; // Fondo por defecto
    }

    next();
});

export default router;
