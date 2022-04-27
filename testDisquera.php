<?php
include "Disquera.php";
include "Reloj.php";
include "Persona.php";

$objPersona = new Persona("Nahuel", "Tello", "1234567");
$objHoraDesde = new Reloj(8, 30);
$objHoraHasta = new Reloj(21, 0);

$objDisquera = new Disquera($objHoraDesde, $objHoraHasta, $objPersona, "Av. Arg 123");
echo "------------\n";
echo $objDisquera."\n";
echo "------------\n";
/* $objDisquera->setEstado("abierto"); */
$dentroDelHorario = $objDisquera->dentroHorarioAtencion(12,30);
if ($dentroDelHorario) {
    echo "Dentro del horario de atencion!\n";
} else {
    echo "Fuera del horario";
}

/* $objDisquera->setEstado("cerrado");
if ($objDisquera->abrirDisquera(22, 45)) {
    echo "Disquera abierta!\n";
} else {
    echo "Disquera cerrada aún!\n";
}
 */