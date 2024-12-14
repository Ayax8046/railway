<template>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center align-items-center">
            <img src="../../../../public/images/restaurante/logo_restaurante.png" class="img-fluid rounded" alt="...">
        </div>

        <div class="mt-5 p-3 rounded" style="background-color: #f3ede8; border: 1px solid #37281c;">
            <h3 class="fs-3 text-uppercase fw-bold text-decoration-underline text-center" style="color: #37281c;">¿QUÉ
                OFRECEMOS EN NUESTRO RESTAURANTE?</h3>

            <p class="mt-3 fs-5" style="color: #37281c;">
                En nuestro restaurante ofrecemos unas cuantas variedades de ofertas entre las cuales encontraras
                hamburguesas, perritos y nuggets.
            </p>

            <p class="mt-3 fs-5" style="color: #37281c;">
                Aunque a dia de hoy nuestro catalogo no es muy amplio, nuestras especialidades son de la mayor calidad,
                carne 100% vacuno madurada +30 dias.
            </p>
        </div>

        <!-- PRIMERA FILA -->
        <div class="d-flex align-items-center justify-content-center row row-cols-auto row-gap-4 mt-5">

            <div class="col">
                <div class="card" style="background-color: #8B0000;">
                    <div class="card-header">
                        <h2 class="text-center fs-1 fw-bold" style="color: #FFD700;">MENÚ POLLO</h2>
                    </div>
                    <div class="card-body" style="background-color: #f3ede8;">
                        <h5 class="card-title text-center fs-3 fw-bold" style="color: #251c14; letter-spacing: 1px;">
                            5.95€
                            / Persona</h5>

                        <hr class="mt-2 mb-2">

                        <ul>
                            <li>
                                <i class="bi bi-check-lg" style="color: #FFD700; font-size: 16px;"><span
                                        style="color: #8B0000;"> Patatas Incluidas</span></i>
                            </li>
                            <li>
                                <i class="bi bi-check-lg" style="color: #FFD700; font-size: 16px;"><span
                                        style="color: #8B0000;"> Bebida Incluida</span></i>
                            </li>
                        </ul>

                        <div class="mt-4">
                            <div class="d-flex justify-content-center rounded" style="background-color: #FF6347;">
                                <button @click="redirectToReserva1" class="btn text-uppercase fw-bold"
                                    style="color: #FFFFFF;"><i class="bi bi-caret-right-fill"></i>Reservar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #8B0000;">
                        <br>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="background-color: #8B0000;">
                    <div class="card-header">
                        <h2 class="text-center fs-1 fw-bold" style="color: #FFD700;">MENÚ PARRILLA</h2>
                    </div>
                    <div class="card-body" style="background-color: #f3ede8;">
                        <h5 class="card-title text-center fs-3 fw-bold" style="color: #251c14; letter-spacing: 1px;">
                            6.95€
                            / Persona</h5>

                        <hr class="mt-2 mb-2">

                        <ul>
                            <li>
                                <i class="bi bi-check-lg" style="color: #FFD700; font-size: 16px;"><span
                                        style="color: #8B0000;"> Patatas Incluidas</span></i>
                            </li>
                            <li>
                                <i class="bi bi-check-lg" style="color: #FFD700; font-size: 16px;"><span
                                        style="color: #8B0000;"> Bebida Incluida</span></i>
                            </li>
                        </ul>

                        <div class="mt-4">
                            <div class="d-flex justify-content-center rounded" style="background-color: #FF6347;">
                                <button @click="redirectToReserva2" class="btn text-uppercase fw-bold"
                                    style="color: #FFFFFF;"><i class="bi bi-caret-right-fill"></i>Reservar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #8B0000;">
                        <br>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="background-color: #8B0000;">
                    <div class="card-header">
                        <h2 class="text-center fs-1 fw-bold" style="color: #FFD700;">MENÚ PERRITO</h2>
                    </div>
                    <div class="card-body" style="background-color: #f3ede8;">
                        <h5 class="card-title text-center fs-3 fw-bold" style="color: #251c14; letter-spacing: 1px;">
                            3.5€
                            / Persona</h5>

                        <hr class="mt-2 mb-2">

                        <ul>
                            <li>
                                <i class="bi bi-check-lg" style="color: #FFD700; font-size: 16px;"><span
                                        style="color: #8B0000;"> Patatas Incluidas</span></i>
                            </li>
                            <li>
                                <i class="bi bi-check-lg" style="color: #FFD700; font-size: 16px;"><span
                                        style="color: #8B0000;"> Bebida Incluida</span></i>
                            </li>
                        </ul>

                        <div class="mt-4">
                            <div class="d-flex justify-content-center rounded" style="background-color: #FF6347;">
                                <button @click="redirectToReserva3" class="btn text-uppercase fw-bold"
                                    style="color: #FFFFFF;"><i class="bi bi-caret-right-fill"></i>Reservar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #8B0000;">
                        <br>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="background-color: #8B0000;">
                    <div class="card-header">
                        <h2 class="text-center fs-1 fw-bold" style="color: #FFD700;">NUGGETS</h2>
                    </div>
                    <div class="card-body" style="background-color: #f3ede8;">
                        <h5 class="card-title text-center fs-3 fw-bold" style="color: #251c14; letter-spacing: 1px;">
                            4.5€
                            / Persona</h5>

                        <hr class="mt-2 mb-2">

                        <ul>
                            <li>
                                <i class="bi bi-check-lg" style="color: #FFD700; font-size: 16px;"><span
                                        style="color: #8B0000;"> Patatas Incluidas</span></i>
                            </li>
                            <li>
                                <i class="bi bi-check-lg" style="color: #FFD700; font-size: 16px;"><span
                                        style="color: #8B0000;"> Bebida Incluida</span></i>
                            </li>
                        </ul>

                        <div class="mt-4">
                            <div class="d-flex justify-content-center rounded" style="background-color: #FF6347;">
                                <button @click="redirectToReserva4" class="btn text-uppercase fw-bold"
                                    style="color: #FFFFFF;"><i class="bi bi-caret-right-fill"></i>Reservar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #8B0000;">
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Restaurante',
    methods: {
        redirectToReserva1() {
            window.location.href = '/reservar-restaurante/1';
        },
        redirectToReserva2() {
            window.location.href = '/reservar-restaurante/2';
        },
        redirectToReserva3() {
            window.location.href = '/reservar-restaurante/3';
        },
        redirectToReserva4() {
            window.location.href = '/reservar-restaurante/4';
        },
    },
};
</script>

<style></style>