<?php
    include "../layout/cargar_clases.php";

    $marca = new Marca();

    if (isset($_POST["btngrabar"])) {
        // print_r($_POST);
        $m_marc = new M_Marca();

        $m_marc->codigo_marca = $_POST["txtcodigo"];
        $m_marc->marca = $_POST["txtmarca"];

        $tipo = $_POST["txttipo"];

        if ($tipo == "r")
            $marca->RegistrarMarca($m_marc);
        elseif ($tipo == "e")
            $marca->EditarMarca($m_marc);

        header("location: ../page/listar_marca.php");
    }