<?php
include "CuentaBancaria2.php";
include "Persona.php";


$objPersona = new Persona("Nahuel","Tello",43340691);
$objCuenta = new CuentaBancaria2($objPersona,100000,45);
echo $objCuenta;
echo "Nro de cuenta: {$objCuenta->getNroCuenta()} \n";
$objCuenta->setNroCuenta(28042001);

echo "Saldo actual: {$objCuenta->getSaldoActual()} \n";
$objCuenta->setSaldoActual(180000);

echo "Interes anual: {$objCuenta->getInteresAnual()} \n";
$objCuenta->setInteresAnual(8.3);

$objCuenta->actualizarSaldo();

echo $objCuenta->depositar(5000) . "\n";

echo $objCuenta->retirar(300) . "\n";

echo $objCuenta->__toString() . "\n";