<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuários</title>
<link rel="stylesheet" type="text/css" href="estilos/usuarios.css"/>

<?php 
include "conexao.php";
?>
</head>

<!--Método "GET" é o mais indicado para o envio de variáveis.-->
<!--Método "POST" é o mais indicado para o envio de informações em formulários(tag <form></form>).-->
<!--Só é possível abrir 'blocos php' dentro de uma edição html, se o arquivo for extensão '.php'-->
<!--Qualquer tag do HTML dentro de um bloco PHP, tem que ser entre "aspas duplas":-->

<body>
<div id="box_usuarios">
<br /><br />
<a class="a2" href="usuarios.php?pg=cadastra">Cadastrar Usuário</a>
<h1>Usuário</h1>

    <!-- BUSCAR OS USUÀRIOS -->
    <?php
        $sql = "SELECT * FROM usuarios WHERE nome != '' ";
    ?>

    <table width="900" border="0">
      <tr>
      
        <td><strong>Código:</strong></td>
        <td><strong>Nome:</strong></td>
        <td><strong>Email:</strong></td>
        <td><strong>Status:</strong></td>
        <td></td>
      </tr>
     
      <tr>
        <td><h3></h3></td>
        <td><h3></h3></td>
        <td><h3></h3></td>
        
        <td><h3></h3></td>
        <td></td>
        <td>
        <a class="a" href=""><img title="Excluir Usuário" src="img/deleta.jpg" width="18" height="18" border="0"></a>
       
       
        <a class="a" href=""><img title="Ativar novamente usuário" src="img/correto.jpg" width="20" height="20" border="0"></a>
        
        
       
        <a class="a" href=""><img title="Inativar Usuário(a)" src="img/ico_bloqueado.png" width="18" height="18" border="0"></a>
        
        
        <a class="a" href="usuarios.php?pg=edita"><img title="Editar Dados Cadastrais" src="img/ico-editar.png" width="18" height="18" border="0"></a>
       </td>
      </tr>
     
    </table>

<br />

<!--$_GET: Array nativo, associativo, super-global de variáveis, passado via HTTP GET:--> 
<!--Se, via método GET, a variável 'pg' receber 'edita', então executa o referido <form>:-->
<!--Abre e fecha o bloco php só para iniciar o 'if' e abrir as chaves: -->
<?php if(@$_GET['pg'] == 'edita'){ ?>
<hr />
<h1>Editar Usuarios</h1>



<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="900" border="0">
    <tr>
      <td>Nome:</td>
      <td>Email</td>
      <td>Senha</td>
    </tr>
    <tr>
      <td><label for="textfield2"></label>
      <input type="text" name="nome" id="textfield2" value=""></td>
      <td><label for="textfield3"></label>
      <input type="text" name="email" id="textfield3" value=""></td>
      <td><input type="text" name="senha" id="textfield8" value=""></td>
    </tr>
    <tr>
      <td>Status:</td>
      
    </tr>
    <tr>
      
      <td><label for="select"></label>
        <select name="status" size="1" id="select">
          <option value=""></option>
          <option value=""></option>
          <option value="Ativo">Ativo</option>
          <option value="Inativo">Inativo</option>
          
      </select></td>
     
    </tr>
    
      <td><input class="input" type="submit" name="button" id="button" value="Atualizar"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>

</form>
<!--Abre e fecha o bloco php novamente, só para fechar as chaves do 'if' acima:-->
<?php } ?>



</div>


<!--$_GET: Array nativo, associativo, super-global de variáveis, passado via HTTP GET:--> 
<!--Se, via método GET, a variável 'pg' receber 'cadastra', então executa a referida <div>:-->
<!--Abre e fecha o bloco php só para iniciar o 'if' e abrir as chaves: -->
<?php if(@$_GET['pg'] == 'cadastra'){ ?>

<div id="cadastra_usuarios">  
<h1>Cadastrar novo Usuário</h1>



<form name="form1" method="post" action="">
  <table width="900" border="0">
    <tr>
      <td>Nome:</td>
      <td>Email:</td>
      <td>Senha</td>
      
    </tr>
    <tr>
        
        
      <td>
      <input type="text" name="nome" id="textfield1" required></td>
      <td>
      <input type="text" name="email" id="textfield2" required></td>
      <td>
      <input type="password" name="senha" id="textfield3" required></td>
      </tr>
      <tr>
      <td>Status</td> </tr>
      <tr>
      <td><label for="select"></label>
        <select name="status" size="1" id="select">
          <option value="Ativo">Ativo</option>
          <option value="Inativo">Inativo</option></select></td>
      
    </tr>
    
      <td><input class="input" type="submit" name="button" id="button" value="Cadastrar"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<br />
</div>
<!--Abre e fecha o bloco php novamente, só para fechar as chaves do 'if' acima:-->
<?php } ?>






<br />
</div>



</body>
</html>