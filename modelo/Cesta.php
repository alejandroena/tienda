<?php

require_once('BD.php');
require_once('Producto.php');

class Cesta {
    
    protected $productos = array();
    protected $cantidad = array();
    
    public function nuevo_articulo($codigo){
        $this->productos[$codigo] = BD::obtieneProducto($codigo);
        $this->cantidad[$codigo]+= 1;
    }
    
    public function borrar_articulo($codigo){
        if($this->cantidad[$codigo]>1){
            $this->cantidad[$codigo]-= 1;
        }else{
            unset($this->cantidad[$codigo]);
            unset($this->productos[$codigo]);
        }
    }
    
    public function get_productos(){
        return $this->productos;
    }
    
    public function get_cantidad(){
        return $this->cantidad;
    }
    
    public function get_coste(){
        if($this->vacia()==false){
            foreach($this->productos as $producto){
                $coste+=($producto->getPVP()*$this->cantidad[$producto->getCodigo()]);
            }
        }else{
            $coste=0;
        }

        return $coste;
    }
    
    public function vacia(){
        if(empty($this->productos)){
            return true;
        }else{
            return false;
        }
    }
    
    public function guarda_cesta(){
        session_start();
        $_SESSION['cesta'] = $this->productos;
        $_SESSION['cantidad'] = $this->cantidad;
    }
    
    public function carga_cesta(){
        session_start();        
        $this->productos = $_SESSION['cesta'];
        $this->cantidad = $_SESSION['cantidad'];
    }
    
    public function __toString(){
        if($this->vacia()){
            $cadena = "Cesta vacia";
        }else{
            $cadena = "<div id=listado><table border=1>";
            foreach ($this->productos as $producto){
                $cadena.="<tr><td width=280><span class=nombre>"
                .$producto->getNombre_corto()."</span><button type=button onclick=borrar('"
                .$producto->getCodigo()."') style='width:20px; height:25px' >X</button></td>"
                . "<td>".$this->cantidad[$producto->getCodigo()]."</td></tr>";
            }
            $cadena.="</table><br /></div><span class=precio>Total: ".$this->get_coste()."€</span>"
                ."<div id=botonesCesta><button type=button onclick='vaciar()' >Vaciar</button>"
                ."<button type=button onclick=window.location.href='./pagar.php' >Pagar</button></div>";
        }
        return $cadena;
    }
}
