<template>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center align-items-center">
            <img src="../../../../public/images/recreativo/logo_arcade.png" class="img-fluid rounded" alt="...">
        </div>

        <div class="mt-5 p-3 rounded" style="background-color: #5ce1e6; border: 1px solid #37281c;">
            <h3 class="fs-3 text-uppercase fw-bold text-decoration-underline text-center" style="color: #37281c;">¿QUÉ
                OFRECEMOS EN ZONA OCIO RECREO INFINITO?</h3>

            <p class="mt-3 fs-5" style="color: black;">
                Nuestras instalaciones de zona ocio cuentan con las mas novedosas máquinas de arcade y lo último en
                juegos de mesa para jugar con amigos o con la familia.
            </p>

            <p class="mt-3 fs-5" style="color: black;">
                Contamos con más de 100 juegos de arcade distintos, desde el mítico Pac-Man, hasta el entretenido Tetris !!
            </p>

            <p class="mt-3 fs-5" style="color: black;">
                Seras capaz de conquistar el mundo y derrotar a tus amigos en el Risk o desplomarles los bolsillos jugado Monopoly !!
            </p>

            <p class="mt-3 fs-5" style="color: black;">
                Acérquense y vengan a disfrutar de esta gran experiencia !!
            </p>
        </div>

        <!-- PRIMERA FILA -->
        <div class="d-flex align-items-center justify-content-center row row-cols-auto row-gap-4 mt-5">

            <!-- PRIMERA FILA | CARD IZQUIERDA -->
            <div class="col">
                <div class="card" style="background-color: #5ce1e6;">
                    <div class="card-header">
                        <h2 class="text-black text-center fs-1 fw-bold">OFERTA 1</h2>
                    </div>
                    <div class="card-body" style="background-color: #f3ede8;">
                        <h5 class="card-title text-center fs-3 fw-bold" style="color: black; letter-spacing: 1px;">10€
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
                            <li>
                                <i class="bi bi-check-lg" style="color: #e5a40f; font-size: 16px;"><span
                                        style="color: #37281c;"> Arcades</span></i>
                            </li>
                            <li>
                                <i class="bi bi-check-lg" style="color: #e5a40f; font-size: 16px;"><span
                                        style="color: #37281c;"> Juegos de Mesa</span></i>
                            </li>
                        </ul>

                        <div class="mt-4">
                            <div class="d-flex justify-content-center rounded" style="background-color: #ebe4de;">
                                <button @click="redirectToReserva1" class="btn text-uppercase fw-bold"
                                    style="color: #37281c;"><i class="bi bi-caret-right-fill"></i>Reservar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #5ce1e6;">
                        <br>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="background-color: #5ce1e6;">
                    <div class="card-header">
                        <h2 class="text-black text-center fs-1 fw-bold">Torneos</h2>
                    </div>
                    <div class="card-body" style="background-color: #f3ede8;">
                        <h5 class="card-title text-center fs-3 fw-bold" style="color: black; letter-spacing: 1px;">x€
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
                            <li>
                                <i class="bi bi-check-lg" style="color: #e5a40f; font-size: 16px;"><span
                                        style="color: #37281c;"> Arcades</span></i>
                            </li>
                            <li>
                                <i class="bi bi-check-lg" style="color: #e5a40f; font-size: 16px;"><span
                                        style="color: #37281c;"> Juegos de Mesa</span></i>
                            </li>
                        </ul>

                        <div class="mt-4">
                            <div class="d-flex justify-content-center rounded" style="background-color: #ebe4de;">
                                <button class="btn text-uppercase fw-bold"
                                    style="color: #37281c;"><i class="bi bi-caret-right-fill"></i>Proximamente</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #5ce1e6;">
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Ocio',
    methods: {
        redirectToReserva1() {
            window.location.href = '/reservar-ocio/1';
        },
    },
};
</script>

<style></style>