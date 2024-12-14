<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} > Clientes > Actualizar Cliente:
            {{ $infoCliente[0]->nombre . ' ' . $infoCliente[0]->apellidos }}
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


            @foreach ($infoCliente as $cliente)
                <form class="row g-3" method="POST" action="{{ route('cliente.update', $cliente->id) }}">
                    @csrf
                    @method('PUT') <!-- Esto envía la solicitud como PUT -->

                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            value="{{ $cliente->nombre }}">
                    </div>

                    <div class="col-md-6">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos"
                            value="{{ $cliente->apellidos }}">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ $cliente->email }}">
                    </div>

                    <div class="col-md-6">
                        <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"
                            value="{{ $cliente->fecha_nacimiento }}">
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </div>
                </form>
            @endforeach

        </div>
    </div>
</x-app-layout>
