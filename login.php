<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT idUsuarios FROM usuariossistemas WHERE IdUsuariosSistemas = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         // session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
         // $success = "<p class='text-success text-center'>Genial!!";
      }else {
         $error = "<h4 class='text-danger text-center'>El usuario o contaseña son incorrectos</h4>";
      }
   }
?>

<?php 
   include("head.php");
?>
   <div class="container">
      <div class="row">
         <div class="column">
            <h1 class="text-center">ASF-K Mexico <small>ppInventario</small></h1>
         </div>
      </div>
	
      <div class="row">
         <div class="column col-sm-4 col-sm-offset-4">
            <div>
               <h2 class="text-center">
                  <b>Login</b>
               </h2>
            </div>
				
            <div> 
               <form action = "" method = "post">
                  <div class="form-group">
                     <label>Usuario :</label>
                     <input type = "text" name = "username"  class="form-control">
                  </div>
                  <div class="form-group">
                     <label>Contraseña :</label>
                     <input type = "password" name = "password" class="form-control">
                  </div>
                  <input type = "submit" value = "Acceder " class="btn btn-primary btn-lg" />
                  <br>
                  <br>
               </form>
               <div><?php echo $error; ?></div>
               <div><?php echo $success; ?></div>
            </div>
         </div>
      </div>
   </body>
</html>