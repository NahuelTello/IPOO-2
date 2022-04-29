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
$objPersona1 = new Persona("Pablo", "Chavez", 1234567);
$objPersona2 = new Persona("Juan Manuel", "De Rosas", 1234567);
$objPersona3 = new Persona("Manuel", "Belgrano", 1234567);
$objPersona4 = new Persona("Pablo", "Chavez", 1234567);


$objLibro1 = new Libro("El caballero de la armadura oxidada", 2010, "Alfaguara", $objPersona1, 150, "Un caballero en busca de la felicidad");
$objLibro2 = new Libro("Mafalda", 1810, "La bolita", $objPersona2, 30, "Una niña de argentina");
$objLibro3 = new Libro("Condorito", 1920, "Libros Argentina", $objPersona3, 45, "Un condor de argentina");
$objLibro4 = new Libro("El caballero de la armadura oxidada", 2010, "Alfaguara", $objPersona1, 150, "Un caballero en busca de la felicidad");

$arrayLibros =  [$objLibro1,$objLibro2,$objLibro3,$objLibro4];
//print_r($arrayLibros);



$i = 0;
while ($i < count($arrayLibros)) {
    $seleccionarLibro = $arrayLibros[$i];
    $seleccionarNumPagina = $seleccionarLibro->getCantidadPaginas();
    $objLectura = new Lectura($arrayLibros, $seleccionarNumPagina);
    $i++;
}

echo "---------------------------------------\n";
echo "Pagina Actual ({$objLectura->getNumPagina()})\n";
echo "Pagina Anterior ({$objLectura->retrocederPagina()})";
echo "\nSiguiente página ({$objLectura->siguientePagina()}).\n";
echo "A que pagina desea ir? ";
$numPag = intval(trim(fgets(STDIN)));
echo "Ahora la pagina actual es ({$objLectura->irPagina($numPag)}).\n";
$objLectura->setNumPagina($numPag);
echo "---------------------------------------\n";

echo "Ingrese el titulo del libro: ";
$titulo = trim(fgets(STDIN));
if ($objLectura->libroLeido($titulo)) {
    echo "Libro Leido\n";
} else {
    echo "Libro no leido en la coleccion\n";
}
echo "Ingrese el Titulo del Libro: ";
$libro = trim(fgets(STDIN));
$sinopsisLibro = $libro;
echo "Sinopsis del Libro {$libro}: {$objLectura->darSinopsis($sinopsisLibro)}.\n";
echo "Ingrese un año de edicion ";
$anioEdicion = intval(trim(fgets(STDIN)));
$array =  $objLectura->leidosAnioEdicion($anioEdicion);
echo "Libros del mismo año de edicion: ".arrayStr($array)."\n";

echo "Ingrese el nombre de un Autor: ";
$autor = trim(fgets(STDIN));
$arreglo = $objLectura->darLibrosPorAutor($autor);
echo "Libro por Autor: ".arrayStr($arreglo)."\n";

//echo $objLectura . "\n";
function arrayStr($array){
    $str = " ";
    foreach ($array as $key => $elemento) {
        $objLibro = $elemento;
        $str .= $objLibro." ";
    }
    return $str;
}

echo $objLectura;
/* 
    Realizar las modificaciones que crea necesaria en la clase implementada en el punto 4 para poder almacenar
    información de los libros que va leyendo una persona. Implementar los siguientes métodos:
        a) libroLeido($titulo): retorna true si el libro cuyo título recibido por parámetro se encuentra dentro del conjunto de libros leídos y false en caso contrario.
        b) darSinopsis($titulo): retorna la sinopsis del libro cuyo título se recibe por parámetro.
        c) leidosAnioEdicion($x): que retorne todos aquellos libros que fueron leídos y su año de edición es un año X recibido por parámetro.
        d) darLibrosPorAutor($nombreAutor): retorna todos aquellos libros que fueron leídos y el nombre de su autor coincide con el recibido por parámetro. 
*/



