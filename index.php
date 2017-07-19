<?php
  include('session.php');
	include('head.php');
	include('topbar.php');
 ?>
 	<div class="container">
		<div class="row">
			<div class="column">
				<h1>Bienvenido <strong><?php echo $login_session; ?></strong></h1> 
      	<h2><a href = "logout.php">Salir</a></h2>
			</div>
		</div>
 		
 	</div>
</body>
</html>