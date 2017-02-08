<div id="productos">
    <div class="nombre">
    {foreach from=$productos item=producto}
        <div id="ajaxProductos">
            <button type="button" onclick="add('{$producto->getCodigo()}')" >Añadir</button>
            {if $producto->getFamilia()=="ORDENA"}
                <a href="./descripcion.php?codigo={$producto->getCodigo()}">
                    {$producto->getNombre_corto()}: {$producto->getPVP()} euros.
                    </a><br />
            {else}
                {$producto->getNombre_corto()}: {$producto->getPVP()} euros.<br />
            {/if}
        </div>
    {/foreach}
    </div>
</div>

