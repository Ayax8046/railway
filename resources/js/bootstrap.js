import axios from 'axios';

// Obtén el token CSRF del meta tag
const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
  // Configura el token CSRF en las cabeceras de Axios
  axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content;
}

// Otras configuraciones de Axios
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

