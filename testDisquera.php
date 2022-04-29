<?php
include "Disquera.php";
include "Reloj.php";
include "Persona.php";

$objPersona = new Persona("Nahuel", "Tello", "1234567");
$horaApertura = "10:40";
$horaCierre = "18:30";
$objDisquera = new Disquera($horaApertura, $horaCierre, "abierto", $objPersona, "Av. Arg 123");

/* $objDisquera->setEstado("abierto"); */
echo $objDisquera. "\n";
echo "ponga la hora a verificar: \n";
$horitas = trim(fgets(STDIN));
echo "ponga el minuto a verificar: \n";
$minutitos = trim(fgets(STDIN));
echo "estas dentro del horario? \n";

$horarioVerificar = $objDisquera->dentroHorarioAtencion($horitas, $minutitos);
if ($horarioVerificar) {
    echo "Está en horario de atencion \n";
} else {
    echo "No esta en horario de atencion \n";
}
echo "------------\n";
echo $objDisquera . "\n";
echo "------------\n";
/* $objDisquera->setEstado("cerrado");
if ($objDisquera->abrirDisquera(22, 45)) {
    echo "Disquera abierta!\n";
} else {
    echo "Disquera cerrada aún!\n";
}
 */