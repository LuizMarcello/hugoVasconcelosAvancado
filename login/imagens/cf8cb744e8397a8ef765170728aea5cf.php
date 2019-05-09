<?php

$filename = "gunsandroses.jpg";

//Função nativa 'file_get_contents()': Lê o conteúdo inteiro do
//arquivo, todas as linhas, por completo, até com 'fclose()'.
//Ele retorna binário, então usa a outra função nativa
//'base64_encode()' para converter para string.
$base64 = base64_encode(file_get_contents($filename));

//Instanciando a classe interna 'finfo', para pegar
//informações do tipo do arquivo.
//Como parâmetro, no método construtor, uma constante
//para pedir o tipo 'mime' do arquivo:
$fileinfo = new finfo(FILEINFO_MIME_TYPE);

//Esta variável receberá o tipo de arquivo, através da
//invocação do método nativo 'file()', da classe 'finfo':
$mimetype = $fileinfo->file($filename);

//Montando o 'padrão de exibição' do base64_encode():
$base64encode = "data:" .$mimetype. ";base64," .$base64;

?>

<a href="<?=$base64encode?>" target="_blank">Link para imagem</a>

<img src="<?=$base64encode?>">