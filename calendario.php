<?php 

$data = '2019-01';
$dia1 = date('w',strtotime($data));
$dias = date('t',strtotime($data));
$linhas = ceil(($dia1+$dias) / 7);
$dia1 = -$dia1;
$data_inicio = date('Y-m-d', strtotime($dia1.' days', strtotime($data)));
$data_fim = date('Y-m-d', strtotime(( ($dia1 + ($linhas * 7) - 1) ).' days', strtotime($data)));

echo "Primeiro dia: ".$dia1;
echo "<br>Total dia: ".$dias;
echo "<br>Linhas: ".$linhas;
echo "<br>Data inicio: ".$data_inicio;
echo "<br>Data final: ".$data_fim."<br><br>";


?>
<form method="POST">
	<select nome="mes" class="form-control">
	<option value="1">Janeiro</option>
	<option value="2">Fevereiro</option>
	<option value="3">Março</option>
	<option value="4">Abril</option>
	<option value="5">Maio</option>
	<option value="6">Junho</option>
	<option value="7">Julho</option>
	<option value="8">Agosto</option>
	<option value="9">Setembro</option>
	<option value="10">Outubro</option>
	<option value="11">Novembro</option>
	<option value="12">Dezembro</option>
	</select><br>
	<input class="btn btn-primary" type="submit" value="Pesquisar">
</form>

<br><br>
<table border="1" width="100%" class="table">
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
						$w = date('d', strtotime(($q+($l*7)).'days', strtotime($data_inicio)));
					?>
					<td><?php echo $w; ?></td>
					<?php endfor;?>
				</tr>
			<?php endfor;?>
		</tbody>
		
</table>