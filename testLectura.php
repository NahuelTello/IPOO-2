<?php
require_once ("Lectura.php");
require_once ("Libro.php");
require_once("Persona.php");
/* 
    Se desea implementar una clase Lectura que almacena información sobre la lectura de un determinado libro.
    Esta clase tiene como variable instancia un referencia a un objeto Libro y el número de la página que se esta
    leyendo. Por otro lado la clase contiene los siguientes métodos:
        a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos de la clase.
        b) Los métodos de acceso de cada uno de los atributos de la clase.
        c) siguientePagina(): método que retorna la página del libro y actualiza la variable que contiene la pagina actual.
        d) retrocederPagina(): método que retorna la página anterior a la actual del libro y actualiza su valor.
        e) irPagina(x): método que retorna la página actual y setea como página actual al valor recibido por parámetro.
        f) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
        g) Crear un script Test_Lectura que cree un objeto Lectura e invoque a cada uno de los métodos implementados. 
    */
$objPersona = new Persona("Pablo", "Chavez", 1234567);
$paginas = 100;
$objLibro = new Libro("El caballero de la armadura oxidada", 2010, "Alfaguara", $objPersona, $paginas, "Un caballero en busca de la felicidad");
$objLectura = new Lectura($objLibro, 99);

echo "Pagina Actual ({$objLectura->getNumPagina()})\n";
echo "Pagina Anterior ({$objLectura->retrocederPagina()})";
$objLectura->setNumPagina(99);
echo "\nSiguiente página ({$objLectura->siguientePagina()}).\n";
echo "A que pagina desea ir? ";
$numPag = intval(trim(fgets(STDIN)));
echo "Ahora la pagina actual es ({$objLectura->irPagina($numPag)})!";

echo $objLectura;


