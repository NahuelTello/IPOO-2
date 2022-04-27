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

    private $objLibro;
    private $numeroPagina;

    public function __construct($instanciaLibro, $cantPaginas)
    {
        $this->objLibro = $instanciaLibro;
        $this->numeroPagina = $cantPaginas;
    }

    public function getObjLibro(){
        return $this->objLibro;
    }

    public function setObjLibro($nuevaInstancia){
        $this->objLibro = $nuevaInstancia;
    }

    public function getNumPagina(){
        return $this->numeroPagina;
    }

    public function setNumPagina($nuevaPagina){
        $this->numeroPagina = $nuevaPagina;
    }

    public function __toString()
    {
        $objLibroStr = $this->getObjLibro();
        $str = "\n---------\nLibro{$objLibroStr->__toString()}\nNúmero de Pagina Leyéndose ({$this->getNumPagina()})";
        return $str;
    }


    private function existePagina($i){
        $cantTotalPaginas = $this->getObjLibro();
        $existe = false;
        if ($i < $cantTotalPaginas->getCantidadPaginas()  || $cantTotalPaginas->getCantidadPaginas() <= $i ) {
            $existe = true;
        } else {
            $existe = false;
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

}