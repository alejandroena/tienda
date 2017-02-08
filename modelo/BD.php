<?php

require_once('Producto.php');
require_once('ordenador.php');
 
class BD {
    //atributo privado de conexión
    private static $conexion;
 
  /*======================conectar()======================================
     conecta con la base de datos, usando PDO
     da valor al atributo privado y estático $conexion de la clase
     En caso de no conectarse aborta la app y muestra un mensaje
   ****************************************************************************************** */
    private static function conectar(){
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=172.17.0.2;dbname=dwes";
        $usuario = 'root';
        $contrasena = 'root';
        try{
           $conexion= new PDO($dsn, $usuario, $contrasena, $opc);
           $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
             die ('Abortamos la aplicación por fallo conectando con la BD' . $e->getMessage());
         }
         self::$conexion = $conexion;
 
}
 
 
/*======================ejecutaConsulta ($sql,$valores)======================================
    Accion: Ejecuta una consulta preparada con los valores de los parámetros de la consulta preparada
    Parámetros: $sql es la consulta preparada y parametrizada
                $valores es un array asociativo con los valores de los distintos 
                          parámetros de la consulta anterior
    Retorna =La consulta despues de ejecutarla, o null si no la ha podido ejecutaqr
             en caso de no ejecutarla da un mensaje              
 * ***********************************************************************************************/
    protected static function ejecutaConsulta($sql,$valores) {
       if (self::$conexion == null)
            self::conectar();
       $conexion = self::$conexion;
       try{
           $consulta = $conexion->prepare($sql);
           $consulta->execute($valores);
       }catch (PDOException $e) {
           echo 'No se ha podido ejecutar la consulta' . $e->getMessage();
           return null;
        }
       return $consulta;
 
    }
 
 
 /*======================verificaCliente ($nombre,$pass)======================================
    Accion: verifica si un nombre y pass son contenidos en la base de datos
    Parámetros: $nombre es el nombre de usuario
                $pass es la password para ese nombre
    Retorna  true o false según se haya podido o no validar
  * Recordar que la pass está cifrada con md5 en la base de datos      
 * ***********************************************************************************************/   
    public static function verificaCliente($nombre, $pass) {
       $valores = array('usuario'=>$nombre, 'password' =>$pass);
       $sql = <<<FIN
        SELECT usuario FROM usuarios 
        WHERE usuario=:usuario
        AND contrasena=md5(:password)
FIN;
       $resultado = self::ejecutaConsulta ($sql,$valores);
       $verificado = false;
       if ($resultado->fetch())
          $verificado=true;
       return $verificado;
    }
    
/*======================obtieneProducto ()======================================
    Accion: obtiene un array con todos los productos de la bd.
    Parámetros: 
    Retorna  un array de objetos de productos con todos los productos
 * ***********************************************************************************************/      
    public static function obtieneProductos(){
        if (self::$conexion == null)
            self::conectar();
        
        $sql = <<<FIN
        SELECT *
        FROM producto
FIN;
        $resultado = self::$conexion->query($sql);
        $productos = array();
        while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
            $producto = new Producto($fila);
            $productos[] = $producto;
        }
        return $productos;
    }
    
     /*======================obtieneProducto ($codigo)======================================
    Accion: obtiene los datos de un determinado producto cuyo codigo pasamos como argumento
    Parámetros: $codigo es el codigo del producto cuyos datos queremos
    Retorna  un objeto de la clase producto con sus datos(cod, nombre_corto y PVP 
 * ***********************************************************************************************/   
    public static function obtieneProducto($codigo) {
        if (self::$conexion == null)
            self::conectar();
        
        $sql = <<<FIN
        SELECT *
        FROM producto
        WHERE cod='$codigo'
FIN;
        $resultado = self::$conexion->query($sql);
        $producto = new Producto($resultado->fetch(PDO::FETCH_ASSOC));
        return $producto;
    }
    
    public static function obtieneOrdenador($codigo) {
        if (self::$conexion == null)
            self::conectar();
        
        $sql = <<<FIN
        SELECT *
        FROM ordenador
        WHERE cod='$codigo'
FIN;
        $resultado = self::$conexion->query($sql);
        $ordenador = new ordenador($resultado->fetch(PDO::FETCH_ASSOC));
        return $ordenador;
    }
}//End de la clase DB.php
?>
