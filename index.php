<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

	<form action="cek_login.php" method="post">
		<h1><span>Asuransi Kendaraan</h1>
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
				echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
			}
		}
		?>
		<input name="username" placeholder="Username" type="text">
		<input name="password" placeholder="Password" type="password">
		<input type="submit" class="btn" value="LOGIN">
	</form>

	<!-- <footer>
		<h5>Life's Good</a></h5>
	</footer> -->

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>