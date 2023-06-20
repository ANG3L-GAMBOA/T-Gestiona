<?php
    include "../layout/cargar_clases.php";

    $categoria = new Categoria();

    if (isset($_GET["cod_cat"])) {
        $cod_cat = $_GET["cod_cat"];

        $categoria->BorrarCategoria($cod_cat);

        header("location: ../page/listar_categoria.php");
    }