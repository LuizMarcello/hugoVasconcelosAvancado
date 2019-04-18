<?php

function conectar(){
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "login_hv_vsc";
    $conn = new mysqli($servidor, $usuario, $senha, $bd);

    //Atributo nativo 'connect_error' para saber se houve algum êrro na conexão com o banco de dados:
    //$conn é a variável da conexão:
    if($conn->connect_error){
	    echo "Mensagem do êrro: " . $conn->connect_error;
        exit;
    }else{
        return $conn;
    }
}

//Criando esta variável para invocar a função de conexão acima:
$conexao = conectar();



?>