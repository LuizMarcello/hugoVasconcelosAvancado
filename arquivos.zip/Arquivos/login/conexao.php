<?php

/*
function conectar(){
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "login";
	$con = new mysqli($servidor, $usuario, $senha, $bd);
	return $con;
}
*/

function conectar(){
	$servidor = "mysql427.umbler.com";
	$usuario = "hugo_user";
	$senha = "hugosenha";
	$bd = "hugo_login";
	$con = new mysqli($servidor, $usuario, $senha, $bd);
	return $con;
}

$conexao = conectar();

?>