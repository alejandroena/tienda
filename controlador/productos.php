<?php
require_once('./../libs/smarty/Smarty.class.php');
require_once('./../libs/xajax_core/xajax.inc.php');
require_once('./../modelo/BD.php');
require_once('./../modelo/Cesta.php');
require_once('./../modelo/Producto.php');
// Recuperamos la información de la sesión
session_start();
// Y comprobamos que el usuario se haya autentificado, para evitar que puedan acceder directamente
//a esta pagina sin pasar por el login
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
// Cargamos la librería de Smarty
$smarty = new Smarty;
 
$smarty->template_dir = './../vista/templates/';
$smarty->compile_dir = './../vista/templates_c/';
$smarty->config_dir = './../vista/configs/';
$smarty->cache_dir = './../vista/cache/';

$smarty->assign("usuario",$_SESSION['usuario']);
$productos = BD::obtieneProductos();
$smarty->assign("productos",$productos);

if(isset($_POST['pagar'])){
    header("Location:pagar.php");
}

if(!isset($c)){
    $c = new Cesta();
}

if(!is_null($_SESSION['cesta']) && !is_null($_SESSION['cantidad'])){
    $c->carga_cesta();
}

/*
if(isset($_POST['añadir'])){
    $codigo = filter_input(INPUT_POST, "codigo");
    $c->nuevo_articulo($codigo);
    $c->guarda_cesta();
}

if(isset($_POST['borrar'])){
    $cod = filter_input(INPUT_POST, "cod");
    $c->borrar_articulo($cod);
    $c->guarda_cesta();
}
if(isset($_POST['vaciar'])){
    $_SESSION['cesta'] = null;
    $_SESSION['cantidad'] = null;
}
*/

$ajax = new xajax();
$ajax->configure('javascript URI', './../libs/');
$ajax->register(XAJAX_FUNCTION,"add");
$ajax->register(XAJAX_FUNCTION,"borrar");
$ajax->register(XAJAX_FUNCTION,"vaciar");

$ajax->processRequest();

function add($codigo){
    $respuesta = new xajaxResponse();

    $c= new Cesta();
    $c->carga_cesta();
    $c->nuevo_articulo($codigo);
    $c->guarda_cesta();

    $respuesta->assign("cestaProductos","innerHTML",$c->__toString());
    
    return $respuesta;
}

function borrar($codigo){
    $respuesta = new xajaxResponse();
    
    $c= new Cesta();
    $c->carga_cesta();
    $c->borrar_articulo($codigo);
    $c->guarda_cesta();
    
    $respuesta->assign("cestaProductos","innerHTML",$c->__toString());
    
    return $respuesta;
}

function vaciar(){
    $respuesta = new xajaxResponse();
    
    $_SESSION['cesta'] = null;
    $_SESSION['cantidad'] = null;
    $c= new Cesta();
    $c->guarda_cesta();
    
    $respuesta->assign("cestaProductos","innerHTML",$c->__toString());
    
    return $respuesta;
}


$cesta = $c->get_productos();
$smarty->assign("cesta",$cesta);
$cantidad = $c->get_cantidad();
$smarty->assign("cantidad",$cantidad);
$coste = $c->get_coste();
$smarty->assign("coste",$coste);
$smarty->assign("codJS",$ajax->getJavascript());

$aaa = $c->__toString();
//Ahora mostramos la plantilla
$smarty->display("productos.tpl");
?>