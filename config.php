
    <link rel="icon" href="img/calender.ico" type="image/x-icon" width="20"/>
<?php

try {
	$pdo = new PDO("mysql:dbname=reservas;localhost","root","root");
	// echo "Conectado!!!";
} catch (PDOException $e) {
	echo "Erro: ".$e->getMessage();
	exit;
}