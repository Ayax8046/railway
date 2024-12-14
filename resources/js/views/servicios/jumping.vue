<template>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center align-items-center">
            <img src="../../../../public/images/jumpig/saltar.png" class="img-fluid rounded" alt="...">
        </div>

        <div class="mt-5 p-3 rounded" style="background-color: #ebe4de; border: 1px solid #37281c;">
            <h3 class="fs-3 text-uppercase fw-bold text-decoration-underline text-center" style="color: #37281c;">¿QUÉ
                OFRECEMOS EN PAINTBALL RECREO INFINITO?</h3>

            <p class="mt-3 fs-5" style="color: #37281c;">
                Nuestras instalaciones de Paintball están consideradas como
                unas de las mejores de
                España y Europa. En ellas podrás disfrutar de un día intenso de deporte de acción y adrenalina en sus 7
                escenarios totalmente tematizados y con sus diferentes modalidades de juego, estando supervisado por uno
                de nuestros monitores que acompañará al grupo en todo momento.
            </p>

            <p class="mt-3 fs-5" style="color: #37281c;">
                Contamos con un amplio arsenal de equipamiento y accesorios que
                permitirán disfrutar a tí y a tu grupo de estas maravillosas partidas de Paintball
                con la máxima seguridad.
            </p>

            <p class="mt-3 fs-5" style="color: #37281c;">
                Disponemos de una gran variedad de replicas de armas (Réplicas de M16, AK47, M4, G36…) con las que
                podras disfrutar al maximo de esta
                experiencia, sumergiendote en el realismo y la acción de tus partidas. Además de nuestros trajes de
                camuflajes que te brindaran ese plus para alcanzar el realismo que andas buscando.
            </p>

            <p class="mt-3 fs-5" style="color: #37281c;">
                Nuestras instalaciones son ideales para grupos de amigos, compañeros de trabajo, familias que busquen un
                día
                de ocio y emoción, ideal para fiestas de cumpleaños, despedidas de solteros o despedidas de soltera,
                empresas, colegios, comuniones, competiciones de paintball y deportivas, cualquier reunión será la
                excusa
                ideal para echar un día con los tuyos. Además, nosotros también pensamos en los más peques y por ello
                ofrecemos partidas y equipamiento adecuado para que los niños puedan vivir la experiencia del paintball.
            </p>

            <p class="mt-3 fs-5 text-center" style="color: #37281c;">
                Si nunca has jugado al paintball, <span class="fw-bold">¡hazlo con nosotros!</span><br>Te
                garantizamos que lo harás al mejor precio y con
                los mejores servicios de España.
            </p>
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

        <div class="mt-5 p-3 rounded" style="background-color: #ebe4de; border: 1px solid #37281c;">
            <h3 class="fs-3 text-uppercase fw-bold text-decoration-underline" style="color: #37281c;">Food Truck / BBQ
            </h3>
            <p class="mt-3 fs-5" style="color: #37281c;">En Paintball Recreo infinito tenemos un Food Truck
                espectacular, totalmente customizado.</p>

            <p class="mt-3 fs-5" style="color: #37281c;">Nuestro buffet al más puro estilo TEXAS BBQ con barra libre de
                refrescos, cervezas y agua consisten en:
                Hamburguesas, Hot dog, filetes de pollo, filete de lomo, pinchitos, costillas y chorizo español.</p>

            <p class="mt-3 fs-5" style="color: #37281c;">Hemos montado una cocina industrial dentro de nuestro Food Truk
                y ahí es donde elaboramos todos los
                alimentos, siguiendo las más estrictas medidas de seguridad e higiénicas que dicta Sanidad, las personas
                que elaboran los alimentos tienen los certificados de manipulación de alimentos para que puedas
                disfrutar de una comida excelente con todas las garantías alimenticias.</p>
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