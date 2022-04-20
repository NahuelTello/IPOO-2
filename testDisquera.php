<?php
include "Disquera.php";
include "Reloj.php";
include "Persona.php";

$objPersona = new Persona("Nahuel", "Tello", "1234567");
$objHorarioApertura = new Reloj(8, 30);
$objHorarioCierre = new Reloj(21, 0);

$objDisquera = new Disquera($objHorarioApertura, $objHorarioCierre, "Av. Arg 123", $objPersona,"cerrado");
echo "------------\n";
echo $objDisquera."\n";
echo "------------\n";
/* $objDisquera->setEstado("abierto"); */
if ($objDisquera->dentroHorarioAtencion(12, 32)) {
    echo "Dentro del horario de atencion!\n";
}

$objDisquera->setEstado("cerrado");
if ($objDisquera->abrirDisquera(22, 45)) {
    echo "Disquera abierta!\n";
} else {
    echo "Disquera cerrada aún!\n";
}
