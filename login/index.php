<!doctype html>
<html>
    <!--Método "GET" é o mais indicado para o envio de variáveis.-->
    <!--Método "POST" é o mais indicado para o envio de informações em formulários(tag <form></form>).-->
    <!--Só é possível abrir blocos php dentro de uma edição html, se o arquivo for extensão '.php'-->
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="/estilos/estilo.css" rel="stylesheet" type="text/css">
        <title>Login</title>
    </head>

    <body>
        <div class="caixa_login">

            <?php 
                //$_POST: Array associativo super-global nativo de variáveis, passado via HTTP POST: 
                //Qualquer tag do HTML dentro de um bloco PHP, tem que ser entre "aspas duplas":
                //Seu houver algum 'método POST' sendo executado, e vier do botão 'button', será 'true':
                if(isset($_POST['button'])){
                    //Guardando tudo o que o usuário digitou nos campos 'e-mail' e 'senha', dentro nas variáveis criadas:
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];
                    echo "<h2>Clicou no botão Login!</h2>";
                }
            
            ?>

            <!--Método 'POST' vai ler as informações deste bloco 'form':-->
            <form method="POST" action="" name="form">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Insira seu email">
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input name="senha" type="password" class="form-control" id="senha" placeholder="Insira sua senha">
                </div>

                <button type="submit" class="btn btn-primary" name="button">Login</button>

            </form>
            <!--Método 'POST' vai ler as informações deste bloco 'form':-->

        </div>
    </body>
</html>