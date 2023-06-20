<?php

    class Producto extends Conexion {
        // Listar Producto
        public function ListarProducto() {
            // Definir un arreglo vacío
            $arr_prod = null;

            $cn = $this->Conectar();

            $sql = 'call sp_listar_producto()';

            $sentencia = $cn->prepare($sql);

            $sentencia->execute();

            $arr_prod = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $cn = null;

            return $arr_prod;
        }

        // Buscar Producto por Código
        public function BuscarProductoPorCodigo($cod_prod) {
            // Definir un arreglo vacío
            $arr_prod = null;

            $cn = $this->Conectar();

            $sql = 'call sp_buscar_producto_por_codigo(:cod_prod)';

            $sentencia = $cn->prepare($sql);

            $sentencia->bindParam(":cod_prod", $cod_prod);

            $sentencia->execute();

            $arr_prod = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $cn = null;

            return $arr_prod;
        }

        // Registrar Producto
        public function RegistrarProducto(M_Producto $prod) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_registrar_producto(:cod_prod, :prod, :stk, :cst, :gnc, :cod_mar, :cod_cat)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":cod_prod", $prod->codigo_producto);
                $sentencia->bindParam(":prod", $prod->producto);
                $sentencia->bindParam(":stk", $prod->stock_disponible);
                $sentencia->bindParam(":cst", $prod->costo);
                $sentencia->bindParam(":gnc", $prod->ganancia);
                $sentencia->bindParam(":cod_mar", $prod->producto_codigo_marca);
                $sentencia->bindParam(":cod_cat", $prod->producto_codigo_categoria);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }

        // Editar Producto
        public function EditarProducto(M_Producto $prod) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_editar_producto(:cod_prod, :prod, :stk, :cst, :gnc, :cod_mar, :cod_cat)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":cod_prod", $prod->codigo_producto);
                $sentencia->bindParam(":prod", $prod->producto);
                $sentencia->bindParam(":stk", $prod->stock_disponible);
                $sentencia->bindParam(":cst", $prod->costo);
                $sentencia->bindParam(":gnc", $prod->ganancia);
                $sentencia->bindParam(":cod_mar", $prod->producto_codigo_marca);
                $sentencia->bindParam(":cod_cat", $prod->producto_codigo_categoria);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }

        // Borrar Producto
        public function BorrarProducto($cod_prod) {
            try {
                $cn = $this->Conectar();

                $sql = 'call sp_borrar_producto(:cod_prod)';

                $sentencia = $cn->prepare($sql);

                $sentencia->bindParam(":cod_prod", $cod_prod);

                $sentencia->execute();

                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
    }