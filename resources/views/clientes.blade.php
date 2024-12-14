@if (Auth::check())
    @php
        $user = Auth::user();
    @endphp

    <!-- Mostrar el enlace de Dashboard solo si el usuario no es cliente -->
    @if ($user->id_rol !== 0)
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }} > Clientes
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

            <div class="container">
                <table class="table table-info table-striped table-bordered border-dark">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">Nombre</th>
                            <th class="text-center" scope="col">Apellidos</th>
                            <th class="text-center" scope="col">Correo</th>
                            <th class="text-center" scope="col">Generado (€)</th>
                            <th class="text-center" scope="col">Nº reservas</th>
                            <th class="text-center" scope="col">Operaciones</th>
                        </tr>
                    </thead>

                    {{-- CUERPO DE LA TABLA --}}
                    <tbody>
                        @foreach ($infoClientes_Personas as $persona)
                            <tr>
                                <th class="align-content-center text-center" scope="row">{{ $persona->id }}</th>
                                <td class="align-content-center">{{ $persona->nombre }}</td>
                                <td class="align-content-center">{{ $persona->apellidos }}</td>
                                <td class="align-content-center">{{ $persona->email }}</td>

                                {{-- MOSTRAR EL TOTAL DE DINERO GASTADO POR EL CLIENTE --}}
                                <td class="text-end">
                                    @isset($reservasPagadasPorCliente[$persona->id])
                                        {{ number_format($reservasPagadasPorCliente[$persona->id], 2) }} €
                                    @else
                                        0 €
                                    @endisset
                                </td>

                                {{-- MOSTRAR EL TOTAL DE RESERVAS REALIZADAS POR EL CLIENTE --}}
                                <td class="text-center">
                                    @isset($reservasTotalesPorCliente[$persona->id])
                                        {{ $reservasTotalesPorCliente[$persona->id] }}
                                    @else
                                        0
                                    @endisset
                                </td>

                                {{-- MOSTRANDO DISTINTAS OPERACIONES --}}
                                <td class="text-center">
                                    <a href="{{ url('/dashboard/clientes/' . $persona->id) }}"
                                        class="btn btn-info fw-bold">Info
                                        Reservas</a>

                                    <button class="btn btn-info fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#modalInfo{{ $persona->id }}">Info Cliente</button>

                                    <a href="{{ route('clientesPDF', ['id_cliente' => $persona->id]) }}"
                                        class="btn btn-light fw-bold"><i class="bi bi-filetype-pdf"></i></a> |

                                    <button class="btn btn-warning fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#modalActualizar{{ $persona->id }}">Actualizar</button>

                                    <button class="btn btn-danger fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#modalEliminar{{ $persona->id }}">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- PAGINACION --}}
                <div class="mt-4">
                    {{ $infoClientes_Personas->links() }}
                </div>
            </div>

            {{-- MODAL PARA INFO CLIENTE --}}
            @foreach ($infoClientes_Personas as $persona)
                <div class="modal fade" id="modalInfo{{ $persona->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">Info Cliente</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <tr>
                                    <th class="align-content-center text-center" scope="row">ID: {{ $persona->id }}
                                    </th>
                                    <br>
                                    <td class="align-content-center">Nombre: {{ $persona->nombre }}</td><br>
                                    <td class="align-content-center">Apellidos: {{ $persona->apellidos }}</td><br>
                                    <td class="align-content-center">Correo: {{ $persona->email }}</td><br>
                                    <td class="align-content-center">Usuario: {{ $persona->usuario }}</td><br>
                                    <td class="align-content-center">Nacimiento: {{ $persona->fecha_nacimiento }}</td>
                                </tr>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- MODAL PARA ACTUALIZAR CLIENTE --}}
            @foreach ($infoClientes_Personas as $persona)
                <div class="modal fade" id="modalActualizar{{ $persona->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">Actualizar Cliente</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <tr>
                                    <th class="align-content-center text-center" scope="row">ID: {{ $persona->id }}
                                    </th>
                                    <br>
                                    <td class="align-content-center">Nombre: {{ $persona->nombre }}</td><br>
                                    <td class="align-content-center">Apellidos: {{ $persona->apellidos }}</td><br>
                                    <td class="align-content-center">Correo: {{ $persona->email }}</td><br>
                                    <td class="align-content-center">Usuario: {{ $persona->usuario }}</td><br>
                                    <td class="align-content-center">Nacimiento: {{ $persona->fecha_nacimiento }}</td>
                                </tr>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
                                <a href="{{ url('/dashboard/clientes/actualizar/' . $persona->id) }}"
                                    class="btn btn-info">Actualizar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- MODAL PARA ELIMINAR CLIENTE --}}
            @foreach ($infoClientes_Personas as $persona)
                <div class="modal fade" id="modalEliminar{{ $persona->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">Eliminar Cliente</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <tr>
                                    <th class="align-content-center text-center" scope="row">ID:
                                        {{ $persona->id }}</th>
                                    <br>
                                    <td class="align-content-center">Nombre: {{ $persona->nombre }}</td><br>
                                    <td class="align-content-center">Apellidos: {{ $persona->apellidos }}</td><br>
                                    <td class="align-content-center">Correo: {{ $persona->email }}</td><br>
                                    <td class="align-content-center">Usuario: {{ $persona->usuario }}</td><br>
                                    <td class="align-content-center">Nacimiento: {{ $persona->fecha_nacimiento }}</td>
                                </tr>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning"
                                    data-bs-dismiss="modal">Cerrar</button>
                                <a href="{{ url('/dashboard/clientes/eliminar/' . $persona->id) }}"
                                    class="btn btn-danger">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

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
