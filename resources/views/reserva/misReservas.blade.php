@if (Auth::check())
    @php
        $user = Auth::user();
    @endphp

    @if ($reservasCliente->isEmpty())

        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }} > Reservas del Cliente:
                    {{-- {{ $reservasCliente[0]->persona_nombre . ' ' . $reservasCliente[0]->persona_apellidos }} --}}
                </h2>
            </x-slot>

            <div class="container mt-5">
                <div class="alert alert-info">
                    No tienes ninguna reserva !!
                </div>
            </div>
        </x-app-layout>
    @else
        @if ($reservasCliente[0]->persona_id == $user->id)
            <x-app-layout>
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }} > Reservas del Cliente:
                        {{ $reservasCliente[0]->persona_nombre . ' ' . $reservasCliente[0]->persona_apellidos }}

                    </h2>
                </x-slot>

                <div class="container mt-5">
                    <table class="table table-info table-striped table-bordered border-dark">
                        <thead>
                            <tr>
                                <th class="text-center">ID reserva</th>
                                <th class="text-center">Servicio Contratado</th>
                                <th class="text-center">Nº Personas</th>
                                <th class="text-center">Precio Total</th>
                                <th class="text-center">Fecha y Hora</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Operaciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($reservasCliente as $reserva)
                                <tr class="text-center">
                                    <td>{{ $reserva->id }}</td>
                                    <td>{{ $reserva->servicio_nombre }}</td>
                                    <td>{{ $reserva->num_personas }}</td>
                                    <td class="text-end">{{ number_format($reserva->precio_total, 2) }} €</td>
                                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('d-m-Y') . ' ' . \Carbon\Carbon::parse($reserva->hora_reserva)->format('H:i') }}
                                    </td>
                                    <td>{{ $reserva->estado_nombre }}</td>
                                    <td>
                                        <a href="{{ route('reservaPDF', ['id_reserva' => $reserva->id]) }}"
                                            class="btn btn-light fw-bold"><i class="bi bi-filetype-pdf"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    {{-- PAGINACION --}}
                    <div class="mt-4">
                        {{ $reservasCliente->links() }}
                    </div>
                </div>
            </x-app-layout>
        @else
            <x-app-layout>
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }} > Reservas del Cliente:
                        {{-- {{ $reservasCliente[0]->persona_nombre . ' ' . $reservasCliente[0]->persona_apellidos }} --}}
                    </h2>
                </x-slot>

                <div class="container mt-5">
                    <div class="alert alert-danger">
                        No tienes acceso a estas reservas !!
                    </div>
                </div>
            </x-app-layout>
        @endif
    @endif
@endif
<style>
    div#DataTables_Table_0_filter {
        margin-bottom: 20px;
    }
</style>

<script>
    $(document).ready(function() {
        // Inicializar DataTables
        $('.table').DataTable({
            "select": false,
            "ordering": true, // Habilitar el ordenamiento
            "paging": false, // Habilitar la paginación
            "searching": true, // Habilitar la búsqueda
            "info": true // Mostrar información de la tabla
        });
    });
</script>
