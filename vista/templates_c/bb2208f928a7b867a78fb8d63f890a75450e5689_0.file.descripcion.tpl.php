<?php
/* Smarty version 3.1.30, created on 2017-02-09 12:11:23
  from "/var/www/tienda/vista/templates/descripcion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589c4e5b5937f1_76853849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb2208f928a7b867a78fb8d63f890a75450e5689' => 
    array (
      0 => '/var/www/tienda/vista/templates/descripcion.tpl',
      1 => 1486638674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589c4e5b5937f1_76853849 (Smarty_Internal_Template $_smarty_tpl) {
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
</h1><br />
                
            </div>
                <h2>Codigo: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getCodigo();?>
</h2>
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
