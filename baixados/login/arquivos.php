<?php include ("head.php") ?>
	
	<div id="dvCenter">
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
			if(filter_input(INPUT_POST, "btnSubmit")){
				require_once("upload.php");
				$upload = new Upload();
				$file = $upload->LoadFile("imagens", filter_input(INPUT_POST, "sltipo"), $_FILES["fl"]);
				if($file != ""){
					
					$url = "imagens/{$file}";
					
					
					$sql = "INSERT INTO imagem (url) VALUES ('$url')";
					mysqli_query($conexao, $sql);
					
					echo "<a href=\"imagens/{$file}\" target=\"_blank\"> Acessar </a>";
					if(filter_input(INPUT_POST, "sltipo") == "img"){
						echo "<span> <img src=\"imagens/{$file}\" width=\"350px\"> </span>";
					}
					
					
				}else{
					echo "Erro! Selecione um arquivo para upload";
				}
			}
		
		?>
		
		
		<?php
			$sql = "SELECT * FROM imagem WHERE url != ''";
		    $result = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($result) == ''){
				echo "<p> Não existe imagem cadastrada! </p>";
			}
		?>
		
		<div class="imagens">
			
			<?php 
				
				while($res = mysqli_fetch_array($result)){
					$cam = $res['url'];
				
			?>
			
			<img src="<?php echo $cam;  ?>">
			
			<?php }  ?>
			
		</div>
		
	</div>
	

<?php include ("footer.php") ?>
</body>
</html>