<?php 
require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';

$reservas = new Reservas($pdo);
$carros = new carros($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Sistema de reservas</title>
  </head>
  <body>
    
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="">
        <img src="/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Home
      </a>
    </nav>

  	<!-- <div class="container"><br> -->
      <div class="col-md-3 border-right" style="float: left;">
        
  		<?php 

      if (empty($_GET['mes'])) {
  
        }
        $data = $_GET['ano'].'-'.$_GET['mes'];
        $dia1 = date('w',strtotime($data));
        $dias = date('t',strtotime($data));
        $linhas = ceil(($dia1+$dias) / 7);
        $dia1 = -$dia1;
        $data_inicio = date('Y-m-d', strtotime($dia1.' days', strtotime($data)));
        $data_fim = date('Y-m-d', strtotime(( ($dia1 + ($linhas * 7) - 1) ).' days', strtotime($data)));


    	$lista = $reservas->getReservas($data_inicio, $data_fim);
    	$numero = $reservas->getCountReservas();
    	?>
      <br>
    	<h4>Reservas do 
        <?php   
      switch ($_GET['mes']) {
        case '1':
          echo "Janeiro"; 
          break;
        case '2':
          echo "Fevereiro"; 
        break;
        case '3':
          echo "Março"; 
        break;
        case '4':
          echo "Abril"; 
        break;
        case '5':
          echo "Maio"; 
        break;
        case '6':
          echo 'Junho'; 
        break;
        case '7':
          echo "Julho"; 
        break;
        case '8':
          echo "Agosto"; 
        break;
        case '9':
          echo "Setembro"; 
        break;
        case '10':
          echo "Outubro"; 
        break;
        case '11':
          echo "Novembro"; 
        break;
        case '12':
          echo "Dezembro"; 
        break;

        default:
          # code...
          break;
      }
    ?>
      </h4><br>

    		<a class="btn btn-primary" href="reservar.php">Adicionar Reservas</a>
    		<br><br><br>
    	<?php
    	
    	foreach ($lista as $item) {
    		$data1 = date('d/m/Y', strtotime($item['data_inicio']));
    		$data2 = date('d/m/Y', strtotime($item['data_fim']));


    		echo "<p>".utf8_encode($item['pessoa'])." reservou o  carro ".$item['id_carro']." entre ".$data1." a ".$data2."</p><hr>";
    	}
    	?>
      </div>
      <div class="col-md-9" style="float: right;">
        <?php 
        require 'calendario.php';
        ?>
      </div>
  		
  	<!-- </div> -->





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>