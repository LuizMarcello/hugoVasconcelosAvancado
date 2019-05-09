<!--Usando esta página dinâmica
    Páginas dinâmicas só funcionam com arquivos php
    Com arquivos html não funcionam-->
<?php include("head.php"); ?>

<div class="caixa_login">

    <?php
    //$_POST: Array nativo, associativo, super-global de variáveis, passado via HTTP POST: 
    //Qualquer tag do HTML dentro de um bloco PHP, tem que ser entre "aspas duplas":
    //Seu houver algum 'método POST' sendo executado, e vier do botão 'button', será 'true':
    if (isset($_POST['button'])) {
        //Guardando tudo o que o usuário digitou nos campos 'e-mail' e 'senha', dentro nas variáveis criadas:
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if ($email == '') {
            echo "<h3>Por favor, digite seu e-mail</h3>";
        } else if ($senha == '') {
            echo "<h3>Por favor, digite sua senha</h3>";
        } else {
            $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
            //Função nativa do pp7: Faz a conexão com o banco de dados
            //através da variável de conexão, e executa a query '$sql' acima.
            //$result receberá o resultado:
            $result = mysqli_query($conexao, $sql);
            //mysqli_num_rows(): Função nativa que obtém o número 
            //de linhas de um resultado(SELECT):
            //Decisão: Se o usuário existe ou não:
            if (mysqli_num_rows($result) > 0) {
                //Usuário existe. Capturando as informações dele: 
                //Função nativa 'mysqli_fetch_array()', que vai percorrer
                //todo o registro dele, encontrado na variável '$result':
                while ($res = mysqli_fetch_array($result)) {
                    //Vão receber os valores que estão nos referidos campos:
                    $status = $res['status'];
                    $email = $res['email'];
                    $senha = $res['senha'];
                    $nome = $res['nome'];
                }
                //Decisão: Se o usuário está ativo, ou não:
                if ($status === 'inativo') {
                    echo "<h3>Usuário inativo, procure a administração!</h3>";
                } else {
                    //Função nativa do php, para iniciar a sessão do login:
                    session_start();
                    //Script de direcionamento
                    echo "<script language='javascript'>
                                 window.location='admin.php';
                                 </script>";
                }
            } else {
                echo "<h3>Usuário Inexistente!!!</h3>";
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

<!--Usando esta página dinâmica
    Páginas dinâmicas só funcionam com arquivos php
    Com arquivos html não funcionam-->
<?php include ("footer.php") ?>

</body>
</html>
