<?php
include "Disquera.php";
include "Reloj.php";

$objHorarioApertura = new Reloj(8, 30);
$objHorarioCierre = new Reloj(21, 0);
$objDisquera = new Disquera($objHorarioApertura, $objHorarioCierre,  );