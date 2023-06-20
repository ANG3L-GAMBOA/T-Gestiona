<?php
    // Conexión a MySQL con PDO
    class Conexion {
        // Atributos para la conexión
        private $base = 'bd_ventas';
        private $servidor = 'localhost';
        private $usuario = 'root';
        private $psw = '';

        public function Conectar() {
            try {
                $cnx = new PDO("mysql:host=$this->servidor; dbname=$this->base;",
                                $this->usuario, $this->psw);
                
                $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $cnx;
            } catch (PDOException $ex) {
                echo 'Hubo un error al conectar a la BD'.$ex->getMessage();
            }
        }
    }


