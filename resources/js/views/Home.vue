<template>
    <div class="container mt-4">
        <div class="d-flex justify-content-center align-items-center">
            <img src="/public/images/principal.png" class="img-fluid rounded" alt="hola">
        </div>

        <div class="mt-5">
            <h3 class="text-center fw-bold fs-4 mb-2 text-uppercase">¿Quienes Somos?</h3>
            <hr class="border border-danger border-2 opacity-50 mb-3">
            <p class="fs-5 ms-5 me-5 text-center text-white">En Recreo Infinito, nos dedicamos a ofrecer un espacio
                único y
                divertido para todas las edades. Somos un
                lugar diseñado para disfrutar de la diversión, la emoción y la convivencia. Nuestro objetivo es crear
                experiencias memorables para que cada visitante se lleve a casa no solo recuerdos, sino momentos
                inolvidables. Ya sea que busques relajarte, disfrutar de un buen plato, o desafiar a tus amigos en
                actividades emocionantes, en Recreo Infinito encontrarás un lugar donde el tiempo parece detenerse
                mientras vives la mejor diversión.</p>
        </div>

        <h3 class="text-center fw-bold fs-4 mb-2 mt-5 text-uppercase text-black">Nuestros Servicios</h3>
        <hr class="border border-danger border-2 opacity-50 mb-3">

        <div class="row row-cols-auto p-4 rounded" style="background-color: #ffd200; border: 1px solid black;">
            <div class="col-4">
                <h3 class="text-center fw-bold fs-5 mb-2 text-black"><i class="bi bi-joystick"></i> Zona de Ocio</h3>
                <hr class="border border-danger border-2 opacity-50 mb-3">
                <p class="fs-5 text-center text-black">Relájate o reta a tus amigos en nuestra zona de ocio, equipada
                    con máquinas
                    arcade clásicas y juegos de mesa para todos los gustos. Aquí, la diversión no tiene límites y
                    siempre hay algo nuevo por descubrir.</p>
            </div>

            <div class="col-4">
                <h3 class="text-center fw-bold fs-5 mb-2 text-black">Zona Jumping</h3>
                <hr class="border border-danger border-2 opacity-50 mb-3">
                <p class="fs-5 text-center text-black">Salta y juega en nuestra zona de jumping, con colchonetas y foam
                    pits para
                    que los más pequeños (y no tan pequeños) puedan disfrutar de un día lleno de energía y movimiento.
                    ¡La diversión está garantizada con cada salto!</p>
            </div>

            <div class="col-4">
                <h3 class="text-center fw-bold fs-5 mb-2 text-black">Pista de Karts</h3>
                <hr class="border border-danger border-2 opacity-50 mb-3">
                <p class="fs-5 text-center text-black">Siente la velocidad y la adrenalina en nuestra pista de karts.
                    Compite con
                    tus amigos y demuéstrales quién es el más rápido en el circuito. ¡Que empiece la carrera!</p>
            </div>
        </div>

        <div class="mt-3 row row-cols-auto p-4 rounded" style="background-color: #ffd200; border: 1px solid black;">
            <div class="col-6">
                <h3 class="text-center fw-bold fs-5 mb-2 text-black">Pista de Paintball</h3>
                <hr class="border border-danger border-2 opacity-50 mb-3">
                <p class="fs-5 text-center text-black">Si eres fan de la acción y la estrategia, nuestra pista de
                    paintball es el
                    lugar ideal para ti. Forma tu equipo, crea tácticas y prepárate para la batalla en un entorno lleno
                    de emoción y aventura.</p>
            </div>
            <div class="col-6">
                <h3 class="text-center fw-bold fs-5 mb-2 text-black">Restaurante</h3>
                <hr class="border border-danger border-2 opacity-50 mb-3">
                <p class="fs-5 text-center text-black">Saborea una deliciosa selección de platos en nuestro restaurante,
                    con
                    opciones para todos los gustos. Desde tentempiés rápidos hasta menús completos, nuestra cocina está
                    pensada para acompañar tu día de ocio con sabores irresistibles.</p>
            </div>
        </div>

        <h3 class="text-center fw-bold fs-4 mb-2 mt-5 text-uppercase text-black">Características</h3>
        <hr class="border border-danger border-2 opacity-50 mb-3">

        <div class="row row-cols-auto p-4 rounded" style="background-color: #46ad37; border: 1px solid black;">
            <div class="col-4">
                <h3 class="text-center fw-bold fs-5 mb-2 text-black">Seguridad</h3>
                <hr class="border border-danger border-2 opacity-50 mb-3">
                <p class="fs-5 text-center text-black">¿Te preocupa comprar online por no saber donde acabaran tus datos
                    bancarios y/o tu información personal? No te preocupes que en Recreo Infinito somos conscientes de
                    los problemas de hoy en día, por eso no necesitas introducir ninguno de tus datos bancarios para la
                    realización de las reservas, paga en persona sin preocupaciónes.</p>
            </div>

            <div class="col-4">
                <h3 class="text-center fw-bold fs-5 mb-2 text-black">Cancelaciones</h3>
                <hr class="border border-danger border-2 opacity-50 mb-3">
                <p class="fs-5 text-center text-black">Para cancelar una reserva es necesario que esta se realice con
                    anterioridad en un plazo minimo de 24h antes a la hora de la reserva, de no ser el caso no podras
                    cancelar y si no asistes a tu reserva en la proxima reserva que vayas a realizar se te cobrara un
                    sumplemento del 50% de la reserva no presentada.</p>
            </div>

            <div class="col-4">
                <h3 class="text-center fw-bold fs-5 mb-2 text-black">Pista de Karts</h3>
                <hr class="border border-danger border-2 opacity-50 mb-3">
                <p class="fs-5 text-center text-black">Siente la velocidad y la adrenalina en nuestra pista de karts.
                    Compite con
                    tus amigos y demuéstrales quién es el más rápido en el circuito. ¡Que empiece la carrera!</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Home',

};
</script>

<style>
h1 {
    color: white;
}
</style>