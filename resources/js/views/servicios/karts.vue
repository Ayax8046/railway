<template>
    <div class="container mt-5 mb-5" style="width: 60rem;">
        <div class="card-body">
            <img src="../../../../public/images/karts/kart_background.png" class="card-img-top" alt="...">
        </div>
    </div>

    <div class="container mt-5">

        <!-- PRIMERA OFERTA -->

        <div class="row mb-5 align-items-center">
            <div class="col-8">
                <div class="row row-gap-4">

                    <!-- PRIMERA FILA | CARD IZQUIERDA -->
                    <div class="col-6">
                        <div class="card" style="background-color: #0d6efd;">
                            <div class="card-header">
                                <h2 class="text-white">SENIOR</h2>
                            </div>
                            <div class="card-body" style="background-color: #30bd42;">
                                <p class="card-text"><i class="bi bi-speedometer"> 15CV - 390cc</i></p>
                                <p class="card-text"><i class="bi bi-stopwatch-fill"> {1 Sesión} 15 minutos</i></p>
                                <p class="card-text"><i class="bi bi-currency-euro">18 / persona</i></p>

                                <hr class="mt-2 mb-2">

                                <button @click="redirectToReserva1" class="btn btn-primary">Reservar</button>
                            </div>
                            <div class="card-footer" style="background-color: #0d6efd;">
                                <h4 class="text-white"></h4>
                            </div>
                        </div>
                    </div>

                    <!-- PRIMERA FILA | CARD DERECHA -->
                    <div class="col-6">
                        <div class="card" style="background-color: #0d6efd;">
                            <div class="card-header">
                                <h2 class="text-white">SENIOR</h2>
                            </div>
                            <div class="card-body" style="background-color: #30bd42;">

                                <p class="card-text"><i class="bi bi-speedometer"> 15CV - 390cc</i></p>
                                <p class="card-text"><i class="bi bi-stopwatch-fill"> {2 Sesiónes} 15 minutos - Con
                                        descanso entre ambas</i></p>
                                <p class="card-text"><i class="bi bi-currency-euro">30 / persona</i></p>

                                <hr class="mt-2 mb-2">

                                <button @click="redirectToReserva2" class="btn btn-primary">Reservar</button>
                            </div>

                            <!-- CARD FOOTER -->
                            <div class="card-footer" style="background-color: #0d6efd;"></div>
                        </div>
                    </div>

                    <!-- SEGUNDA FILA -->
                    <div class="col-12">
                        <div class="card" style="background-color: #0d6efd;">
                            <!-- CARD BODY -->
                            <div class="card-body" style="background-color: #0d6efd;">
                                <p class="card-text text-center" style="color: black;"><b>PARA PILOTOS CON POCA
                                        EXPERIENCIA EN KARTING O QUE QUIEREN DIVERTIRSE Y PASAR UN BUEN RATO ENTRE
                                        AMIGOS.</b></p>
                                <br>
                                <p class="card-text text-center" style="color: #ffffff;"><b>PISTA COMPARTIDA CON OTROS
                                        USUARIOS.<br>LAS RESERVAS TIENEN PRIORIDAD.</b></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- CARD IMAGEN -->
            <div class="col-4 d-flex justify-content-center">
                <div class="card" style="width: 25rem;">
                    <img src="../../../../public/images/karts/kart_verde.png" alt="hola">
                </div>
            </div>
        </div>

        <!-- SEGUNDA OFERTA -->
        <div class="row mb-5 align-items-center">

            <!-- CARD IMAGEN -->
            <div class="col-4 d-flex justify-content-center">
                <div class="card" style="width: 25rem;">
                    <img src="../../../../public/images/karts/kart_amarillo.png" alt="hola">
                </div>
            </div>

            <div class="col-8">
                <div class="row row-gap-4">

                    <!-- PRIMERA FILA | CARD IZQUIERDA -->
                    <div class="col-6">
                        <div class="card" style="background-color: #0d6efd;">
                            <div class="card-header">
                                <h2 class="text-white">SENIOR</h2>
                            </div>
                            <div class="card-body" style="background-color: #dfa528;">

                                <p class="card-text"><i class="bi bi-speedometer"> 18CV - 390cc</i></p>
                                <p class="card-text"><i class="bi bi-stopwatch-fill"> {1 Sesión} 15 minutos</i></p>
                                <p class="card-text"><i class="bi bi-currency-euro">20 / persona</i></p>

                                <hr class="mt-2 mb-2">

                                <button @click="redirectToReserva3" class="btn btn-primary">Reservar</button>
                            </div>
                            <div class="card-footer" style="background-color: #0d6efd;">
                                <h4 class="text-white"></h4>
                            </div>
                        </div>
                    </div>

                    <!-- PRIMERA FILA | CARD DERECHA -->
                    <div class="col-6">
                        <div class="card" style="background-color: #0d6efd;">
                            <div class="card-header">
                                <h2 class="text-white">SENIOR</h2>
                            </div>
                            <div class="card-body" style="background-color: #dfa528;">

                                <p class="card-text"><i class="bi bi-speedometer"> 18CV - 390cc</i></p>
                                <p class="card-text"><i class="bi bi-stopwatch-fill"> {2 Sesiónes} 15 minutos - Con
                                        descanso entre ambas</i></p>
                                <p class="card-text"><i class="bi bi-currency-euro">35 / persona</i></p>

                                <hr class="mt-2 mb-2">

                                <button @click="redirectToReserva4" class="btn btn-primary">Reservar</button>
                            </div>

                            <!-- CARD FOOTER -->
                            <div class="card-footer" style="background-color: #0d6efd;"></div>
                        </div>
                    </div>

                    <!-- SEGUNDA FILA -->
                    <div class="col-12">
                        <div class="card" style="background-color: #0d6efd;">
                            <!-- CARD BODY -->
                            <div class="card-body" style="background-color: #0d6efd;">
                                <p class="card-text text-center" style="color: black;"><b>PARA PILOTOS CON POCA
                                        EXPERIENCIA EN KARTING O QUE QUIEREN DIVERTIRSE Y PASAR UN BUEN RATO ENTRE
                                        AMIGOS.</b></p>
                                <br>
                                <p class="card-text text-center" style="color: #ffffff;"><b>PISTA COMPARTIDA CON OTROS
                                        USUARIOS.<br>LAS RESERVAS TIENEN PRIORIDAD.</b></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- TERCERA OFERTA -->
        <div class="row mb-5 align-items-center">
            <div class="col-8">
                <div class="row row-gap-4">

                    <!-- PRIMERA FILA | CARD IZQUIERDA -->
                    <div class="col-6">
                        <div class="card" style="background-color: #0d6efd;">
                            <div class="card-header">
                                <h2 class="text-white">SENIOR</h2>
                            </div>
                            <div class="card-body" style="background-color: #ac5da9;">

                                <p class="card-text"><i class="bi bi-speedometer"> 22CV - 460cc</i></p>
                                <p class="card-text"><i class="bi bi-stopwatch-fill"> {1 Sesión} 15 minutos</i></p>
                                <p class="card-text"><i class="bi bi-currency-euro">30 / persona</i></p>

                                <hr class="mt-2 mb-2">

                                <button @click="redirectToReserva5" class="btn btn-primary">Reservar</button>
                            </div>
                            <div class="card-footer" style="background-color: #0d6efd;">
                                <h4 class="text-white"></h4>
                            </div>
                        </div>
                    </div>

                    <!-- PRIMERA FILA | CARD DERECHA -->
                    <div class="col-6">
                        <div class="card" style="background-color: #0d6efd;">
                            <div class="card-header">
                                <h2 class="text-white">SENIOR</h2>
                            </div>
                            <div class="card-body" style="background-color: #ac5da9;">

                                <p class="card-text"><i class="bi bi-speedometer"> 22CV - 460cc</i></p>
                                <p class="card-text"><i class="bi bi-stopwatch-fill"> {2 Sesiónes} 15 minutos - Con
                                        descanso entre ambas</i></p>
                                <p class="card-text"><i class="bi bi-currency-euro">55 / persona</i></p>

                                <hr class="mt-2 mb-2">

                                <button @click="redirectToReserva6" class="btn btn-primary">Reservar</button>
                            </div>

                            <!-- CARD FOOTER -->
                            <div class="card-footer" style="background-color: #0d6efd;"></div>
                        </div>
                    </div>

                    <!-- SEGUNDA FILA -->
                    <div class="col-12">
                        <div class="card" style="background-color: #0d6efd;">
                            <!-- CARD BODY -->
                            <div class="card-body" style="background-color: #0d6efd;">
                                <p class="card-text text-center" style="color: black;"><b>PARA PILOTOS CON POCA
                                        EXPERIENCIA EN KARTING O QUE QUIEREN DIVERTIRSE Y PASAR UN BUEN RATO ENTRE
                                        AMIGOS.</b></p>
                                <br>
                                <p class="card-text text-center" style="color: #ffffff;"><b>PISTA COMPARTIDA CON OTROS
                                        USUARIOS.<br>LAS RESERVAS TIENEN PRIORIDAD.</b></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- CARD IMAGEN -->
            <div class="col-4 d-flex justify-content-center">
                <div class="card" style="width: 25rem;">
                    <img src="../../../../public/images/karts/kart_morado.png" alt="hola">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Karts',
    methods: {
        redirectToReserva1() {
            window.location.href = '/reservar-karts/1';
        },
        redirectToReserva2() {
            window.location.href = '/reservar-karts/2';
        },
        redirectToReserva3() {
            window.location.href = '/reservar-karts/3';
        },
        redirectToReserva4() {
            window.location.href = '/reservar-karts/4';
        },
        redirectToReserva5() {
            window.location.href = '/reservar-karts/5';
        },
        redirectToReserva6() {
            window.location.href = '/reservar-karts/6';
        },
    },
};
</script>

<style scoped>
h1 {
    color: white;
}
</style>