<?php
require_once('./../libs/smarty/Smarty.class.php');
require_once('./../modelo/Cesta.php');
require_once('./../modelo/Producto.php');

session_start();

if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

$smarty = new Smarty;
 
$smarty->template_dir = './../vista/templates/';
$smarty->compile_dir = './../vista/templates_c/';
$smarty->config_dir = './../vista/configs/';
$smarty->cache_dir = './../vista/cache/';

$c = new Cesta();
$c->carga_cesta();

$smarty->assign("usuario",$_SESSION['usuario']);
$cesta = $c->get_productos();
$smarty->assign("cesta",$cesta);
$cantidad = $c->get_cantidad();
$smarty->assign("cantidad",$cantidad);
$coste = $c->get_coste();
$smarty->assign("coste",$coste);
$smarty->assign("n",1);

$smarty->display("pagar.tpl");
?>
