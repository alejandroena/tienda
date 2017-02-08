<?php
require_once('./../modelo/BD.php');
 
// Cargamos la librería de Smarty
require_once('./../libs/smarty/Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir = './../vista/templates/';
$smarty->compile_dir = './../vista/templates_c/';
$smarty->config_dir = './../vista/configs/';
$smarty->cache_dir = './../vista/cache/';
// Verificaamos si queremos validar los datos del formulario o solo visualizar el formulario (login.tpl)
if (isset($_POST['enviar'])) {
    $usuario =  $_POST['usuario'];
    $pass = $_POST['password'];
    if ((empty($usuario)) || (empty($pass))) 
        $smarty->assign('error','Debes introducir un nombre de usuario y una contraseña');
    else {
        // Comprobamos las credenciales con la base de datos
        if (BD::verificaCliente($usuario, $pass)) {
            session_start();
            $_SESSION['usuario']=$usuario;    
            header("Location: productos.php");   
            exit;
        }
        else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $smarty->assign('error','Usuario o contraseña no válidos!');
        }
    }
}
// Mostramos la plantilla
$smarty->display('login.tpl');
?>