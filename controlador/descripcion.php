<?php

require_once('./../libs/smarty/Smarty.class.php');
require_once('./../modelo/BD.php');
require_once('./../modelo/ordenador.php');
require_once('./../modelo/Producto.php');

session_start();

if (!isset($_SESSION['usuario']))
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

$smarty = new Smarty;

$smarty->template_dir = './../vista/templates/';
$smarty->compile_dir = './../vista/templates_c/';
$smarty->config_dir = './../vista/configs/';
$smarty->cache_dir = './../vista/cache/';

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $producto = BD::obtieneProducto($codigo);
    $smarty->assign("producto", $producto);
    $ordenador = BD::obtieneOrdenador($codigo);
    $smarty->assign("ordenador", $ordenador);
    $smarty->display("descripcion.tpl");
} else {
    header("Location: productos.php");
}
?>
