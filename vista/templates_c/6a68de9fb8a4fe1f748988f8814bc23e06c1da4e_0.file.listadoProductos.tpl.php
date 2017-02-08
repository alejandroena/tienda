<?php
/* Smarty version 3.1.30, created on 2017-02-03 13:07:00
  from "/var/www/tienda/vista/templates/listadoProductos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58947264ed3bf9_08024720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a68de9fb8a4fe1f748988f8814bc23e06c1da4e' => 
    array (
      0 => '/var/www/tienda/vista/templates/listadoProductos.tpl',
      1 => 1486123613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58947264ed3bf9_08024720 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="productos">
    <div class="nombre">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
        <div id="ajaxProductos">
            <button type="button" onclick="add('<?php echo $_smarty_tpl->tpl_vars['producto']->value->getCodigo();?>
')" >Añadir</button>
            <?php if ($_smarty_tpl->tpl_vars['producto']->value->getFamilia() == "ORDENA") {?>
                <a href="./descripcion.php?codigo=<?php echo $_smarty_tpl->tpl_vars['producto']->value->getCodigo();?>
">
                    <?php echo $_smarty_tpl->tpl_vars['producto']->value->getNombre_corto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.
                    </a><br />
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['producto']->value->getNombre_corto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.<br />
            <?php }?>
        </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>
</div>

<?php }
}
