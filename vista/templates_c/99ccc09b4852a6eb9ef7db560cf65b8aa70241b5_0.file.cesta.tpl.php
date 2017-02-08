<?php
/* Smarty version 3.1.30, created on 2017-02-08 10:12:24
  from "/var/www/tienda/vista/templates/cesta.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589ae0f803a8c1_11027072',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99ccc09b4852a6eb9ef7db560cf65b8aa70241b5' => 
    array (
      0 => '/var/www/tienda/vista/templates/cesta.tpl',
      1 => 1486545141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589ae0f803a8c1_11027072 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="pagcesta" id="cesta">
    <div id="tituloCesta">
    <img src="./../vista/css/imagenes/cesta.jpg" /><br />
    <h3>Cesta</h3>
    </div>
    <div id="productos">
        <div id="cestaProductos">
        <?php if ($_smarty_tpl->tpl_vars['cesta']->value == null) {?>
            Cesta vacia
        <?php } else { ?>
        <div id="listado">
        <table border="1"> 
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cesta']->value, 'producto', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
            <tr>
                <td width="280">
                    <span class="nombre"><?php echo $_smarty_tpl->tpl_vars['producto']->value->getNombre_corto();?>
</span>
                    <button type="button" style="background-image: url('./../vista/css/imagenes/borrar.png');" onclick="borrar('$producto->getCodigo()')"></button>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['cantidad']->value[$_smarty_tpl->tpl_vars['producto']->value->getCodigo()];?>
</td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>
        <?php }?>
        <br />
        </div>
        <span class="precio">Total: <?php echo $_smarty_tpl->tpl_vars['coste']->value;?>
€</span>
        </div>
        <div id="botonesCesta">
        <button type="button" onclick="vaciar()" >Vaciar</button>
        <button type="button" onclick="window.location.href='./pagar.php'" >Pagar</button>
        </div>
    </div>
</div>
<?php }
}
