@if (Auth::check())
    @php
        $user = Auth::user();
    @endphp

    <!-- Mostrar el enlace de Dashboard solo si el usuario no es cliente -->
    @if ($user->id_rol !== 0)
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }} > Reservas
                </h2>
            </x-slot>

            <div class="container mt-5">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>


            <div class="container mt-5">
                <a href="{{ route('reservasPDF') }}" class="btn btn-info fw-bold">Descargar Reservas <i
                        class="bi bi-filetype-pdf"></i></a>
                <a href="{{ route('excelReservas') }}" class="btn btn-info fw-bold">Descargar Excel <i
                        class="bi bi-filetype-pdf"></i></a>

                <table class="table table-info table-striped table-bordered border-dark">
                    <thead>
                        <tr class="text-center">
                            <th>ID reserva</th>
                            <th>Servicio Contratado</th>
                            <th>Nº Personas</th>
                            <th>Precio Total</th>
                            <th>Fecha y Hora</th>
                            <th>Estado</th>
                            <th>Operacioes</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($reservasCliente as $reserva)
                            <tr class="text-center">
                                <td>{{ $reserva->id }}</td>
                                <td>{{ $reserva->servicio_nombre }}</td>
                                <td>{{ $reserva->num_personas }}</td>
                                <td class="text-end">{{ number_format($reserva->precio_total, 2) }} €</td>
                                <td>{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('d-m-Y') . ' | ' . \Carbon\Carbon::parse($reserva->hora_reserva)->format('H:i') }}
                                </td>
                                <td>{{ $reserva->estado_nombre }}</td>

                                {{-- MOSTRANDO DISTINTAS OPERACIONES --}}
                                <td class="text-center">
                                    <button class="btn btn-info fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#modalInfoReserva{{ $reserva->persona_id }}">Info Cliente
                                        Reserva</button>

                                    <a href="{{ route('reservaPDF', ['id_reserva' => $reserva->id]) }}"
                                        class="btn btn-light fw-bold"><i class="bi bi-filetype-pdf"></i></a> |

                                    <button class="btn btn-warning fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#modalActualizar{{ $reserva->persona_id }}">Actualizar</button>

                                    <button class="btn btn-danger fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#modalEliminar{{ $reserva->id }}">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- MODAL PARA INFO CLIENTE --}}
                @foreach ($reservasCliente as $reserva)
                    <div class="modal fade" id="modalInfoReserva{{ $reserva->persona_id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">Info Cliente</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <tr>
                                        <th class="align-content-center text-center" scope="row">ID:
                                            {{ $reserva->id }}
                                        </th>
                                        <br>
                                        <td class="align-content-center">Nombre: {{ $reserva->persona_nombre }}</td>
                                        <br>
                                        <td class="align-content-center">Apellidos: {{ $reserva->persona_apellidos }}
                                        </td><br>
                                        <td class="align-content-center">Correo: {{ $reserva->persona_email }}</td><br>
                                        <td class="align-content-center">Nacimiento: {{ $reserva->persona_nacimiento }}
                                        </td>
                                    </tr>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- MODAL PARA ACTUALIZAR CLIENTE --}}
                @foreach ($reservasCliente as $reserva)
                    <div class="modal fade" id="modalActualizar{{ $reserva->persona_id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">¿Quieres Actualizar
                                        la Reserva del Cliente?
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <tr>
                                        <th class="align-content-center text-center" scope="row">ID Cliente:
                                            {{ $reserva->persona_id }}
                                        </th>
                                        <br>
                                        <td class="align-content-center">Nombre: {{ $reserva->persona_nombre }}</td>
                                        <br>
                                        <td class="align-content-center">Apellidos: {{ $reserva->persona_apellidos }}
                                        </td><br>
                                        <td class="align-content-center">Correo: {{ $reserva->persona_email }}</td><br>
                                        <td class="align-content-center">Nacimiento: {{ $reserva->persona_nacimiento }}
                                        </td>
                                    </tr>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <a href="{{ url('/dashboard/reservas/actualizar/' . $reserva->id) }}"
                                        class="btn btn-info">Actualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- MODAL PARA ELIMINAR CLIENTE --}}
                @foreach ($reservasCliente as $reserva)
                    <div class="modal fade" id="modalEliminar{{ $reserva->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">Eliminar Reserva
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <tr>
                                        <th class="align-content-center text-center" scope="row">ID:
                                            {{ $reserva->id }}</th>
                                        <br>
                                        <td class="align-content-center">Nombre: {{ $reserva->persona_nombre }}</td>
                                        <br>
                                        <td class="align-content-center">Apellidos: {{ $reserva->persona_apellidos }}
                                        </td><br>
                                        <td class="align-content-center">Correo: {{ $reserva->persona_email }}</td>
                                        <br>
                                        <td class="align-content-center">Nacimiento:
                                            {{ $reserva->persona_nacimiento }}
                                        </td>
                                    </tr>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <a href="{{ url('/dashboard/reservas/eliminar/' . $reserva->id) }}"
                                        class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- PAGINACION --}}
                <div class="mt-4">
                    {{ $reservasCliente->links() }}
                </div>
            </div>


            <style>
                div#DataTables_Table_0_filter {
                    margin-bottom: 20px;
                }
            </style>

            <script>
                $(document).ready(function() {
                    // Inicializar DataTables
                    $('.table').DataTable({
                        "ordering": true, // Habilitar el ordenamiento
                        "paging": false, // Habilitar la paginación
                        "searching": true, // Habilitar la búsqueda
                        "info": true // Mostrar información de la tabla
                    });
                });
            </script>
        </x-app-layout>
    @else
        <!-- Enlace para la página de inicio, utilizando Vue Router -->
        <script>
            window.location.href = "/errores/NotPermission";
        </script>
    @endif
@endif
