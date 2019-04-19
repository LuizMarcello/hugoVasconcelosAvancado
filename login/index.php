<!doctype html>
<html>
    <!--Método "GET" é o mais indicado para o envio de variáveis.-->
    <!--Método "POST" é o mais indicado para o envio de informações em formulários(tag <form></form>).-->
    <!--Só é possível abrir 'blocos php' dentro de uma edição html, se o arquivo for extensão '.php'-->
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="/estilos/estilo.css" rel="stylesheet" type="text/css">
        <title>Login</title>
    </head>

    <body>
    
    <?php
    /*
     Diferenças entre 'include' e 'require':
    'require' obriga que o arquivo exista e 
     que esteja funcionando corretamente, senão
     gera um êrro fatal e para a execução do código.
    'include' tenta funcionar mesmo que o arquivo
     não exista, ou que esteja com algum problema.
    'include' tem mais recursos, como o diretorio
    'include/path', que permite que ele traga 
     arquivos direto de lá.
    'include' permite include dinâmico, usando 'url'
     require_once: No caso de laço, executa só uma vêz.
     include_once: No caso de laço, executa só uma vêz.
     include "inc/exemplo-01.php";
     require_once "inc/exemplo-01.php";
     */
    include_once('conexao.php');
    ?>

        <div class="caixa_login">
            
            <?php 
                //$_POST: Array nativo, associativo, super-global de variáveis, passado via HTTP POST: 
                //Qualquer tag do HTML dentro de um bloco PHP, tem que ser entre "aspas duplas":
                //Seu houver algum 'método POST' sendo executado, e vier do botão 'button', será 'true':
                if(isset($_POST['button'])){
                    //Guardando tudo o que o usuário digitou nos campos 'e-mail' e 'senha', dentro nas variáveis criadas:
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];

                    if($email == ''){
                        echo "<h3>Por favor, digite seu e-mail</h3>";
                    }else if($senha == ''){
                        echo "<h3>Por favor, digite sua senha</h3>";
                    }else{
                        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
                        //Função nativa do pp7: Faz a conexão com o banco de dados
                        //através da variável de conexão, e executa a query '$sql' acima.
                        //$result receberá o resultado:
                        $result = mysqli_query($conexao, $sql);
                        //mysqli_num_rows(): Função nativa que obtém o número 
                        //de linhas de um resultado(SELECT):
                        if(mysqli_num_rows($result) > 0){
                            echo "<h3>Tem o registro no banco</h3>";

                        }else{
                            echo "<h3>Não tem o registro no banco</h3>"; 
                        }
                    }

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