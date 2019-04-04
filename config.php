<?php

try {
	$pdo = new PDO("mysql:dbname=reservas;localhost","root","root");
	// echo "Conectado!!!";
} catch (PDOException $e) {
	echo "Erro: ".$e->getMessage();
	exit;
}