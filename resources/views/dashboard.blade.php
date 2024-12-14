<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Bienvenido, te has logueado exitosamente!') }}
                </div>
            </div>
        </div>
    </div>

    @if (Auth::check())
        @php
            $user = Auth::user();
        @endphp
        @if ($user->id_rol !== 0)
            <div class="container d-flex justify-content-evenly text-center">
                <div class="row row-cols-auto text-center d-flex justify-content-center">
                    <div class="col">
                        <div class="card shadow p-3 mb-5 rounded" style="width: 18rem; background-color: #5867dd;">
                            <div class="card-header text-white d-flex justify-content-between align-items-center">
                                <h6 class="text-start">Total Generado</h6>
                                <h6 class="text-end fs-4"><i class="bi bi-currency-euro"></i></h6>
                            </div>
                            <div class="card-body">
                                <h1 class="card-text text-white text-start"><?php echo $totalGenerado; ?>€</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow p-3 mb-5 rounded" style="width: 18rem; background-color: #00a65a;">
                            <div class="card-header text-white d-flex justify-content-between align-items-center">
                                <h6 class="text-start">Nº de Clientes Registrados</h6>
                                <h6 class="text-end fs-4"><i class="bi bi-person-check"></i></h6>
                            </div>
                            <div class="card-body">
                                <h1 class="card-text text-white text-start"><?php echo $clientesTotales; ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow p-3 mb-5 rounded" style="width: 18rem; background-color: #04c1c4;">
                            <div class="card-header text-white d-flex justify-content-between align-items-center">
                                <h6 class="text-start">Nº de Reservas</h6>
                                <h6 class="text-end fs-4"><i class="bi bi-journal-bookmark-fill"></i></h6>
                            </div>
                            <div class="card-body">
                                <h1 class="card-text text-white text-start"><?php echo $conteoReservas; ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow p-3 mb-5 rounded" style="width: 18rem; background-color: #ff851b;">
                            <div class="card-header text-white d-flex justify-content-between align-items-center">
                                <h6 class="text-start">Total Pendiente</h6>
                                <h6 class="text-end fs-4"><i class="bi bi-currency-euro"></i></h6>
                            </div>
                            <div class="card-body">
                                <h1 class="card-text text-white text-start"><?php echo $totalPendiente; ?>€</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container bg-info rounded shadow">
                <div class="row pt-2">
                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="enero">Enero:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="enero" id="enero" checked>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="febrero">Febrero:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="febrero" id="febrero" checked>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="marzo">Marzo:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="marzo" id="marzo" checked>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="abril">Abril:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="abril" id="abril" checked>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="mayo">Mayo:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="mayo" id="mayo" checked>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="junio">Junio:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="junio" id="junio" checked>
                    </div>
                </div>

                <div class="row pb-2">
                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="julio">Julio:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="julio" id="julio" checked>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="agosto">Agosto:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="agosto" id="agosto" checked>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="septiembre">Septiembre:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="septiembre" id="septiembre"
                            checked>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="octubre">Octubre:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="octubre" id="octubre" checked>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="noviembre">Noviembre:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="noviembre" id="noviembre"
                            checked>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <label class="form-check-label me-2 fw-bold" for="diciembre">Diciembre:</label>
                        <input class="form-check-input mt-0" type="checkbox" name="diciembre" id="diciembre"
                            checked>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card" id="chart"></div>
                    </div>
                </div>

                <div class="row text-end mt-3 pb-3">
                    <div class="col"><button class="btn btn-dark" id="update-chart">Actualizar Gráfico</button>
                    </div>
                </div>
            </div>
        @endif
    @endif
</x-app-layout>


<script>
    // VARIABLES PARA MOSTRAR LA DATA DE RESERVAS POR MES
    var reservasKarts = @json($reservasKarts);
    var reservasJumping = @json($reservasJumping);
    var reservasPaintball = @json($reservasPaintball);
    var reservasRestaurante = @json($reservasRestaurante);
    var reservasRecreativos = @json($reservasRecreativos);

    // ALMACENAMIENTO DE LOS MESES
    const categorias = ['Ene', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dic'];

    // ALMACENAMIENTO DE LA INFORMACION
    const seriesOriginales = [{
            name: 'Restaurante',
            data: reservasRestaurante
        },
        {
            name: 'Jumping',
            data: reservasJumping
        },
        {
            name: 'Karts',
            data: reservasKarts
        },
        {
            name: 'Paintball',
            data: reservasPaintball
        },
        {
            name: 'Zona Ocio',
            data: reservasRecreativos
        }
    ];

    // CARACTERISTICAS Y CONFIGURACION DEL CHART
    var options = {
        series: seriesOriginales,
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: categorias,
        },
        yaxis: {
            title: {
                text: 'Nº Reservas Totales'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " reservas"
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

    // CONFIGURACIÓN DE FILTRO DE MESES PARA EL CHART
    document.getElementById('update-chart').addEventListener('click', function() {
        // Obtener los meses seleccionados
        const selectedMonths = [];
        const months = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre',
            'octubre', 'noviembre', 'diciembre'
        ];

        months.forEach(month => {
            const checkbox = document.getElementById(month);
            if (checkbox.checked) {
                selectedMonths.push(months.indexOf(month)); // Guarda el índice del mes
            }
        });

        // Filtra las categorías y las series basadas en los meses seleccionados
        const categoriasFiltradas = categorias.filter((_, index) => selectedMonths.includes(index));
        const seriesFiltradas = seriesOriginales.map(serie => ({
            name: serie.name,
            data: serie.data.filter((_, index) => selectedMonths.includes(index))
        }));

        // Destruir el gráfico actual para forzar la actualización
        chart.destroy();

        // Recrear el gráfico con las nuevas opciones
        chart = new ApexCharts(document.querySelector("#chart"), {
            series: seriesFiltradas,
            chart: {
                type: 'bar', // Cambiar según el tipo de gráfico que uses
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: categoriasFiltradas
            },
            yaxis: {
                title: {
                    text: 'Nº Reservas Totales'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " reservas"
                    }
                }
            }
        });

        chart.render();
    });
</script>
