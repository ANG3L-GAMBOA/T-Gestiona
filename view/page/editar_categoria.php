<!DOCTYPE html>
<html lang="es">
    <?php
      $ruta = "../..";
      $titulo = "Aplicación Ventas - Editar Categoria";
      include("../layout/cabecera.php");
    ?>
    <head>
    <link href="../../css/form.css" rel="stylesheet" media="all">
    <link href="../../css/select2.min.css" rel="stylesheet" media="all">
    </head>
    <body>
        <?php
          include "../layout/cargar_clases.php";

          if (isset($_GET["cod_cat"])) {
            $cod_cat = $_GET["cod_cat"];

            $categoria = new Categoria();
            $rs_cat = $categoria->BuscarCategoriaPorCodigo($cod_cat)[0];
          } 
          else {
            header("location: listar_categoria.php");
          }
        ?>
        <div class="container mt-3">
              <article>
                <div class="row justify-content-md-center">
                    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
                    <div class="wrapper wrapper--w680">
                        <div class="card card-4">
                            <div class="card-body">
                                <h2 class="title">Editar Categoria</h2>
                                <form method="POST" action="../controller/ctr_grabar_cat.php">
                                <input type="hidden" id="txttipo" name="txttipo" value="e" />
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <div class="input-group">
                                                <label for="txtcodigo" class="label">Código</label>
                                                <input class="input--style-4" type="text" id="txtcodigo" name="txtcodigo" placeholder="Código" value="<?=$rs_cat->codigo_categoria?>" readonly maxlength="5">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-group">
                                                <label for="txtcategoria" class="label">Categoria</label>
                                                <input class="input--style-4" type="text" id="txtcategoria" name="txtcategoria" placeholder="Categoria" value="<?=$rs_cat->categoria?>" maxlength="40">
                                            </div>
                                        </div>
                                    <div class="p-t-15">
                                        <a href="listar_marca.php" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Regresar</a>
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