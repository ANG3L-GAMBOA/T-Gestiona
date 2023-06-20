<!DOCTYPE html>
<html lang="es">
    <?php
      $ruta = "../..";
      $titulo = "Aplicación Ventas - Editar Usuario Usuario";
      include("../layout/cabecera.php");
    ?>
    <head>
    <link href="../../css/form.css" rel="stylesheet" media="all">
    <link href="../../css/select2.min.css" rel="stylesheet" media="all">
    </head>
    <body>
    <?php
          include "../layout/cargar_clases.php";

          if (isset($_GET["cod_user"])) {
            $cod_user = $_GET["cod_user"];

            $usuario = new Usuario();
            $rs_user = $usuario->BuscarUsuarioPorCodigo($cod_user)[0];
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
                                <h2 class="title">Editar Usuario</h2>
                                <form method="POST" action="../controller/ctr_grabar_user.php">
                                <input type="hidden" id="txttipo" name="txttipo" value="e" />
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <div class="input-group">
                                                <label for="txtcodigo" class="label">Código</label>
                                                <input class="input--style-4" type="text" id="txtcodigo" name="txtcodigo" placeholder="Código" value="<?=$rs_user->codigo_usuario?>" maxlength="40" readonly>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                        <div class="input-group">
                                                <label for="txtusername" class="label">Username</label>
                                                <input class="input--style-4" type="text" id="txtusername" name="txtusername" placeholder="Username" value="<?=$rs_user->username?>" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="row row-space">
                                        <div class="col-2">
                                            <div class="input-group">
                                                <label for="txtcontra" class="label">Contraseña</label>
                                                <input class="input--style-4" type="password" id="txtcontra" name="txtcontra" placeholder="Contraseña" value="<?=$rs_user->contra?>" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                        <div class="input-group">
                                                <label for="txtnombre" class="label">Nombre Completo</label>
                                                <input class="input--style-4" type="text" id="txtnombre" name="txtnombre" placeholder="Nombre Completo" value="<?=$rs_user->nombre_completo?>" maxlength="40">
                                            </div>
                                        </div>
                                    <div class="p-t-15">
                                        <a href="listar_cliente.php" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Regresar</a>
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