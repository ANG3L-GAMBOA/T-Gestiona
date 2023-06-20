<?php

    class Marca extends Conexion {
        // Listar Marca
        public function ListarMarca() {
            // Definir un arreglo vacío
            $arr_mar = null;

            $cn = $this->Conectar();

            $sql = 'call sp_listar_marca()';

            $sentencia = $cn->prepare($sql);

            $sentencia->execute();

            $arr_mar = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $cn = null;

            return $arr_mar;
        }

        // Buscar Marca por Código
        public function BuscarMarcaPorCodigo($cod_mar) {
            // Definir un arreglo vacío
            $arr_mar = null;

            $cn = $this->Conectar();

            $sql = 'call sp_buscar_marca_por_codigo(:cod_mar)';

            $sentencia = $cn->prepare($sql);

            $sentencia->bindParam(":cod_mar", $cod_mar);

            $sentencia->execute();

            $arr_mar = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $cn = null;

            return $arr_mar;
        }

        // Registrar Marca
        public function RegistrarMarca(M_Marca $marc) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_registrar_marca(:cod_marc, :marc)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":cod_marc", $marc->codigo_marca);
                $sentencia->bindParam(":marc", $marc->marca);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }

        // Editar Producto
        public function EditarMarca(M_Marca $marc) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_editar_marca(:cod_marc, :marc)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":cod_marc", $marc->codigo_marca);
                $sentencia->bindParam(":marc", $marc->marca);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }

        // Borrar Marca
        public function BorrarMarca($cod_marc) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_borrar_marca(:cod_marc)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":cod_marc", $cod_marc);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
    }