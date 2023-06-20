<?php
    include "../layout/cargar_clases.php";

    $producto = new Producto();

    if (isset($_GET["cod_prod"])) {
        $cod_prod = $_GET["cod_prod"];

        $producto->BorrarProducto($cod_prod);

        header("location: ../page/listar_producto.php");
    }