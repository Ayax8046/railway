<template>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center align-items-center">
            <img src="../../../../public/images/jumpig/saltar.png" class="img-fluid rounded" alt="...">
        </div>

        <!-- PRIMERA FILA -->
        <div class="d-flex align-items-center justify-content-center row row-cols-auto row-gap-4 mt-5">

            <!-- PRIMERA FILA | CARD IZQUIERDA -->
            <div class="col">
                <div class="card" style="background-color: #251c14;">
                    <div class="card-header">
                        <h2 class="text-white text-center fs-1 fw-bold">JUMPTIME</h2>
                    </div>
                    <div class="card-body" style="background-color: #f3ede8;">
                        <h5 class="card-title text-center fs-3 fw-bold" style="color: #251c14; letter-spacing: 1px;">14€
                            / Persona</h5>

                        <hr class="mt-2 mb-2">

                        <ul>
                            <li>
                                <i class="bi bi-check-lg" style="color: #e5a40f; font-size: 16px;"><span
                                        style="color: #37281c;"> 1h</span></i>
                            </li>
                        </ul>

                        <div class="mt-4">
                            <div class="d-flex justify-content-center rounded" style="background-color: #ebe4de;">
                                <button @click="redirectToReserva1" class="btn text-uppercase fw-bold"
                                    style="color: #37281c;"><i class="bi bi-caret-right-fill"></i>Reservar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #251c14;">
                        <br>
                    </div>
                </div>
            </div>

            <!-- PRIMERA FILA | CARD CENTRO -->
            <div class="col">
                <div class="card" style="background-color: #251c14;">
                    <div class="card-header">
                        <h2 class="text-white text-center fs-1 fw-bold">JUMPTIME</h2>
                    </div>
                    <div class="card-body" style="background-color: #f3ede8;">
                        <h5 class="card-title text-center fs-3 fw-bold" style="color: #251c14; letter-spacing: 1px;">24€
                            / Persona</h5>

                        <hr class="mt-2 mb-2">

                        <ul>
                            <li>
                                <i class="bi bi-check-lg" style="color: #e5a40f; font-size: 16px;"><span
                                        style="color: #37281c;"> 2h</span></i>
                            </li>
                            <li>
                                <i class="bi bi-check-lg" style="color: #e5a40f; font-size: 16px;"><span
                                        style="color: #37281c;"> Bebida Gratis</span></i>
                            </li>
                        </ul>

                        <div class="mt-4">
                            <div class="d-flex justify-content-center rounded" style="background-color: #ebe4de;">
                                <button @click="redirectToReserva2" class="btn text-uppercase fw-bold"
                                    style="color: #37281c;"><i class="bi bi-caret-right-fill"></i>Reservar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #251c14;">
                        <br>
                    </div>
                </div>
            </div>

            <!-- PRIMERA FILA | CARD DERECHA -->
            <div class="col">
                <div class="card" style="background-color: #251c14;">
                    <div class="card-header">
                        <h2 class="text-white text-center fs-1 fw-bold">JUMPTIME</h2>
                    </div>
                    <div class="card-body" style="background-color: #f3ede8;">
                        <h5 class="card-title text-center fs-3 fw-bold" style="color: #251c14; letter-spacing: 1px;">34€
                            / Persona</h5>

                        <hr class="mt-2 mb-2">

                        <ul>
                            <li>
                                <i class="bi bi-check-lg" style="color: #e5a40f; font-size: 16px;"><span
                                        style="color: #37281c;"> 3h</span></i>
                            </li>
                            <li>
                                <i class="bi bi-check-lg" style="color: #e5a40f; font-size: 16px;"><span
                                        style="color: #37281c;"> Bebida Gratis</span></i>
                            </li>
                        </ul>

                        <div class="mt-4">
                            <div class="d-flex justify-content-center rounded" style="background-color: #ebe4de;">
                                <button @click="redirectToReserva3" class="btn text-uppercase fw-bold"
                                    style="color: #37281c;"><i class="bi bi-caret-right-fill"></i>Reservar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #251c14;">
                        <br>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'Jumping',
    methods: {
        redirectToReserva1() {
            window.location.href = '/reservar-jumping/1';
        },
        redirectToReserva2() {
            window.location.href = '/reservar-jumping/2';
        },
        redirectToReserva3() {
            window.location.href = '/reservar-jumping/3';
        },
    },
};
</script>

<style></style>