<?php

namespace App\Http\Controllers;

require_once app_path('fpdf186/fpdf.php');

use FPDF;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FPDFController extends FPDF // Cambiado para extender FPDF
{
    public function __construct()
    {
        parent::__construct(); // Llamada al constructor de FPDF
    }

    public function clientesPDF($id_cliente)
    {
        $header = array('Id', 'Servicio', 'Num. Personas', 'Precio (EUR)', 'Hora y Fecha', 'Estado');

        $infoCliente = DB::table('personas')
            ->where('id', $id_cliente)
            ->get();

        $infoReservasCliente = DB::table('reservas')
            ->join('estados', 'reservas.id_estado', '=', 'estados.id')
            ->join('servicios', 'reservas.id_servicio', '=', 'servicios.id')
            ->where('id_cliente', $id_cliente)
            ->select('reservas.*', 'estados.nombre as estado_nombre', 'servicios.nombre as servicio_nombre')
            ->get();

        // CREAMOS UNA PAGINA Y APLICAMOS ESTILOS
        $this->AddPage();
        $this->SetFont('Arial', 'B', 10);

        // INFO CLIENTE
        $this->Cell(0, 5, 'Info Cliente: ' . $infoCliente[0]->nombre . ' ' . $infoCliente[0]->apellidos, 0, 1, 'C');
        $this->Cell(0, 5, 'ID: CLI-' . $infoCliente[0]->id, 0, 1, 'L');
        $this->Cell(0, 5, 'Correo: ' . $infoCliente[0]->email, 0, 1, 'L');
        $this->Cell(0, 5, 'Usuario: ' . $infoCliente[0]->usuario, 0, 1, 'L');
        $this->Cell(0, 5, 'Fecha Nacimiento: ' . $infoCliente[0]->fecha_nacimiento, 0, 1, 'L');

        $this->Ln(10);

        // INFO RESERVAS
        $this->Cell(0, 15, 'Reservas Cliente: ' . $infoCliente[0]->nombre . ' ' . $infoCliente[0]->apellidos, 0, 1, 'C');
        $data = $infoReservasCliente;
        $this->FancyTable($header, $data);

        // BUFFER DE SALIDA
        ob_start();
        $this->Output();
        $pdfData = ob_get_clean();

        // ENVIAMOS EL PDF COMO RESPUESTA HTTP
        return Response::make($pdfData, 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    // Tabla coloreada
    function FancyTable($header, $data)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // Cabecera
        $w = array(10, 30, 30, 30, 35, 25);

        // Calcular el ancho total de la tabla
        $totalWidth = array_sum($w);

        // Calcular la posición inicial para centrar la tabla
        $pageWidth = $this->GetPageWidth(); // Ancho total de la página
        $xStart = ($pageWidth - $totalWidth) / 2; // Posición inicial

        // Establecer la posición inicial
        $this->SetX($xStart);

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 8, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;

        foreach ($data as $row) {
            // Calcular el ancho total de la tabla
            $totalWidth = array_sum($w);

            // Calcular la posición inicial para centrar la tabla
            $pageWidth = $this->GetPageWidth(); // Ancho total de la página
            $xStart = ($pageWidth - $totalWidth) / 2; // Posición inicial

            // Establecer la posición inicial
            $this->SetX($xStart);

            $this->Cell($w[0], 6, $row->id, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $row->servicio_nombre, 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $row->num_personas, 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, number_format($row->precio_total, 2, ',', '.'), 'LR', 0, 'R', $fill);
            $this->Cell($w[4], 6, $row->hora_reserva . ' | ' . $row->fecha_reserva, 'LR', 0, 'C', $fill);
            $this->Cell($w[5], 6, $row->estado_nombre, 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        // Calcular el ancho total de la tabla
        $totalWidth = array_sum($w);

        // Calcular la posición inicial para centrar la tabla
        $pageWidth = $this->GetPageWidth(); // Ancho total de la página
        $xStart = ($pageWidth - $totalWidth) / 2; // Posición inicial

        // Establecer la posición inicial
        $this->SetX($xStart);

        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    /**
     *  CODIGO QUE GENERA UN PDF CON UNA RESERVA
     */
    public function reservaPDF($id_reserva)
    {
        $header = array('Id', 'Servicio', 'Num. Personas', 'Precio (EUR)', 'Hora y Fecha', 'Estado');

        $reservaCliente = DB::table('reservas')
            ->join('estados', 'reservas.id_estado', '=', 'estados.id')
            ->join('servicios', 'reservas.id_servicio', '=', 'servicios.id')
            ->join('personas', 'reservas.id_cliente', '=', 'personas.id')
            ->where('reservas.id', $id_reserva)
            ->select(
                'reservas.*',
                'estados.nombre as estado_nombre',
                'servicios.nombre as servicio_nombre',
                'personas.nombre as persona_nombre',
                'personas.apellidos as persona_apellidos',
                'personas.email as persona_email',
                'personas.fecha_nacimiento as persona_nacimiento',
                'personas.id as persona_id'
            )
            ->get();

        // CREAMOS UNA PAGINA Y APLICAMOS ESTILOS
        $this->AddPage();
        $this->SetFont('Arial', 'B', 10);

        // INFO CLIENTE
        $this->Cell(0, 5, 'Info Cliente: ' . $reservaCliente[0]->persona_nombre . ' ' . $reservaCliente[0]->persona_apellidos, 0, 1, 'C');
        $this->Cell(0, 5, 'ID: CLI-' . $reservaCliente[0]->id, 0, 1, 'L');
        $this->Cell(0, 5, 'Correo: ' . $reservaCliente[0]->persona_email, 0, 1, 'L');
        $this->Cell(0, 5, 'Fecha Nacimiento: ' . $reservaCliente[0]->persona_nacimiento, 0, 1, 'L');

        $this->Ln(10);
        $this->Image(public_path('images/logo.png'),10,8,33);
        $this->Ln(10);

        // INFO RESERVAS
        $this->Cell(0, 15, 'Reserva Cliente: ' . $reservaCliente[0]->persona_nombre . ' ' . $reservaCliente[0]->persona_apellidos, 0, 1, 'C');
        $data = $reservaCliente;
        $this->FancyTableReserva($header, $data);

        // BUFFER DE SALIDA
        ob_start();
        $this->Output();
        $pdfData = ob_get_clean();

        // ENVIAMOS EL PDF COMO RESPUESTA HTTP
        return Response::make($pdfData, 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    // Tabla coloreada
    function FancyTableReserva($header, $data)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // Cabecera
        $w = array(10, 30, 30, 30, 35, 25);

        // Calcular el ancho total de la tabla
        $totalWidth = array_sum($w);

        // Calcular la posición inicial para centrar la tabla
        $pageWidth = $this->GetPageWidth(); // Ancho total de la página
        $xStart = ($pageWidth - $totalWidth) / 2; // Posición inicial

        // Establecer la posición inicial
        $this->SetX($xStart);

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 8, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;

        foreach ($data as $row) {
            // Calcular el ancho total de la tabla
            $totalWidth = array_sum($w);

            // Calcular la posición inicial para centrar la tabla
            $pageWidth = $this->GetPageWidth(); // Ancho total de la página
            $xStart = ($pageWidth - $totalWidth) / 2; // Posición inicial

            // Establecer la posición inicial
            $this->SetX($xStart);

            $this->Cell($w[0], 6, $row->id, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $row->servicio_nombre, 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $row->num_personas, 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, number_format($row->precio_total, 2, ',', '.'), 'LR', 0, 'R', $fill);
            $this->Cell($w[4], 6, $row->hora_reserva . ' | ' . $row->fecha_reserva, 'LR', 0, 'C', $fill);
            $this->Cell($w[5], 6, $row->estado_nombre, 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        // Calcular el ancho total de la tabla
        $totalWidth = array_sum($w);

        // Calcular la posición inicial para centrar la tabla
        $pageWidth = $this->GetPageWidth(); // Ancho total de la página
        $xStart = ($pageWidth - $totalWidth) / 2; // Posición inicial

        // Establecer la posición inicial
        $this->SetX($xStart);

        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    /**
     *  CODIGO QUE GENERA UN PDF CON TODAS LAS RESERVAS
     */
    public function reservasPDF()
    {
        $header = array('Id', 'Email', 'Servicio', 'Num. Personas', 'Precio (EUR)', 'Hora y Fecha', 'Estado');

        /**
         * IDs ESTADOS
         * -----------
         * 
         * 1 - RESERVADO
         * 2 - PAGADO
         * 3 - CANCELADO
         * 4 - SIN RESPUESTA
         */

        $reservasReservadas = DB::table('reservas')
            ->join('estados', 'reservas.id_estado', '=', 'estados.id')
            ->join('servicios', 'reservas.id_servicio', '=', 'servicios.id')
            ->join('personas', 'reservas.id_cliente', '=', 'personas.id')
            ->where('reservas.id_estado', 1)
            ->select(
                'reservas.*',
                'estados.nombre as estado_nombre',
                'servicios.nombre as servicio_nombre',
                'personas.nombre as persona_nombre',
                'personas.apellidos as persona_apellidos',
                'personas.email as persona_email',
                'personas.fecha_nacimiento as persona_nacimiento',
                'personas.id as persona_id'
            )
            ->orderBy('reservas.id')
            ->get();

        $reservasPagadas = DB::table('reservas')
            ->join('estados', 'reservas.id_estado', '=', 'estados.id')
            ->join('servicios', 'reservas.id_servicio', '=', 'servicios.id')
            ->join('personas', 'reservas.id_cliente', '=', 'personas.id')
            ->where('reservas.id_estado', 2)
            ->select(
                'reservas.*',
                'estados.nombre as estado_nombre',
                'servicios.nombre as servicio_nombre',
                'personas.nombre as persona_nombre',
                'personas.apellidos as persona_apellidos',
                'personas.email as persona_email',
                'personas.fecha_nacimiento as persona_nacimiento',
                'personas.id as persona_id'
            )
            ->orderBy('reservas.id')
            ->get();

        $reservasCanceladas = DB::table('reservas')
            ->join('estados', 'reservas.id_estado', '=', 'estados.id')
            ->join('servicios', 'reservas.id_servicio', '=', 'servicios.id')
            ->join('personas', 'reservas.id_cliente', '=', 'personas.id')
            ->where('reservas.id_estado', 3)
            ->select(
                'reservas.*',
                'estados.nombre as estado_nombre',
                'servicios.nombre as servicio_nombre',
                'personas.nombre as persona_nombre',
                'personas.apellidos as persona_apellidos',
                'personas.email as persona_email',
                'personas.fecha_nacimiento as persona_nacimiento',
                'personas.id as persona_id'
            )
            ->orderBy('reservas.id')
            ->get();

        $reservasSinRespuesta = DB::table('reservas')
            ->join('estados', 'reservas.id_estado', '=', 'estados.id')
            ->join('servicios', 'reservas.id_servicio', '=', 'servicios.id')
            ->join('personas', 'reservas.id_cliente', '=', 'personas.id')
            ->where('reservas.id_estado', 4)
            ->select(
                'reservas.*',
                'estados.nombre as estado_nombre',
                'servicios.nombre as servicio_nombre',
                'personas.nombre as persona_nombre',
                'personas.apellidos as persona_apellidos',
                'personas.email as persona_email',
                'personas.fecha_nacimiento as persona_nacimiento',
                'personas.id as persona_id'
            )
            ->orderBy('reservas.id')
            ->get();



        // CREAMOS UNA PAGINA Y APLICAMOS ESTILOS
        $this->AliasNbPages();
        $this->AddPage('L');
        $this->SetFont('Arial', 'B', 10);
        $this->Ln(10);                      // SALTO DE LÍNEA

        // INFO RESERVAS
        $this->Cell(0, 15, 'Indice', 0, 1, 'C'); // ENCABEZADO

        // Crear los enlaces
        $linkReservadas = $this->AddLink();
        $linkPagadas = $this->AddLink();
        $linkCanceladas = $this->AddLink();
        $linkSinRespuesta = $this->AddLink();

        // Crear índice con los enlaces
        $this->CreateIndex([
            'reservadas' => $linkReservadas,
            'pagadas' => $linkPagadas,
            'canceladas' => $linkCanceladas,
            'sin_respuesta' => $linkSinRespuesta,
        ]);

        // DATOS Y LLAMADAS
        $data = [$reservasReservadas, $reservasPagadas, $reservasCanceladas, $reservasSinRespuesta];
        $this->FancyTableReservasReservadas($header, $data, $linkReservadas);
        $this->FancyTableReservasPagadas($header, $data, $linkPagadas);
        $this->FancyTableReservasCanceladas($header, $data, $linkCanceladas);
        $this->FancyTableReservasSinRespuesta($header, $data, $linkSinRespuesta);

        // BUFFER DE SALIDA
        ob_start();
        $this->Output();
        $pdfData = ob_get_clean();

        // ENVIAMOS EL PDF COMO RESPUESTA HTTP
        return Response::make($pdfData, 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    function CreateIndex($links)
    {
        // ÍNDICE
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 8, '1 - Reservas Reservadas', 0, 1, 'L', false, $links['reservadas']);
        $this->Cell(0, 8, '2 - Reservas Pagadas', 0, 1, 'L', false, $links['pagadas']);
        $this->Cell(0, 8, '3 - Reservas Canceladas', 0, 1, 'L', false, $links['canceladas']);
        $this->Cell(0, 8, '4 - Reservas Sin Respuesta', 0, 1, 'L', false, $links['sin_respuesta']);
    }

    // FUNCION QUE CREA PIE DE PÁGINA
    function Footer()
    {
        $this->SetY(-15);
        // TEXTO
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 1, 'C');
    }

    function CreateSection($title, $link)
    {
        // Crear la sección correspondiente y vincularla
        $this->AddPage('L');
        $this->SetLink($link);
        $this->Cell(0, 15, $title, 0, 1, 'C');
    }

    // FUNCION QUE GENERA UNA TABLA CON ESTILOS
    function FancyTableReservasReservadas($header, $data, $linkReservadas)
    {
        $this->CreateSection('Reservas Reservadas', $linkReservadas);

        // ESTILOS DE LA TABLA
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');

        $w = array(12, 70, 30, 35, 30, 40, 25);     // ANCHURA DE LAS COLUMNAS
        $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
        $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
        $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
        $this->SetX($xStart);                       // ESTABLECER POSICIÓN

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 8, $header[$i], 1, 0, 'C', true);
        }

        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;

        foreach ($data[0] as $row) {
            $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
            $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
            $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
            $this->SetX($xStart);                       // ESTABLECER POSICIÓN

            $this->Cell($w[0], 6, $row->id, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $row->persona_email, 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $row->servicio_nombre, 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, $row->num_personas, 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, number_format($row->precio_total, 2, ',', '.'), 'LR', 0, 'R', $fill);
            $this->Cell($w[5], 6, $row->hora_reserva . ' | ' . $row->fecha_reserva, 'LR', 0, 'C', $fill);
            $this->Cell($w[6], 6, $row->estado_nombre, 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
        $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
        $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
        $this->SetX($xStart);                       // ESTABLECER POSICIÓN

        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // FUNCION QUE GENERA UNA TABLA CON ESTILOS
    function FancyTableReservasPagadas($header, $data, $linkPagadas)
    {
        $this->CreateSection('Reservas Pagadas', $linkPagadas);

        // ESTILOS DE LA TABLA
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');

        $w = array(12, 70, 30, 35, 30, 40, 25);     // ANCHURA DE LAS COLUMNAS
        $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
        $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
        $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
        $this->SetX($xStart);                       // ESTABLECER POSICIÓN

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 8, $header[$i], 1, 0, 'C', true);
        }

        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;

        foreach ($data[1] as $row) {
            $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
            $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
            $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
            $this->SetX($xStart);                       // ESTABLECER POSICIÓN

            $this->Cell($w[0], 6, $row->id, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $row->persona_email, 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $row->servicio_nombre, 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, $row->num_personas, 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, number_format($row->precio_total, 2, ',', '.'), 'LR', 0, 'R', $fill);
            $this->Cell($w[5], 6, $row->hora_reserva . ' | ' . $row->fecha_reserva, 'LR', 0, 'C', $fill);
            $this->Cell($w[6], 6, $row->estado_nombre, 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
        $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
        $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
        $this->SetX($xStart);                       // ESTABLECER POSICIÓN

        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // FUNCION QUE GENERA UNA TABLA CON ESTILOS
    function FancyTableReservasCanceladas($header, $data, $linkCanceladas)
    {
        $this->CreateSection('Reservas Canceladas', $linkCanceladas);

        // ESTILOS DE LA TABLA
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');

        $w = array(12, 70, 30, 35, 30, 40, 25);     // ANCHURA DE LAS COLUMNAS
        $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
        $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
        $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
        $this->SetX($xStart);                       // ESTABLECER POSICIÓN

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 8, $header[$i], 1, 0, 'C', true);
        }

        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;

        foreach ($data[2] as $row) {
            $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
            $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
            $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
            $this->SetX($xStart);                       // ESTABLECER POSICIÓN

            $this->Cell($w[0], 6, $row->id, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $row->persona_email, 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $row->servicio_nombre, 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, $row->num_personas, 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, number_format($row->precio_total, 2, ',', '.'), 'LR', 0, 'R', $fill);
            $this->Cell($w[5], 6, $row->hora_reserva . ' | ' . $row->fecha_reserva, 'LR', 0, 'C', $fill);
            $this->Cell($w[6], 6, $row->estado_nombre, 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
        $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
        $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
        $this->SetX($xStart);                       // ESTABLECER POSICIÓN

        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // FUNCION QUE GENERA UNA TABLA CON ESTILOS
    function FancyTableReservasSinRespuesta($header, $data, $linkSinRespuesta)
    {
        $this->CreateSection('Reservas Sin Respuesta', $linkSinRespuesta);

        // ESTILOS DE LA TABLA
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');

        $w = array(12, 70, 30, 35, 30, 40, 35);     // ANCHURA DE LAS COLUMNAS
        $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
        $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
        $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
        $this->SetX($xStart);                       // ESTABLECER POSICIÓN

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 8, $header[$i], 1, 0, 'C', true);
        }

        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;

        foreach ($data[3] as $row) {
            $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
            $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
            $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
            $this->SetX($xStart);                       // ESTABLECER POSICIÓN

            $this->Cell($w[0], 6, $row->id, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $row->persona_email, 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $row->servicio_nombre, 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, $row->num_personas, 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, number_format($row->precio_total, 2, ',', '.'), 'LR', 0, 'R', $fill);
            $this->Cell($w[5], 6, $row->hora_reserva . ' | ' . $row->fecha_reserva, 'LR', 0, 'C', $fill);
            $this->Cell($w[6], 6, $row->estado_nombre, 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        $totalWidth = array_sum($w);                // ANCHO TOTAL DE AS COLUMNAS
        $pageWidth = $this->GetPageWidth();         // ANCHO DE LA PÁGIMA
        $xStart = ($pageWidth - $totalWidth) / 2;   // POSICIÓN DE LA TABLA CENTRADA
        $this->SetX($xStart);                       // ESTABLECER POSICIÓN

        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}
