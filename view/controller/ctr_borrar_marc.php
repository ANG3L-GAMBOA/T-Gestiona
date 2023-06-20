<?php
    include "../layout/cargar_clases.php";

    $marca = new Marca();

    if (isset($_GET["cod_mar"])) {
        $cod_marc = $_GET["cod_mar"];

        $marca->BorrarMarca($cod_marc);

        header("location: ../page/listar_marca.php");
    }