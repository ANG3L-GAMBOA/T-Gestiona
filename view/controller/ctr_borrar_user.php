<?php
    include "../layout/cargar_clases.php";

    $usuario = new Usuario();

    if (isset($_GET["cod_user"])) {
        $cod_user = $_GET["cod_user"];

        $usuario->BorrarUsuario($cod_user);

        header("location: ../page/listar_cliente.php");
    }