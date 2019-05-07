<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload de Arquivos</title>
    <link href="estilos/upload.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="dvCenter">
        <!--Este 'enctype' é para o navegador entender que é um formulário
            que pode ser enviado arquivos ou imagens-->
        <form action="" method="POST" name="frmUpload" enctype="multipart/form-data">

        <p>Arquivo: <input type="file" name="fl"></p>
        <p>Tipo: <select name="sltipo">
            <option value="img">Imagem</option>
            <option value="arquivo">Arquivo</option>
        </select>
        <input type="submit" value="Upload"
        name="btnSubmit">

    </p>

      </form>

      <br>

      <?php
      //Função nativa 'filter_input()': filtra o que
      //vem a partir de um input.
      //Verifica se vem um POST através do input deste botão:
      if(filter_input(INPUT_POST, "btnSubmit")){
          require_once("upload.php");
          $upload = new Upload();
          $file = $upload->LoadFile();

      }
      
      ?>

    </div>
</body>
</html>

        
