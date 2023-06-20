<?php

    class Categoria extends Conexion {
        // Listar Marca
        public function ListarCategoria() {
            // Definir un arreglo vacío
            $arr_cat = null;

            $cn = $this->Conectar();

            $sql = 'call sp_listar_categoria()';

            $sentencia = $cn->prepare($sql);

            $sentencia->execute();

            $arr_cat = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $cn = null;

            return $arr_cat;
        }

        // Buscar Marca por Código
        public function BuscarCategoriaPorCodigo($cod_cat) {
            // Definir un arreglo vacío
            $arr_cat = null;

            $cn = $this->Conectar();

            $sql = 'call sp_buscar_categoria_por_codigo(:cod_cat)';

            $sentencia = $cn->prepare($sql);

            $sentencia->bindParam(":cod_cat", $cod_cat);

            $sentencia->execute();

            $arr_cat = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $cn = null;

            return $arr_cat;
        }

        // Registrar Marca
        public function RegistrarCategoria(M_Categoria $cat) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_registrar_categoria(:cod_cat, :cat)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":cod_cat", $cat->codigo_categoria);
                $sentencia->bindParam(":cat", $cat->categoria);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }

        // Editar Producto
        public function EditarCategoria(M_Categoria $cat) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_editar_categoria(:cod_cat, :cat)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":cod_cat", $cat->codigo_categoria);
                $sentencia->bindParam(":cat", $cat->categoria);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }

        // Borrar Marca
        public function BorrarCategoria($cod_cat) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_borrar_categoria(:cod_cat)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":cod_cat", $cod_cat);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
    }