<?php
class Lectura{
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

    private $array_objLibro;
    private $numeroPagina;
    //private $arrayLibros = [];

    public function __construct($instanciaLibro, $nPagina)
    {
        $this->array_objLibro = $instanciaLibro;
        $this->numeroPagina = $nPagina;
    }

    public function getArrayObjLibro(){
        return $this->array_objLibro;
    }

    public function setArrayObjLibro($nuevaInstancia){
        $this->array_objLibro = $nuevaInstancia;
    }

    public function getNumPagina(){
        return $this->numeroPagina;
    }

    public function setNumPagina($nuevaPagina){
        $this->numeroPagina = $nuevaPagina;
    }

    /* public function getArrayLibros(){
        return $this->arrayLibros;
    }

    public function setArrayLibros($nuevoArray){
        $this->arrayLibros = $nuevoArray;
    } */

    public function __toString()
    {
        $objLibroStr = $this->librosStr();
        $str = "\n---------\nLibro{$objLibroStr}\nNúmero de Pagina Leyéndose ({$this->getNumPagina()})";
        return $str;
    }

    public function librosStr(){
        $libroStr = " ";
        foreach ($this->getArrayObjLibro() as $indice => $elemento) {
            $objLibro = $elemento;
            $str = $objLibro->__toString()."\n";
            $libroStr .= $str;
        }
        return $libroStr;
    }

    private function existePagina($pagina){
        /**
         * $cantTotalPaginas = $this->getObjLibro();
         * $existe = false;
         * if ($i < $cantTotalPaginas->getCantidadPaginas()  || $cantTotalPaginas->getCantidadPaginas() <= $i ) {   
         * $existe = true;
         * } else {
         * $existe = false;
         * } */ 
        $existe = false;
        $nuevaColeccion = $this->getArrayObjLibro(); //objLibro es un array con los libros almacenados
        $i = 0;
        while ( ($existe) && ( $i < count($nuevaColeccion) ) ) {
            $seleccionarPagina = $nuevaColeccion[$i];
            $seleccionarPagina->getCantidadPaginas();
            if ($pagina < $seleccionarPagina || $seleccionarPagina <= $pagina) {
                $existe = true;
            }
            $i++;
        }
        return $existe;
    }

    /**
     * método que retorna la página del libro y actualiza la variable que contiene la pagina actual
     * @param void
     * @return int
     */
    public function siguientePagina(){
        $i = $this->getNumPagina();
        $paginaExistente = $this->existePagina($i);
        $nuevaPagina = 0;
        if ($paginaExistente) {
            $nuevaPagina = $i + 1;
            $this->setNumPagina($nuevaPagina);
        }
        return $nuevaPagina;
    }

    /**
     * método que retorna la página anterior a la actual del libro y actualiza su valor.
     * @param void
     * @return int
     */
    public function retrocederPagina(){
        $i = $this->getNumPagina();
        $paginaExistente = $this->existePagina($i);
        $paginaAnterior = -1;
        if ($paginaExistente) {
            $paginaAnterior = $i - 1;
            $this->setNumPagina($paginaAnterior);
        }
        return $paginaAnterior;
    }

    /**
     * irPagina(x): método que retorna la página actual y setea como página actual al valor recibido por parámetro.
     * @param int $x
     * @return int
     */
    public function irPagina($x){
        if ($this->existePagina($x)) {
            $this->setNumPagina($x);
        }
        return $x;
    }

    /* 
    Realizar las modificaciones que crea necesaria en la clase implementada en el punto 4 para poder almacenar
    información de los libros que va leyendo una persona. Implementar los siguientes métodos:
        a) libroLeido($titulo): retorna true si el libro cuyo título recibido por parámetro se encuentra dentro del conjunto de libros leídos y false en caso contrario.
        b) darSinopsis($titulo): retorna la sinopsis del libro cuyo título se recibe por parámetro.
        c) leidosAnioEdicion($x): que retorne todos aquellos libros que fueron leídos y su año de edición es un año X recibido por parámetro.
        d) darLibrosPorAutor($nombreAutor): retorna todos aquellos libros que fueron leídos y el nombre de su autor coincide con el recibido por parámetro. 
    */

    /**
     * retorna true si el libro cuyo título recibido por parámetro se encuentra dentro del conjunto de libros leídos y false en caso contrario
     * @param String $titulo
     * @return boolean
     */
    public function libroLeido($titulo){
        $leido = false;
        $nuevaColeccion = $this->getArrayObjLibro();
        $longArreglo = count($nuevaColeccion);
        $i = 0;
        while ((!$leido) && ($i < $longArreglo)) {
            $seleccionarLibro = $nuevaColeccion[$i];
            $comparaTitulo = $seleccionarLibro->getTitulo();
            if ($titulo == $comparaTitulo) {
                $leido = true;
            }
            $i++;
        }
        return $leido;
    }

    /**
     * retorna la sinopsis del libro cuyo título se recibe por parámetro.
     * @param String $titulo
     * @return String
     */
    public function darSinopsis($titulo){

        $sinopsis = " ";
        $encontrado = false;
        $nuevaColeccion = $this->getArrayObjLibro();
        $longArreglo = count($nuevaColeccion);
        $i = 0;
        while( ( !$encontrado )&&( $i < $longArreglo ) ){
            $seleccionarLibro = $nuevaColeccion[$i];
            $comparaTitulo = $seleccionarLibro->getTitulo();
            if ($this->libroLeido($comparaTitulo)) {
                if ( $comparaTitulo == $titulo ) {
                    $sinopsis = $seleccionarLibro->getSinopsis();
                    $encontrado = true;
                } 
            }
            
            $i++;
        }

        return $sinopsis;
    }


    /**
     * retorna todos aquellos libros que fueron leídos y su año de edición es un año X recibido por parámetro.
     * @param int $x
     * @return return array
    */
    public function leidosAnioEdicion($x){
        $encontrado = false;
        $nuevaColeccion = $this->getArrayObjLibro();
        $longArreglo = count($nuevaColeccion);
        $i = 0;

        while ( (!$encontrado) && ($i < $longArreglo) ) {
            $seleccionarLibro = $nuevaColeccion[$i];
            $comparaAnioEdicion = $seleccionarLibro->getAnioEdicion();
            $titulo = $seleccionarLibro->getTitulo();
            
            if ($this->libroLeido($titulo)) {
                if ($comparaAnioEdicion == $x) {
                    $encontrado = true;
                    $librosEncontrados = ["Libro" => $titulo ,"Año Edicion" => $comparaAnioEdicion ];
                }
            }
            $i++;
        }

        return $librosEncontrados;
    }

    /**
     * retorna todos aquellos libros que fueron leídos y el nombre de su autor coincide con el recibido por parámetro. 
     * @param String $nombreAutor
     * @return array
     */
    public function darLibrosPorAutor($nombreAutor){
        $autorEncontrado = false;
        $nuevaColeccion = $this->getArrayObjLibro();
        $longArreglo = count($nuevaColeccion);
        $i = 0;
        $autoresEncontrados = [];

        while ( (!$autorEncontrado) && ($i < $longArreglo)) {
            
            $seleccionarLibro = $nuevaColeccion[$i];
            $seleccionarAutor = $seleccionarLibro->getObjAutor();
            $titulo = $seleccionarLibro->getTitulo();
            $comparaNombre = $seleccionarAutor->getNombre();

            if ($this->libroLeido($titulo)) {
                if ($comparaNombre == $nombreAutor) {
                    $autorEncontrado = true;
                    $autoresEncontrados = ["Nombre" => $comparaNombre, "Libro" => $titulo];
                }
            }
            
            $i++;
        }

        return $autoresEncontrados;
    }
}