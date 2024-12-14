<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} > Clientes > Reservas del Cliente:
            {{ $nombreCliente[0]->nombre . ' ' . $nombreCliente[0]->apellidos }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mt-5">
            <table class="table table-info table-striped table-bordered border-dark">
                <thead>
                    <tr class="text-center">
                        <th>ID reserva</th>
                        <th>Servicio Contratado</th>
                        <th>Nº Personas</th>
                        <th>Precio Total</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>


            {{-- PAGINACION --}}
            <div class="mt-4">
                {{ $reservasCliente->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

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
