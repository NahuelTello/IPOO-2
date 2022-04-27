<?php
class Libro
{
    /* 
    Realizar las modificaciones necesarias en la clase Libro (Ejercicio 16 del TP1) para que en vez de contener
    como atributos nombre y apellido del autor del libro, tenga una referencia a las clase Persona. Además
    agregue como variables instancias de la clase la cantidad de páginas y sinopsis del libro.
        a) Método constructor _ _construct () que recibe como parámetros los valores iniciales para los atributos
        de la clase.
        b) Los métodos de acceso de cada uno de los atributos de la clase.
        c) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase
        d) Crear un script Test_Libro que cree un objeto Libro e invoque a cada uno de los métodos
        implementados. 
    */
    //Atributos
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $instanciaAutor;
    private $cant_paginas;
    private $sinopsis; 
    /* La sinopsis es mucho más que un resumen, consiste en nombrar a la exposición general de una materia. 
    La sinopsis, en este sentido, se encarga de presentar las líneas más importantes del asunto en cuestión, 
    dejando de lado los detalles y centrándose en lo esencial para el desarrollo de los contenidos. */

    //Constructor
    public function __construct($tituloLibro, $anioEd, $editorialLibro, $objAutor, $cantPaginas, $sinopsisLibro)
    {
        $this->titulo = $tituloLibro;
        $this->anioEdicion = $anioEd;
        $this->editorial = $editorialLibro;
        $this->instanciaAutor = $objAutor;
        $this->cant_paginas = $cantPaginas;
        $this->sinopsis  = $sinopsisLibro;
    }

    //Metodos
    //getter y setter 

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getAnioEdicion()
    {
        return $this->anioEdicion;
    }

    public function setAnioEdicion($anioEdicion)
    {
        $this->anioEdicion = $anioEdicion;
    }

    public function getEditorial()
    {
        return $this->editorial;
    }

    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }

    public function getSinopsis(){
        return $this->sinopsis;
    }

    public function setSinopsis($nuevaSinopsis){
        $this->sinopsis = $nuevaSinopsis;
    }

    public function getCantidadPaginas(){
        return $this->cant_paginas;
    }

    public function setCantidadPaginas($nuevaCantidad){
        $this->cant_paginas = $nuevaCantidad;
    }

    public function getObjAutor(){
        return $this->instanciaAutor;
    }

    public function sertObjAutor($nuevoAutorObj){
        $this->instanciaAutor = $nuevoAutorObj;
    }

    //Metodo toString
    public function __toString()
    {   
        $objAutor = $this->getObjAutor();
        $str = "\nTítulo: {$this->getTitulo()}.\nAño de edición: {$this->getAnioEdicion()}.\nEditorial: {$this->getEditorial()}.\nNombre del autor: {$objAutor->getNombre()} {$objAutor->getApellido()}.\nCantidad de Paginas: {$this->getCantidadPaginas()}.\nSinopsis: {$this->getSinopsis()}.\nAños de edicion: {$this->aniosdesdeEdicion()}.";
        return $str;
    }

    /**Metodo para saber si el libro pertener a una editorial parametro
     * @param string $peditorial
     * @return boolean
     */
    public function perteneceEditorial($peditorial)
    {
        $perteneceEditorial = false;
        if ($this->editorial == $peditorial) {
            $perteneceEditorial = true;
        };
        return $perteneceEditorial;
    }

    /**Metodo para retornar la cantidad de años que pasaron desde la publicacion
     * @param void
     * @return int
     */
    public function aniosdesdeEdicion()
    {
        $year = date('Y');
        $aniosPublicado = $year - $this->anioEdicion;
        return $aniosPublicado;
    }

    
}
