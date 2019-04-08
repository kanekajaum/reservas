<?php 

// echo "Primeiro dia: ".$dia1;
// echo "<br>Total dia: ".$dias;
// echo "<br>Linhas: ".$linhas;
// echo "<br>Data inicio: ".$data_inicio;
// echo "<br>Data final: ".$data_fim."<br><br>";


?>
<br>
<form method="GET">

	<div class="col-md-6 " style="float: left;">
		
		
		<label>
			Mês:
		</label><br>
		<select name="mes" class="form-control">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		</select><br>

	</div>

	<div class="col-md-6 " style="float: left;">
		<label>
			Ano:
		</label><br>
		<select name="ano" class="form-control">
			<?php  
			for ($i=date('Y'); $i >= 2010 ; $i--) :
			?>
			<option><?php echo $i; ?></option>
			<?php
			endfor;
			?>
		</select>
	</div>
	<br>
	<input class="btn btn-primary form-control" type="submit" value="Consultar">
</form><br>


	<center>
		<p class="bg-dark text-white">
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
		</p>
	</center>
<table border="1" width="100%" class="table table-striped ">

		<thead class="thead-dark">
			<tr>
			<th>Dom</th>
			<th>Seg</th>
			<th>Ter</th>
			<th>Qua</th>
			<th>Qui</th>
			<th>Sex</th>
			<th>Sab</th>
			</tr>
		</thead>
		<tbody>
			<?php for($l = 0; $l <$linhas; $l++):?>
				<tr>
					<?php for($q = 0; $q < 7; $q++):?>
					<?php  
						$t = strtotime(($q+($l*7)).' days', strtotime($data_inicio));
						$w = date('Y-m-d', strtotime(($q+($l*7)).'days', strtotime($data_inicio)));
					?>
					<td>
						
						<?php 
						echo date('d', $t)."<br/><br/>";
						$w = strtotime($w);
						foreach ($lista as $item) {
							$dr_inicio = strtotime($item['data_inicio']);
							$dr_fim = strtotime($item['data_fim']); 
							

							if($w >= $dr_inicio && $w <= $dr_fim){
								echo utf8_encode('<span class="badge badge-secondary" >'.$item['pessoa'].': (carro: '.$item['id_carro'].')'.'</span>');
							}


						}
							
						?>
						
					</td>
					<?php endfor;?>
				</tr>
			<?php endfor;?>
		</tbody>
		
</table>