<?php
require_once ("Libro.php");
require_once ("Persona.php");

/* 
    Realizar las modificaciones necesarias en la clase Libro (Ejercicio 16 del TP1) para que en vez de contener
    como atributos nombre y apellido del autor del libro, tenga una referencia a las clase Persona. Además
    agregue como variables instancias de la clase la cantidad de páginas y sinopsis del libro.
        a) Método constructor _ _construct () que recibe como parámetros los valores iniciales para los atributos de la clase.
        b) Los métodos de acceso de cada uno de los atributos de la clase.
        c) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase
        d) Crear un script Test_Libro que cree un objeto Libro e invoque a cada uno de los métodos
        implementados. 
*/
$objPersona = new Persona("Pablo","Chavez",1234567);
$objLibro = new Libro("El caballero de la armadura oxidada", 2010, "Alfaguara", $objPersona, 100, "Un caballero en busca de la felicidad");

echo "Ingrese la editorial: ";
$editoria = trim(fgets(STDIN));
if ($objLibro->perteneceEditorial($editoria)) {
    echo "Pertenece a la editorial ingresada\n";
} else {
    echo "No pertenece a la editorial ingresada\n";
}

echo $objLibro."\n";

