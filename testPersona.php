<?php
include "Persona.php";

echo "Ingrese el nombre: \n";
$nombrePersona = trim(fgets(STDIN));

echo "Ingrese el apellido: \n";
$apellidoPersona = trim(fgets(STDIN));

echo "Ingrese el dni: \n";
$dniPersona = trim(fgets(STDIN));

$objetoPersona = new Persona($nombrePersona,$apellidoPersona,$dniPersona);

echo $objetoPersona;