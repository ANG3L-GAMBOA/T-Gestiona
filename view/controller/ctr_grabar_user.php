<?php
    include "../layout/cargar_clases.php";

    $usuario = new Usuario();

    if (isset($_POST["btngrabar"])) {
        // print_r($_POST);
        $m_user = new M_Usuario();

        $m_user->codigo_usuario = $_POST["txtcodigo"];
        $m_user->username = $_POST["txtusername"];
        $m_user->contra = $_POST["txtcontra"];
        $m_user->nombre_completo = $_POST["txtnombre"];

        $tipo = $_POST["txttipo"];

        if ($tipo == "r")
            $usuario->RegistrarUsuario($m_user);
        elseif ($tipo == "e")
            $usuario->EditarUsuario($m_user);

        header("location: ../page/listar_cliente.php");
    }