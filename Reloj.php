<?php
class Reloj
{
    //ATRIBUTOS
    private $horas;
    private $minutos;
    

    //METODOS
    public function __construct($horas, $minutos)
    {
        $this->horas = $horas;
        $this->minutos = $minutos;
        
    }

    //METODOS GETTERS Y SETTERS

    public function getHora()
    {
        return $this->horas;
    }

    public function getMinutos()
    {
        return $this->minutos;
    }

    public function getSegundos()
    {
        return $this->segundos;
    }

    /* public function getCronometroStatus(){
        $cronometro = $this->getHora().":".$this->getMinutos().":".$this->getSegundos();
        return $cronometro;
    } */

    /**
     * @param int $h
     */
    public function setHora($h)
    {
        $this->horas = $h;
    }

    /**
     * @param int $m
     */
    public function setMinutos($m)
    {
        $this->minutos = $m;
    }
    /**
     * @param int $s
     */
    public function setSegundos($s)
    {
        $this->segundos = $s;
    }

    public function puesta_a_cero()
    {
        $this->setHora(0);
        $this->setMinutos(0);
        $this->setSegundos(0);
    }

    /**
     * Funcion que incrementa los segundos, minutos y horas. Cuando el cronometro llegue a 23:59:59 deberá pasar a 
     * 00:00:00
     */
    public function incrementar()
    {

        do {
            if (($this->getHora() == 23) && ($this->getMinutos() == 59) && ($this->getSegundos() == 59)) {
                //Si el cronometro llega a 23:59:59 inicia desde 0
                $this->puesta_a_cero();
                echo "{$this->getHora()}:{$this->getMinutos()}:{$this->getSegundos()}";
            } elseif (($this->getMinutos() >= 59) && ($this->getSegundos() >= 59)) {
                //Si el minuto llega a 0:59:59 se le incrementa una hora
                $this->setHora($this->getHora() + 1);
                $this->setMinutos(0);
            }

            //Segundos
            if ($this->getSegundos() >= 59) {
                //Si el segundo llega a 00:00:59 se incrementa un minuto
                $this->setMinutos($this->getMinutos() + 1);
            }
            if ($this->getSegundos() >= 59) {
                //Cuando los segundos llegan a 59, inician nuevamente en 0
                $this->setSegundos(0);
            } else {
                //Mientras los segundos no lleguen a 59, se ira incrementando
                $this->setSegundos($this->getSegundos() + 1);
            }
            $horas = $this->getHora();
            echo $this;
        } while ($horas = 24);
    }

    public function __toString()
    {
        return "{$this->getHora()}:{$this->getMinutos()}:{$this->getSegundos()}" . "\n";
    }
}
