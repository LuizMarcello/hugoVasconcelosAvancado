<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Site Exemplo</title>
<link rel="stylesheet" type="text/css" href="estilos/usuarios.css"/>
<link rel="stylesheet" type="text/css" href="estilos/estilo.css"/>
<link href="estilos/upload.css" rel="stylesheet" type="text/css">
<?php 
include "conexao.php";
?>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Administrador</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usuarios.php">Usuários</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="arquivos.php">Uploads</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Contatos</a>
      </li>
    </ul>
  </div>
</nav>
	