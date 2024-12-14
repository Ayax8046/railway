<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="../../../public/images/logo.png" alt="Logo" width="100%" height="24"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Asegúrate de que esta sea la única sección 'navbar-collapse' -->
            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/servicios/paintball">Paintball</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/servicios/restaurante">Restaurante</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/servicios/karts">Karts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/servicios/ocio">Zona Ocio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/servicios/jumping">Jumping Zone</a>
                    </li>
                </ul>

                <ul v-if="!user" class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/login">Iniciar Sesión</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/register">Registro</a>
                    </li>
                </ul>

                <ul v-if="user" class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/profile/edit" >Perfil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/logout" @click.prevent="logout">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import axios from "axios";

export default {
    name: "Navegacion",
    data() {
        return {
            user: null, // Almacena los datos del usuario autenticado
        };
    },
    methods: {
        async fetchUser() {
            try {
                const response = await axios.get("/user");
                this.user = response.data;
            } catch (error) {
                this.user = null; // Si no hay usuario autenticado
            }
        },
        async logout() {
            try {
                await axios.post("/logout"); // Enviar solicitud de logout
                this.user = null; // Limpiar los datos del usuario en el frontend
                this.$router.push("/"); // Redirigir al login después de cerrar sesión
            } catch (error) {
                console.error("Error al cerrar sesión:", error);
            }
        },
    },
    mounted() {
        this.fetchUser(); // Obtener los datos del usuario al montar el componente
    },
};
</script>

<style></style>