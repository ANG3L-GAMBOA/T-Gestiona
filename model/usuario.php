<?php

    class Usuario extends Conexion {
        // Listar Usuario
        public function ListarUsuario() {
            // Definir un arreglo vacío
            $arr_user = null;

            $cn = $this->Conectar();

            $sql = 'call sp_listar_usuario()';

            $sentencia = $cn->prepare($sql);

            $sentencia->execute();

            $arr_user = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $cn = null;

            return $arr_user;
        }

        // Buscar Marca por Código
        public function BuscarUsuarioPorCodigo($cod_user) {
            // Definir un arreglo vacío
            $arr_user = null;

            $cn = $this->Conectar();

            $sql = 'call sp_buscar_usuario_por_codigo(:cod_user)';

            $sentencia = $cn->prepare($sql);

            $sentencia->bindParam(":cod_user", $cod_user);

            $sentencia->execute();

            $arr_user = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $cn = null;

            return $arr_user;
        }

        // Registrar Marca
        public function RegistrarUsuario(M_Usuario $user) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_registrar_usuario(:usern, :pswd, :nom)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":usern", $user->username);
                $sentencia->bindParam(":pswd", $user->contra);
                $sentencia->bindParam(":nom", $user->nombre_completo);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }

        // Editar Producto
        public function EditarUsuario(M_Usuario $user) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_editar_usuario(:cod, :usern, :pswd, :nom)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":cod", $user->codigo_usuario);
                $sentencia->bindParam(":usern", $user->username);
                $sentencia->bindParam(":pswd", $user->contra);
                $sentencia->bindParam(":nom", $user->nombre_completo);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }

        // Borrar Marca
        public function BorrarUsuario($cod_user) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_borrar_usuario(:cod_user)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":cod_user", $cod_user);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
    }