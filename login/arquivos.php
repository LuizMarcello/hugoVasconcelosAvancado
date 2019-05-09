<!--Usando esta página dinâmica
    Páginas dinâmicas só funcionam com arquivos php
    Com arquivos html não funcionam-->
<?php include("head.php") ?>

<div id="dvCenter">
    <!--Este 'enctype' é para o navegador entender que é um formulário
            que pode ser enviado arquivos ou imagens-->
    <form action="" method="POST" name="frmUpload" enctype="multipart/form-data">

        <p>Arquivo: <input type="file" name="fl"></p>
        <p>Tipo: <select name="sltipo">
                <option value="img">Imagem</option>
                <option value="file">Arquivo</option>
            </select>
            <input type="submit" value="Upload" name="btnSubmit">

        </p>

    </form>

    <br>

    <?php
    //Função nativa 'filter_input()': filtra o que
    //vem a partir de um input.
    //Verifica se vem um POST através do input deste botão:
    if (filter_input(INPUT_POST, "btnSubmit")) {
        require_once("upload.php");
        $upload = new Upload();
        $file = $upload->LoadFile("imagens", filter_input(INPUT_POST, "sltipo"), $_FILES["fl"]);
        if ($file != "") {

            $url = "imagens/{$file}";
            //echo $url;

            $sql = "INSERT INTO imagem (url) VALUES ('$url')";
            //Executando a consulta acima, para inserção:
            mysqli_query($conexao, $sql);

            echo "<a href=\"imagens/{$file}\" target=\"_blank\"> Acessar </a>";
            if (filter_input(INPUT_POST, "sltipo") == "img") {
                echo "<span> <img src=\"imagens/{$file}\" width=\"300px\"> </span>";
            }
        } else {
            echo "Êrro! Selecione um arquivo para upload.";
        }
    }

    ?>

    <?php
    $sql = "SELECT * FROM imagem WHERE url != '' ";
    //Executando a consulta acima, para o select, e
    //guardando na variável '$result': 
    $result = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($result) == '') {
        echo "<p> Não existe imagem cadastrada </p>";
    }
    ?>

    <div class="imagens">
        <?php
        while ($res = mysqli_fetch_array($result)) {
            $cam = $res['url'];

            ?>
            <img src="<?php echo $cam; ?>">
        <?php } ?>
    </div>

</div>

<!--Usando esta página dinâmica
    Páginas dinâmicas só funcionam com arquivos php
    Com arquivos html não funcionam-->
<?php include ("footer.php") ?>

</body>
</html>
