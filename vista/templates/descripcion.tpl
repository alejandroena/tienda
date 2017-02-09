<html>
    <head>
        <title>Descripcion de productos</title>
        <link href="./../vista/css/dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="contenedor">
            <div id="encabezado">
                <h1>{$producto->getNombre_corto()}</h1><br />
                
            </div>
                <h2>Codigo: {$producto->getCodigo()}</h2>
            <h3>Caracteristicas</h3>
            <p>Procesador: {$ordenador->getProcesador()}</p>
            <p>RAM: {$ordenador->getRAM()}</p>
            <p>Tarjeta grafica: {$ordenador->getGrafica()}</p>
            <p>Unidad optica: {$ordenador->getOptica()}</p>
            <p>Sistema Operativo: {$ordenador->getSO()}</p>
            <p>Otros: {$ordenador->getOtros()}</p>
            <p>PVP: {$producto->getPVP()}</p>
            <h3>Descripcion</h3>
            <p>{$producto->getDescripcion()}</p>
            <form action="productos.php" method="post" >
                <input type="submit" name="submit" value="Volver" />
            </form>
        </div>
    </body>
</html>