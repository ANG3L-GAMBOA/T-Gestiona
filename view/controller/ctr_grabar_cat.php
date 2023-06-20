<?php
    include "../layout/cargar_clases.php";

    $categoria = new Categoria();

    if (isset($_POST["btngrabar"])) {
        // print_r($_POST);
        $m_cat = new M_Categoria();

        $m_cat->codigo_categoria = $_POST["txtcodigo"];
        $m_cat->categoria = $_POST["txtcategoria"];

        $tipo = $_POST["txttipo"];

        if ($tipo == "r")
            $categoria->RegistrarCategoria($m_cat);
        elseif ($tipo == "e")
            $categoria->EditarCategoria($m_cat);

        header("location: ../page/listar_categoria.php");
    }