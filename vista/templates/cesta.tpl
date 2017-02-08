<div class="pagcesta" id="cesta">
    <img src="./../vista/css/imagenes/cesta.jpg" /><br />
    <h3>Cesta</h3>
    <div id="productos">
        <div id="cestaProductos">
        {if $cesta==null}
            Cesta vacia
        {else}
        <div id="listado">
        <table> 
        {foreach name=outer item=producto from=$cesta}
            <tr>
                <td width="280">
                    <span class="nombre">{$producto->getNombre_corto()}</span>
                    <button type="button" style="width:20px; height:25px" onclick="borrar('$producto->getCodigo()')">
                        <img src="./../vista/css/imagenes/borrar.jpg" /></button>
                </td>
                <td>{$cantidad[$producto->getCodigo()]}</td>
            </tr>
        {/foreach}
        </table>
        {/if}
        <br />
        <span class="precio">Total: {$coste}€</span>
        </div>
        </div>
        <button type="button" onclick="vaciar()" >Vaciar</button>
        <button type="button" onclick="window.location.href='./pagar.php'" >Pagar</button>
        
    </div>
</div>
