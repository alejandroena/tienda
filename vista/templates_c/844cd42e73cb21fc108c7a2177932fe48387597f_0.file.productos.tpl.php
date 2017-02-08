<?php
/* Smarty version 3.1.30, created on 2017-02-07 13:10:36
  from "/var/www/tienda/vista/templates/productos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5899b93cb19b13_02631647',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '844cd42e73cb21fc108c7a2177932fe48387597f' => 
    array (
      0 => '/var/www/tienda/vista/templates/productos.tpl',
      1 => 1486469434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cesta.tpl' => 1,
    'file:listadoProductos.tpl' => 1,
  ),
),false)) {
function content_5899b93cb19b13_02631647 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['codJS']->value;?>

<!DOCTYPE html>

<html>
    <head>
        <title>práctica de tienda página de productos </title>
        <meta charset="UTF-8">
        <link href="./../vista/css/dwes.css" rel="stylesheet" type="text/css">
        <?php echo '<script'; ?>
 type="text/javascript">
            function add(producto){                
                xajax_add(producto);
                return false;
            }
            
            function borrar(producto){
                xajax_borrar(producto);
                return false;
            }
            
            function vaciar(){
                xajax_vaciar();
                return false;
            }
        <?php echo '</script'; ?>
>
    </head>
    <body class="pagproductos">
        <div id="encabezado">
       <h1>Bienvenido a esta página <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</h1>
        </div>
       <?php $_smarty_tpl->_subTemplateRender("file:cesta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

       <?php $_smarty_tpl->_subTemplateRender("file:listadoProductos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <br class="divisor" />
          <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
            </form>        
          </div>
        </div>
    </body>
</html><?php }
}
