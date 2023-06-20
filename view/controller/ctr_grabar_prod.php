<?php
    include "../layout/cargar_clases.php";

    $producto = new Producto();

    if (isset($_POST["btngrabar"])) {
        // print_r($_POST);
        $m_prod = new M_Producto();

        $m_prod->codigo_producto = $_POST["txtcodigo"];
        $m_prod->producto = $_POST["txtproducto"];
        $m_prod->stock_disponible = $_POST["txtstock"];
        $m_prod->costo = $_POST["txtcosto"];
        $m_prod->ganancia = $_POST["txtganancia"];
        $m_prod->producto_codigo_marca = $_POST["cbomarca"];
        $m_prod->producto_codigo_categoria = $_POST["cbocategoria"];

        $tipo = $_POST["txttipo"];

        if ($tipo == "r")
            $producto->RegistrarProducto($m_prod);
        elseif ($tipo == "e")
            $producto->EditarProducto($m_prod);

        header("location: ../page/listar_producto.php");
    }