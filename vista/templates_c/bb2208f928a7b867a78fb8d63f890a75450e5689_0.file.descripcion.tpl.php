<?php
/* Smarty version 3.1.30, created on 2017-01-24 14:08:14
  from "/var/www/tienda/vista/templates/descripcion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_588751beced2e5_59958391',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb2208f928a7b867a78fb8d63f890a75450e5689' => 
    array (
      0 => '/var/www/tienda/vista/templates/descripcion.tpl',
      1 => 1485260826,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_588751beced2e5_59958391 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <title>Descripcion de productos</title>
        <link href="./../vista/css/dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="contenedor">
            <div id="encabezado">
                <h1><?php echo $_smarty_tpl->tpl_vars['producto']->value->getNombre_corto();?>
</h1>
                Codigo: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getCodigo();?>

            </div>

            <h3>Caracteristicas</h3>
            <p>Procesador: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getProcesador();?>
</p>
            <p>RAM: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getRAM();?>
</p>
            <p>Tarjeta grafica: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getGrafica();?>
</p>
            <p>Unidad optica: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getOptica();?>
</p>
            <p>Sistema Operativo: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getSO();?>
</p>
            <p>Otros: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getOtros();?>
</p>
            <p>PVP: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
</p>
            <h3>Descripcion</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['producto']->value->getDescripcion();?>
</p>
            <form action="productos.php" method="post" >
                <input type="submit" name="submit" value="Volver" />
            </form>
        </div>
    </body>
</html><?php }
}
