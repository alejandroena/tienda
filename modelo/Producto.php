<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author alumno
 */

class Producto {
    private $codigo;
    private $nombre;
    private $nombre_corto;
    private $PVP;
    private $familia;
    private $descripcion;
    
    public function __construct($fila) {
        $this->codigo = $fila['cod'];
        $this->nombre = $fila['nombre'];
        $this->nombre_corto = $fila['nombre_corto'];
        $this->PVP = $fila['PVP'];
        $this->familia = $fila['familia'];
        $this->descripcion = $fila['descripcion'];
    }
    
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function getNombre_corto(){
        return $this->nombre_corto;
    }
    
    public function getPVP(){
        return $this->PVP;
    }
    
    public function getFamilia(){
        return $this->familia;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
}
