<!DOCTYPE html>
<html lang="es">
    <?php
      $ruta = "../..";
      $titulo = "Aplicación Ventas - Editar Producto";
      include("../layout/cabecera.php");
    ?>
    <head>
    <link href="../../css/form.css" rel="stylesheet" media="all">
    <link href="../../css/select2.min.css" rel="stylesheet" media="all">
    </head>
    <body>
        <?php
          include "../layout/cargar_clases.php";

          if (isset($_GET["cod_prod"])) {
            $cod_prod = $_GET["cod_prod"];

            $producto = new Producto();
            $rs_prod = $producto->BuscarProductoPorCodigo($cod_prod)[0];

            if (!empty($rs_prod)) {

                $marca = new Marca();
                $rs_mar = $marca->ListarMarca();

                $categoria = new Categoria();
                $rs_cat = $categoria->ListarCategoria();
            } else {
                header("location: listar_producto.php");
            }
          } else {
            header("location: listar_producto.php");
          }
        ?>
        <div class="container mt-3">
              <article>
                <div class="row justify-content-md-center">
                <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
                    <div class="wrapper wrapper--w680">
                        <div class="card card-4">
                            <div class="card-body">
                                <h2 class="title">Editar Producto</h2>
                                <form method="POST" action="../controller/ctr_grabar_prod.php">
                                <input type="hidden" id="txttipo" name="txttipo" value="e" />
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <div class="input-group">
                                                <label for="txtcodigo" class="label">Código</label>
                                                <input class="input--style-4" type="text" id="txtcodigo" name="txtcodigo" placeholder="Código" value="<?=$rs_prod->codigo_producto?>" readonly maxlength="5">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-group">
                                                <label for="txtproducto" class="label">Producto</label>
                                                <input class="input--style-4" type="text" id="txtproducto" name="txtproducto" placeholder="Producto" value="<?=$rs_prod->producto?>" maxlength="40">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <div class="input-group">
                                                <label for="txtstock" class="label">Stock Disponible</label>
                                                <input class="input--style-4" type="number" id="txtstock" name="txtstock" placeholder="Stock" value="<?=$rs_prod->stock_disponible?>" maxlength="5">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-group">
                                                <label for="txtcosto" class="label">Costo</label>
                                                <input class="input--style-4" type="text" id="txtcosto" name="txtcosto" placeholder="Costo" value="<?=$rs_prod->costo?>" maxlength="8">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <div class="input-group">
                                                <label for="txtganancia" class="label">Ganancia</label>
                                                <input class="input--style-4" type="text" id="txtganancia" name="txtganancia" placeholder="Ganancia" value="<?=$rs_prod->ganancia?>" maxlength="5">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-group">
                                            <div class="mb-2 col-12">
                                            <label class="label">Marca</label>
                                                <select class="form-select input--style-4" id="cbomarca" name="cbomarca">
                                                <option value="">Seleccione marca</option>
                                                <?php
                                                    foreach($rs_mar as $mar) { 
                                                    if($mar->codigo_marca == $rs_prod->producto_codigo_marca){
                                                ?>
                                                        <option selected="selected" value="<?=$mar->codigo_marca?>"><?=$mar->marca?></option>
                                                <?php
                                                    }
                                                        else {
                                                            ?>
                                                            <option value="<?=$mar->codigo_marca?>"><?=$mar->marca?></option>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                    </div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="mb-3 col-12">
                                        <label class="label">Categoría</label>
                                            <select class="form-select input--style-4" id="cbocategoria" name="cbocategoria">
                                                <option value="">Seleccione categoría</option>
                                                <?php
                                                    foreach($rs_cat as $cat) { 
                                                    if($cat->codigo_categoria == $rs_prod->producto_codigo_categoria){
                                                ?>
                                                        <option selected="selected" value="<?=$cat->codigo_categoria?>"><?=$cat->categoria?></option>
                                                <?php
                                                    }
                                                        else {
                                                            ?>
                                                            <option value="<?=$cat->codigo_categoria?>"><?=$cat->categoria?></option>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="p-t-15">
                                        <a href="listar_producto.php" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Regresar</a>
                                        <button id="btngrabar" name="btngrabar" class="btn btn--radius-2 btn-success" type="submit"><i class="fas fa-check"></i> Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </article>
            </section>
        </div>
    </body>
</html>