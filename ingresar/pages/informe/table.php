


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
                  <h4 class="card-title">Festion de residuos</h4>

                  <form class="forms-sample" action="insertar.php" method="post">
                    <div class="form-group">
                      <label >Tipo de residuos</label>
                      <select id="proceso" class="form-control" name="proceso">
                      <option value="1">mezclados</option>
                      <option value="2">clasificables</option>
                      <option value="3">otros</option>

                      </select>
                    </div>
                    <div class="form-group" id="sub_pro">

                    </div>
                    <div class="form-group">
                      <label >Lugar de produccion</label>
                      <select id="aspecto" class="js-example-basic-single w-100" name="aspecto" >
                      <option value="1">lugar a</option>
                      <option value="2">lugar b</option>
                      <option value="3">lugar c</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="sub_c">almacenamiento</label>
                      <input name="impacto" id="impacto" class="" >

                    </div>

                    <div class="form-group">
                      <label for="sub_c">Retiro</label>
                      <input name="impacto" id="impacto" class="" >

                    </div>
                    

                    <button href="#" class="btn btn-primary mr-2">Submit</button>
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
