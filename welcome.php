<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
	  
	<?php
	  $conn = mysqli_connect('localhost', 'root', '', 'cadastro');
	  $sql = "select * from users";
      $result = mysqli_query($db,$sql);
      
	if (mysqli_num_rows($result) > 0) {
		// output data of each linha
		while($linha = mysqli_fetch_assoc($result)) {
			echo $linha["username"]. " " . $linha["password"] . "<br>";
		} 
	} else {
		echo "0 results";
	}

	?>
	  
	  
	  
   </body>
   
</html>