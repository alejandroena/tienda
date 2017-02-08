<?php


class ordenador{
    private $codigo;
    private $procesador;
    private $RAM;
    private $disco;
    private $grafica;
    private $optica;
    private $SO;
    private $otros;
    
    public function __construct($fila){
        $this->codigo = $fila["cod"];
        $this->procesador = $fila["procesador"];
        $this->RAM = $fila["RAM"];
        $this->disco = $fila["disco"];
        $this->grafica = $fila["grafica"];
        $this->optica = $fila["unidadoptica"];
        $this->SO = $fila["SO"];
        $this->otros = $fila["otros"];
    }
    
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function getProcesador(){
        return $this->procesador;
    }
    
    public function getRAM(){
        return $this->RAM;
    }
    
    public function getDisco(){
        return $this->disco;
    }
    
    public function getGrafica(){
        return $this->grafica;
    }
    
    public function getOptica(){
        return $this->optica;
    }
    
    public function getSO(){
        return $this->SO;
    }
    
    public function getOtros(){
        return $this->otros;
    }
}

?>
