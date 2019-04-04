
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <?php 
require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';

$reservas = new Reservas($pdo);
$carros = new carros($pdo);

if (!empty($_POST['carro'])) {

	$carro = addslashes($_POST['carro']);
	$data_inicio = explode('/', addslashes($_POST['data_inicio']));
	$data_fim = explode('/', addslashes($_POST['data_fim']));
	$pessoa = addslashes($_POST['pessoa']);

	$data_inicio = $data_inicio[2].'-'.$data_inicio[1].'-'.$data_inicio[0];
	$data_fim = $data_fim[2].'-'.$data_fim[1].'-'.$data_fim[0];

	if ($reservas->verificarDisponibilidade($carro, $data_inicio, $data_fim)) {
		$reservas->reservar($carro, $data_inicio, $data_fim, $pessoa);
		header("Location: index.php");
		exit;
	}else{
		echo "<center><p class='alert alert-danger'>Este carro já está reservado nesse período.<p></center>";
	}

}
?>

    <title>Adicionar Reservas</title>
  </head>
  <body>
  	<div class="container ">
  		<div class="col-md-10">
  			
  		
	    	<h1>Adicionar Reserva</h1><br>
	    	<form method="POST" class="form-group">
	    		<label>Carro:</label>
	    		<select name=" carro" class="form-control">
	    			<?php 
	    			$lista = $carros->getCarros();

	    			foreach ($lista as $carro):
	    			?>
	    			<option 
	    				value="<?php echo $carro['id']; ?>"><?php echo $carro['nome']; ?></option>
	    			<?php
	    			endforeach;
	    			?>
	    		</select>
	    		<br>
	    		<label>Nome da pessoa:</label>
	    		<input type="text" name="pessoa" class="form-control">
	    			<br>
	    		<label>Data de inicio:</label>
	    		<input type="text" name="data_inicio"class="form-control">
	    			<br>
	    		<label>Data de fim:</label>
	    		<input type="text" name="data_fim" class="form-control">
	    			
	    			<br>

	    		<input type="submit" value="Reservar" class="btn btn-primary">
	    	</form>
    	</div>
  		
  	</div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>