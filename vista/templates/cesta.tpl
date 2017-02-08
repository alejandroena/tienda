<div class="pagcesta" id="cesta">
    <div id="tituloCesta">
    <img src="./../vista/css/imagenes/cesta.jpg" /><br />
    <h3>Cesta</h3>
    </div>
    <div id="productos">
        <div id="cestaProductos">
        {if $cesta==null}
            Cesta vacia
        {else}
        <div id="listado">
        <table border="1"> 
        {foreach name=outer item=producto from=$cesta}
            <tr>
                <td width="280">
                    <span class="nombre">{$producto->getNombre_corto()}</span>
                    <button type="button" style="background-image: url('./../vista/css/imagenes/borrar.png');" onclick="borrar('$producto->getCodigo()')"></button>
                </td>
                <td>{$cantidad[$producto->getCodigo()]}</td>
            </tr>
        {/foreach}
        </table>
        {/if}
        <br />
        </div>
        <span class="precio">Total: {$coste}€</span>
        </div>
        <div id="botonesCesta">
        <button type="button" onclick="vaciar()" >Vaciar</button>
        <button type="button" onclick="window.location.href='./pagar.php'" >Pagar</button>
        </div>
    </div>
</div>
