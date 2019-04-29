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

    <!-- BUSCANDO OS USUÀRIOS -->
    
    <?php
        //Sempre que houver um SELECT, haverá as funções
        //nativas 'mysqli_query()' e verificação com a 'mysqli_num_rows()', em seguida:
        $sql = "SELECT * FROM usuarios WHERE nome != '' ";
        //Função nativa do php, para executar a consulta no banco de dados:
        //A nova vriável '$result' receberá o resultado na consulta:
        $result = mysqli_query($conexao, $sql);
        //Função nativa que verifica o número de linhas encontradas após uma consulta:
        if(mysqli_num_rows($result) == ''){
          echo "<h2> Não existem usuários cadastrados </h2>";
        }
        
    ?>

    <table width="900" border="0">
      <tr>
      
        <td><strong>Código:</strong></td>
        <td><strong>Nome:</strong></td>
        <td><strong>Email:</strong></td>
        <td><strong>Status:</strong></td>
        <td></td>
      </tr>
      
      <?php
      //Função nativa 'mysqli_fetch_array()': Busca as informações
      //do resultado das linhas da consulta acima, através de um
      //array, e a variável $res_1(array) recebe os valores:
      while($res_1 = mysqli_fetch_array($result)){
        //Será repetido enquanto houver mais cadastros:
        $id=$res_1['id']; 
        $email=$res_1['email']; 
        $nome=$res_1['nome']; 
        $senha=$res_1['senha']; 
        $status=$res_1['status']; 
      ?>

     
      <tr><!--Toda essa linha está dentro do while então, na consulta, toda
              ela será repetida para cada usuário no banco de dados-->
        <td><h3><?php echo $id ?></h3></td>
        <td><h3><?php echo $nome ?></h3></td>
        <td><h3><?php echo $email ?></h3></td>
        <td><h3><?php echo $status ?></h3></td>
        <td></td>
        <td>

        <a class="a" href=""><img title="Excluir Usuário" src="img/deleta.jpg" width="18" height="18" border="0"></a>

        <?php if($status == 'inativo'){ ?>
        <a class="a" href="usuarios.php?pg=todos&func=ativa&id=<?php echo $id; ?>"><img title="Ativar novamente usuário"
        src="img/correto.jpg" width="20" height="20" border="0"></a>
        <?php } ?>

        <?php if($status == 'ativo'){ ?>
        <a class="a" href="usuarios.php?pg=todos&func=inativa&id=<?php echo $id; ?>"><img title="Inativar Usuário(a)"
        src="img/ico_bloqueado.png" width="18" height="18" border="0"></a>
        <?php } ?>

        <a class="a" href="usuarios.php?pg=edita"><img title="Editar Dados Cadastrais" src="img/ico-editar.png" width="18" height="18" border="0"></a>
       </td>
      </tr><!--Toda essa linha está dentro do while-->

    <?php  } ?> <!--Fim do bloco while-->
     
    </table>

<br />

<!-- EDITANDO O USUÁRIO -->

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
      <!--<option value=""></option>
          <option value=""></option>-->
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

<!--GET = envio de VARIÁVEIS-->
<!--POST = FORMULÁRIOS-->
<!--Método "GET" é o mais indicado para o envio de variáveis.-->
<!--Método "POST" é o mais indicado para o envio de informações em formulários(tag <form></form>).-->
<!--Só é possível abrir 'blocos php' dentro de uma edição html, se o arquivo for extensão '.php'-->
<!--Qualquer tag do HTML dentro de um bloco PHP, tem que ser entre "aspas duplas":-->

<!-- CADASTRANDO O NOVO USUÁRIO -->

<!--$_GET: Array nativo, associativo, super-global de variáveis, passado via HTTP GET:--> 
<!--Se, via método GET, a variável 'pg' receber 'cadastra', então executa a referida <div>:-->
<!--Abre e fecha o bloco php só para iniciar o 'if' e abrir as chaves: -->
<?php if(@$_GET['pg'] == 'cadastra'){ ?>

<div id="cadastra_usuarios">  
<h1>Cadastrar novo Usuário</h1>

<!--$_POST: Array nativo para verificar se houve algum HTTTP POST:-->
<!--Se existir 'POST' no botão com o name 'button'(value 'Cadastrar') -->
<?php if(isset($_POST['button'])){
  //Serão recebidas, através do formulário(<form>) abaixo, quando o
  //usuário preencher o mesmo, no site, para cadastrar o novo usuário:
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $status = $_POST['status'];

  //Fazendo uma consulta para inserção dos dados do novo usuário no bd:
  //Nome dos campos(colunas) na tabela no bd
  $sql = "INSERT INTO usuarios (nome, email, senha, status)
  VALUES('$nome', '$email', '$senha', '$status')";
  //Variáveis criadas acima, no 'if', com aspas simples(apóstofos).

  //Função nativa do php, para executar(disparar) a inserção no banco de dados:
  //A nova vriável '$cadastra' receberá o resultado do comando sql, referente a inserção:
  $cadastra = mysqli_query($conexao, $sql);

  if($cadastra == ''){
      //Script javascript para fazer uma mensagem de alerta: 
      echo "<script language='javascript'>
          window.alert('Ocorreu um êrro ao cadastrar!');
      </script>";
  }else{
      //Script javascript para fazer uma mensagem de alerta: 
      echo "<script language='javascript'>
          window.alert('Usuário cadastrado com sucesso!');
      </script>";
  }

}?>

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
          <!--Os valores que estão em 'value' é que serão salvos no bd-->
          <option value="ativo">Ativo</option>
          <option value="inativo">Inativo</option></select></td>
      
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
<!-- <?php } ?> -->


<!-- ATIVANDO O USUÁRIO -->

<!--$_GET: Array nativo, associativo, super-global de variáveis, passado via HTTP GET:--> 
<!--Se, via método GET, a variável 'func' receber 'ativa', então a atualização no bd é executada:-->
<!--O '@' é para não ficar dando alertas, caso o objeto não exista: -->
<?php
     if(@$_GET['func'] == 'ativa'){ 
        //Se a condição for true, a nova variável '$id' receberá o que for
        //passado via método GET, pela url, no campo 'id'.-->
        $id = @$_GET['id'];
        //A nova variável '$sql' guarda então o comando 'UPDATE'(para o sql):-->
        $sql = "UPDATE usuarios SET status = 'ativo' WHERE id = '$id' ";
        //Função nativa do php, para executar este comando UPDATE, no banco de dados:-->
        mysqli_query($conexao, $sql);
        //Script javascript para fazer o redirecionamento para a mesma
        //página(usuarios.php), mas estando agora atualizada.
        echo "<script language='javascript'>
        window.location='usuarios.php';
        </script>";
     
      
    }
?>

<!-- DESATIVANDO O USUÁRIO -->

<!--$_GET: Array nativo, associativo, super-global de variáveis, passado via HTTP GET:--> 
<!--Se, via método GET, a variável 'func' receber 'inativa', então a atualização no bd é executada:-->
<!--O '@' é para não ficar dando alertas, caso o objeto não exista: -->
<?php
     if(@$_GET['func'] == 'inativa'){ 
        //Se a condição for true, a nova variável '$id' receberá o que for
        //passado via método GET, pela url, no campo 'id'.-->
        $id = @$_GET['id'];
        //A nova variável '$sql' guarda então o comando 'UPDATE'(para o sql):-->
        $sql = "UPDATE usuarios SET status = 'inativo' WHERE id = '$id' ";
        //Função nativa do php, para executar este comando UPDATE, no banco de dados:-->
        mysqli_query($conexao, $sql);
        //Script javascript para fazer o redirecionamento para a mesma
        //página(usuarios.php), mas estando agora atualizada.
        echo "<script language='javascript'>
        window.location='usuarios.php';
        </script>";
     
      
    }
?>

<br />
</div>

</body>
</html>