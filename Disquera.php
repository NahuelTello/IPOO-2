<?php
class Disquera{

    //Atributos
    private $hora_desde;
    private $hora_hasta; 
    private $estado;
    private $direccion;
    private $objDuenio; //objeto persona

    public function __construct($h_inicio, $h_fin,$state , $objPersona ,$dire)
    {
        $this->hora_desde = $h_inicio; 
        $this->hora_hasta =  $h_fin; 
        $this->estado = $state;
        $this->objDuenio = $objPersona; //Pasar por parametro un objeto persona
        $this->direccion = $dire;
    }

    public function getHoraDesde(){
        return $this->hora_desde;
    }

    public function setHoraDesde($nuevaHora){
        $this->hora_desde = $nuevaHora;
    }

    public function getHoraHasta(){
        return $this->hora_hasta;
    }

    public function setHoraHasta($nuevaHora){
        $this->hora_hasta = $nuevaHora;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estadoNuevo){
        $this->estado = $estadoNuevo;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($nuevaDireccion){
        $this->direccion = $nuevaDireccion;
    }

    public function getObjDuenio(){
        return $this->objDuenio;
    }

    public function setObjDuenio($nuevoObj){
        $this->objDuenio = $nuevoObj;
    }

    public function __toString()
    {
        $Horario = "{$this->getHoraDesde()}Hs - {$this->getHoraHasta()}Hs";
        $objDuenio = $this->getObjDuenio();
        $cadena = "Horario de atención al público {$Horario} \nDueño de la disquera\n{$objDuenio}\nDireccion - {$this->getDireccion()}";
        return $cadena;
    }

    /**
     * Verifica si el horario se encuentra dentro del horario de atencion
     * @param int $hora
     * @param int $minutos
     * @return boolean
     */
    public function dentroHorarioAtencion($hora,$minutos){
        $coleccionStrHora = $this->getHoraDesde();
        $coleccionHorarioAtencion = explode(":",$coleccionStrHora);
        $horaAtencion = $coleccionHorarioAtencion[0];
        $minutosAtencion = $coleccionHorarioAtencion[1];

        $coleccionStrHora2 = $this->getHoraHasta();
        $coleccionHorarioCierre = explode(":", $coleccionStrHora2);
        $horaCierre = $coleccionHorarioCierre[0];
        $minutosCierre = $coleccionHorarioCierre[1];

        $state = false;
        if ($hora >= $horaAtencion && $hora <= $horaCierre) {
            if ($minutos <= $minutosCierre || $minutos < $minutosAtencion) {
                $state = true;
            }
        }
        return $state;
    }
 
    /**
     * Verifica dado un horario si se encuentra dentro del horario de atencion, cambia el estado de la disquera
     */
    public function abrirDisquera($hora, $minutos){
        $nuevoEstado = $this->dentroHorarioAtencion($hora,$minutos);
        if ($nuevoEstado) {
            $this->setEstado("Abierto");
        } else {
            $this->setEstado("Cerrado");
        }
    }

    public function validarHorarioCierre($hora, $minutos){
        
    }

    /* cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del
    horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre. */

    public function cerrarDisquera($hora, $minutos){
        
    }


}
