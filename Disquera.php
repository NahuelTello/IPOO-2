<?php
class Disquera{

    //Atributos
    private $objHoraDesde; //objetjo Hora
    private $objHoraHasta; //objetjo Hora
    private $estado = false;
    private $direccion;
    private $objDuenio; //objeto persona

    public function __construct($objHInicio, $objHFin, $objPersona ,$dire)
    {
        $this->objHoraDesde = $objHInicio; //Pasar por parametro un objeto reloj
        $this->objHoraHasta =  $objHFin; //Pasar por parametro un objeto reloj
        $this->objDuenio = $objPersona; //Pasar por parametro un objeto persona
        $this->direccion = $dire;
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

    public function __toString()
    {
        $objHorario = "{$this->getObjHoraDesde()}Hs - {$this->getObjHoraHasta()}Hs";
        $objDuenio = $this->getObjDuenio();
        $cadena = "Horario de atención al público {$objHorario} \nDueño de la disquera\n{$objDuenio}\nDireccion - {$this->getDireccion()}";
        return $cadena;
    }

    /**
     * Verifica si el horario se encuentra dentro del horario de atencion
     * @param int $hora
     * @param int $minutos
     * @return boolean
     */
    public function dentroHorarioAtencion($hora,$minutos){
        $hDesde = $this->getObjHoraDesde()->getHora(); //Desde el obj de reloj obtengo la hora de abertura
        $mDesde = $this->getObjHoraDesde()->getMinutos(); //Desde el obj de reloj obtengo los minutos de abertura
        $horarioDesde = date("{$hDesde}:{$mDesde}",time());
        mktime($horarioDesde);
        //date() - Dar formato a la fecha/hora local
        //echo $horarioDesde."\n";
        $hHasta = $this->getObjHoraHasta()->getHora(); //Desde el obj de reloj obtengo la hora de cierre
        $mHasta = $this->getObjHoraDesde()->getMinutos(); //Desde el obj de reloj obtengo los minutos de cierre
        $horarioHasta = date("{$hHasta}:{$mHasta}", time());
        //echo $horarioHasta . "\n";

        $comparaHorario = time() + ($horarioDesde * $horarioHasta);
        //echo $comparaHorario . "\n";

        $nuevoEstado = false;

        if ( $horarioDesde >= $comparaHorario && $horarioHasta < $comparaHorario  ) {
            $nuevoEstado = true;
            $this->setEstado($nuevoEstado);
        } else {
            $nuevoEstado = false;
        }
        return $nuevoEstado;
    }

    /**
     * Verifica dado un horario si se encuentra dentro del horario de atencion, cambia el estado de la disquera
     */
    public function abrirDisquera($hora, $minutos){
        $horaAbierto = $this->getObjHoraDesde()->getHora();
        $minutosAbierto = $this->getObjHoraDesde()->getMinutos();
        $nuevoEstado = $this->getEstado();
        /* if (( $hora >= $horaAbierto )&&( $minutos>=$minutosAbierto )  && ($nuevoEstado == "abierto")) {
            $this->setEstado($nuevoEstado);
        } */
        return $nuevoEstado;
    }

    public function validarHorarioCierre($hora, $minutos){
        $horaHasta = $this->getObjHoraHasta()->getHora();
        $minutosHasta = $this->getObjHoraHasta()->getMinutos();
        $horaValida = false;

        if($hora >= $horaHasta && $minutos >= $minutosHasta){
            $horaValida = true;
        } else {
            $horaValida = false;
        }

        return $horaValida;
    }

    /* cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del
    horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre. */

    public function cerrarDisquera($hora, $minutos){
        $horaHasta = $this->getObjHoraHasta()->getHora();
        $minutosHasta = $this->getObjHoraHasta()->getMinutos();
        $verificarHorario = $this->validarHorarioCierre($horaHasta, $minutosHasta);

        if ($verificarHorario == $hora && $verificarHorario == $minutos) {
            $nuevoEstado = "cerrado";
            $this->setEstado($nuevoEstado);
        }
    }


}
