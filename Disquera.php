<?php
class Disquera{

    //Atributos
    private $objHoraDesde; //objetjo Hora
    private $objHoraHasta; //objetjo Hora
    private $estado; 
    private $direccion;
    private $objDuenio; //objeto persona

    public function __construct($objHInicio, $objHFin, $estadoDis, $dire, $objPersona)
    {
        $this->objHoraDesde = $objHInicio; //Pasar por parametro un objeto
        $this->objHoraHasta =  $objHFin; //Pasar por parametro un objeto
        $this->estado = $estadoDis;
        $this->direccion = $dire;
        $this->objDuenio = $objPersona; //Pasar por parametro un objeto
    }

    public function getObjHoraDesde(){
        return $this->objHoraDesde;
    }

    public function setObjHoraDesde($nuevaHora){
        $this->objHoraDesde = $nuevaHora;
    }

    public function getObjHoraHasta(){
        return $this->objHoraHasta;
    }

    public function setObjHoraHasta($nuevaHora){
        $this->objHoraHasta = $nuevaHora;
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

    /**
     * Verifica si el horario se encuentra dentro del horario de atencion
     * @param int $hora, $minutos
     * @return boolean
     */
    public function dentroHorarioAtencion($hora,$minutos){
        $hAbierto = $this->getObjHoraDesde(); //Desde el obj de reloj obtengo la hora de abertura
        $mAbierto = $hAbierto->getMinutos(); //Desde el obj de reloj obtengo los minutos de abertura
        $hCerrado = $this->getObjHoraHasta(); //Desde el obj de reloj obtengo la hora de cierre
        $mCerrado = $hCerrado->getMinutos(); //Desde el obj de reloj obtengo los minutos de cierre
        $abierto = false;

        if ( (($hora == $hAbierto) && ($minutos == $mAbierto)) || (($hora == $hCerrado) && ($minutos == $mCerrado))) {
            $abierto = true;
        } else {
            $abierto = false;
        }
        return $abierto;
    }

    /**
     * Verifica dado un horario si se encuentra dentro del horario de atencion, cambia el estado de la disquera
     */
    public function abrirDisquera($hora, $minutos){
        $horaAbierto = $this->getObjHoraDesde();
        $minutosAbierto = $horaAbierto->getMinutos();
        $abierto = false;
        if (( $hora >= $horaAbierto )&&( $minutos>=$minutosAbierto )) {
            $abierto = true;
        } else {
            $bierto = false;
        }
        return $abierto;
    }

    public function __toString(){
        $objHorario = "{$this->getObjHoraDesde()}Hs - {$this->getObjHoraHasta()}Hs";
        $objDuenio = $this->getObjDuenio();
        $cadena = "Horario de atención al público: {$objHorario} \nDueño de la disquera: {$objDuenio}.";
        return $cadena;
    }
}