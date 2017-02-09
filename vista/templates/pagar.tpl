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
                {foreach name=outer item=producto from=$cesta}
                    <tr>
                        <td>{$producto->getNombre_corto()}</td>
                        <td>{$cantidad[$producto->getCodigo()]}</td>
                        <td>{round(($producto->getPVP()/1.21)*$cantidad[$producto->getCodigo()],2)}€</td>
                    </tr>
                    <input name="item_number_{$n}" type="hidden" value="{$producto->getCodigo()}" />
                    <input name="item_name_{$n}" type="hidden" value="{$producto->getNombre_corto()}" />
                    <input name="amount_{$n}" type="hidden" value="{$producto->getPVP()}" />
                    <input name="quantity_{$n++}" type="hidden" value="{$cantidad[$producto->getCodigo()]}" />
             {/foreach}
                </table>
                <hr />
                <span>IVA(21%):{round($coste*0.21,2)}€ <br />Total: {$coste}€</span>
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
</html>