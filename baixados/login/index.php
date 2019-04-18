<?php include ("head.php") ?>
	
	<div class="caixa_login">
		
		<?php
			if(isset($_POST['button'])){
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				
				if($email == ''){
					echo "<h3> Por favor, insira seu email!</h3>";
				} else if($senha == ''){
					echo "<h3> Por favor, insira sua senha!</h3>";
				}else{
					$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
					$result = mysqli_query($conexao, $sql);
					if(mysqli_num_rows($result) > 0){
						while($res = mysqli_fetch_array($result)){
							$status = $res['status'];
							$email = $res['email'];
							$senha = $res['senha'];
							$nome = $res['nome'];
						}
						
						if($status == 'inativo'){
							echo "<h3> Seu usuário está inativo, procure a administração!</h3>";
						}else{
							session_start();
							echo "<script language='javascript'> 
							window.location='admin.php';
							</script>";
						}
						
						
					}else{
						echo "<h3> Dados Incorretos!</h3>";
					}
				}
				
				
				
			}
		?>
		   
			<form method="post" action="" name="form">
		  <div class="form-group">
			<label for="exampleInputEmail1">Email</label>
			<input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Insira seu Email">
			
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Senha</label>
			<input name="senha" type="password" class="form-control" id="senha" placeholder="Insira sua Senha">
		  </div>
		  
		  <button type="submit" class="btn btn-primary" name="button">Login</button>
		</form>
	</div>

<?php include ("footer.php") ?>

</body>
</html>