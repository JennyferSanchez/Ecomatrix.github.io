<?php
session_start();
global $document;
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login/login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$proy_id = $_SESSION["proy_id"];

include("../coneccion/coneccion.php");
$query = "SELECT s.id id, s.nombre nombre, s.img img FROM sector s INNER JOIN  sector_usu u ON s.id=u.sector  INNER JOIN proyecto p ON p.id= u.id_proy  WHERE p.id= $proy_id   ";
$result = mysqli_query($conn, $query);


$query2 = "SELECT id, nombre FROM aspectos ";
$result2 = mysqli_query($conn, $query2);

$query3 = "SELECT id, nombre FROM descripcion_im ";
$result3 = mysqli_query($conn, $query3);


?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EcoMatrix</title>
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">

  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../../../img/logo_eco.ico" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

</head>
 <?php
 include "../nav/nav2.php";
 ?>
 <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Evaluar</h4>
                  <p class="card-description">
                    Evalua los impactos de tu proyecto
                  </p>
                  <form class="forms-sample" action="insertar.php" method="post">
                    <div class="form-group">
                      <label >Proceso</label>
                      <select id="proceso" class="form-control" name="proceso">
                        <?php
                          while ($row = mysqli_fetch_assoc($result)) {
                              echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group" id="sub_pro">

                    </div>
                    <div class="form-group">
                      <label >Aspecto</label>
                      <select id="aspecto" class="js-example-basic-single w-100" name="aspecto" >
                        <?php
                          while ($row = mysqli_fetch_assoc($result2)) {
                              echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="sub_c">Descripcion impacto</label>
                      <select name="impacto" id="impacto" class="js-example-basic-single w-100" >
                        <?php
                          while ($row = mysqli_fetch_assoc($result3)) {
                              echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <fieldset>
                    <legend>Magnitud</legend>
                    <label for="sub_c">intensidad</label>
                    <div class="form-group row">
                        
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Intensidad" id="Intensidad1" value="1">
                              Baja
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Intensidad" id="Intensidad2" value="2">
                              Media
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Intensidad" id="Intensidad3" value="3">
                              Alta
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Intensidad" id="Intensidad4" value="4">
                              Muy Alta
                        </label>
                    </div>
                    </div>
                    </div>
                    <label for="sub_c">intencidad</label>
                    <div class="form-group row">
                        
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Afectacion" id="Afectacion1" value="1">
                              Baja
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Afectacion" id="Afectacion2" value="2">
                              Media
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Afectacion" id="Afectacion3" value="3">
                              Alta
                        </label>
                    </div>
                    </div>
                    </div>
                    </fieldset>

                    <fieldset>
                    <legend>Importancia</legend>
                    <label for="sub_c">Duracion</label>
                    <div class="form-group row">
                        
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Duracion" id="Duracion1" value="1">
                            Temporal
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Duracion" id="Duracion2" value="2">
                              Media
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Duracion" id="Duracion3" value="3">
                              Permanente
                        </label>
                    </div>
                    </div>
                    </div>
                    <label for="sub_c">Influencia</label>
                    <div class="form-group row">
                        
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Influencia" id="Influencia1" value="1">
                            Puntual
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Influencia" id="Influencia2" value="2">
                            Local
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Influencia" id="Influencia3" value="3">
                            Regional

                        </label>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="Influencia" id="Influencia4" value="3">
                            Nacional

                        </label>
                    </div>
                    </div>
                    </div>
                    </fieldset>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  
                </div>
              </div>
            </div>
        </div>
    </div>                      
   
<script type="text/javascript">
	$(document).ready(function(){
		$('#proceso').val(1);
		recargarLista();

		$('#proceso').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"obtener.php",
			data:"proceso=" + $('#proceso').val(),
			success:function(r){
				$('#sub_pro').html(r);
			}
		});
	}
</script>


<script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>

</body>

</html>
