<?php
/* Smarty version 3.1.30, created on 2017-02-09 12:05:36
  from "/var/www/tienda/vista/templates/pagar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589c4d007642a9_56675727',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a51c67a6874b235f4387b93654428545696a512' => 
    array (
      0 => '/var/www/tienda/vista/templates/pagar.tpl',
      1 => 1486638307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589c4d007642a9_56675727 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <title>Pagar</title>
        <link href="./../vista/css/dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="encabezado">
        <h1>Factura</h1>
        </div>
        <div class="pagproductos">
            <div id="productos">
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="business" value="jandroena-facilitator@gmail.com">
                    <input type="hidden" name="cmd" value="_cart">
                    <input name="upload" type="hidden" value="1" />
                <table border="1">
                <tr><th>Nombre</th><th>Cantidad</th><th>Precio</th></tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cesta']->value, 'producto', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->getNombre_corto();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['cantidad']->value[$_smarty_tpl->tpl_vars['producto']->value->getCodigo()];?>
</td>
                        <td><?php echo round(($_smarty_tpl->tpl_vars['producto']->value->getPVP()/1.21)*$_smarty_tpl->tpl_vars['cantidad']->value[$_smarty_tpl->tpl_vars['producto']->value->getCodigo()],2);?>
€</td>
                    </tr>
                    <input name="item_number_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['producto']->value->getCodigo();?>
" />
                    <input name="item_name_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['producto']->value->getNombre_corto();?>
" />
                    <input name="amount_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
" />
                    <input name="quantity_<?php echo $_smarty_tpl->tpl_vars['n']->value++;?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['cantidad']->value[$_smarty_tpl->tpl_vars['producto']->value->getCodigo()];?>
" />
             <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </table>
                <hr />
                <span>IVA(21%):<?php echo round($_smarty_tpl->tpl_vars['coste']->value*0.21,2);?>
€ <br />Total: <?php echo $_smarty_tpl->tpl_vars['coste']->value;?>
€</span>
                <hr />

                <input name="shopping_url" type="hidden" value="http://alejandro.infenlaces.com/tienda/controlador/pagar.php" />
                <input name="currency_code" type="hidden" value="EUR" />
                <input name="return" type="hidden" value="http://alejandro.infenlaces.com/tienda/controlador/pago_realizado.php" />
                <input name="notify_url" type="hidden" value="http://alejandro.infenlaces.com/tienda/controlador/paypal_ipn.php" />
                <input name="rm" type="hidden" value="2" />
                <input type="image" src="http://www.paypal.com/es_ES/i/btn/x-click-but01.gif" border="0" name="submit" alt="Realice pagos con PayPal: es rápido, gratis y seguro">
                </form>
                <button type="button" onclick="window.location.href='./../modelo/generarPDF.php'" >Imprimir factura</button>
                <button type="button" onclick="window.location.href='./productos.php'" >Seguir comprando</button>
            </div>
        </div>
    </body>
</html><?php }
}
