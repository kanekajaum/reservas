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
echo "<br>Data final: ".$data_fim;
?>

<table border="1" width="100%">
		<thead class="bg-dark text-white">
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
			
		</tbody>
		
</table>