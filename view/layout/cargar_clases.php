<?php
    spl_autoload_register("CargarClases");
    
    function CargarClases($clase) {
        $ruta = "../../model/";

        $ruta_completa = $ruta.strtolower($clase).".php";

        include_once $ruta_completa;
    }