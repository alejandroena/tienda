{$codJS}
<!DOCTYPE html>
{*Platilla para visualizar los productos, se invoca desde productos.php*}
<html>
    <head>
        <title>práctica de tienda página de productos </title>
        <meta charset="UTF-8">
        <link href="./../vista/css/dwes.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
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
        </script>
    </head>
    <body class="pagproductos">
        <div id="encabezado">
       <h1>Bienvenido a esta página {$usuario}</h1>
        </div>
       {include file="cesta.tpl"}
       {include file="listadoProductos.tpl"}
        <br class="divisor" />
          <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario {$usuario}'/>
            </form>        
          </div>
        </div>
    </body>
</html>