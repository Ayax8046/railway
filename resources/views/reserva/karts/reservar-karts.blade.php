<x-app-layout>
    @if (Auth::check())
        @php
            $user = Auth::user();
        @endphp

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }} > Reservar Karts {{ $infoReserva[0]->nombre }}:
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="container mt-5">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @foreach ($infoReserva as $reserva)
                    <form class="row g-3" method="POST" action="{{ route('karts.create') }}">
                        @csrf

                        <input type="hidden" name="id_cliente" id="id_cliente" value="{{ $user->id }}">
                        <input type="hidden" name="id_oferta" id="id_oferta" value="{{ $reserva->id }}">

                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre Oferta</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                value="{{ $reserva->nombre }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label for="precio" class="form-label">Precio / Persona</label>
                            <input type="text" class="form-control" name="" id=""
                                value="{{ $reserva->precio }}" disabled>
                            <input type="hidden" class="form-control" name="precio" id="precio"
                                value="{{ $reserva->precio }}">
                        </div>

                        <div class="col-md-4">
                            <label for="numPersonas" class="form-label">Número Personas</label>
                            <input type="number" class="form-control" name="numPersonas" id="numPersonas"
                                min="1" max="10">
                        </div>

                        <div class="col-md-4">
                            <label for="fecha_reserva" class="form-label">Fecha Reserva</label>
                            <input type="date" class="form-control" name="fecha_reserva" id="fecha_reserva">
                        </div>

                        <div class="col-md-4">
                            <label for="hora_reserva" class="form-label">Hora Reserva</label>
                            <input type="time" class="form-control" name="hora_reserva" id="hora_reserva"
                                min="10:00" max="20:00" step="900">
                            <div id="emailHelp" class="form-text">La hora transcurre de 10:00 a 20:00 cada 15 minutos.
                            </div>
                        </div>

                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success">Reservar</button>
                        </div>
                    </form>
                @endforeach

            </div>
        </div>
    @else
        {{ redirect()->route('login') }}
    @endif
</x-app-layout>

<script>
    // Obtener la fecha de hoy
    const today = new Date();

    // Incrementar 5 días
    today.setDate(today.getDate() + 5);

    // Formatear la fecha a YYYY-MM-DD
    const minDate = today.toISOString().split('T')[0];

    // Establecer la fecha mínima para el campo
    document.getElementById('fecha_reserva').setAttribute('min', minDate);
</script>
