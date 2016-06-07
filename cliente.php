<?php
   include('session.php');
?>
<html>
   
    <head>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">


<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<meta charset="UTF-8">

<title>Elegant Login - Designscrazed</title>
<style>
body {
    background-color: lightblue;
    background-size: cover;
    font-family: Montserrat;
}

</style>
</head>
   
   <body>
       </br></br></br>
       <font  size = "15" color = "#fff">Cliente <?php echo $login_session; ?> </font> 
      <h4><a href = "logout.php">Sign Out</a></h2></br>
      <center><font  size = "5" color = "#fff">
<?php
        $sql2 = "select email, telefone, nome from clientes where username = '$login_session'";
        $result1 = mysqli_query($db,$sql2);
        $linha1 = mysqli_fetch_assoc($result1);
        echo $linha1["nome"] . "      " . $linha1["telefone"] . "         " . $linha1["email"] ;

?>      
</font>
        </br>
      <h5><a href = "cliente_info.php">Altera informações</a></h5> 
      </center>             
	    <form action="?a=ok" method="POST">
		    <input type="submit" value="Mostra Entrega" />
		</form>      

   
   <?php
        if (isset( $_GET['a']) && $_GET['a'] == 'ok'){
            	  $conn = mysqli_connect('localhost', 'root', '', 'cadastro');
	            $sql1 = "select ID, ender, status from clientes C, entregas E  where C.username = '$login_session'     AND C.cliente_ID = E.cliente_ID";
                 $result = mysqli_query($db,$sql1);
      
		        if (mysqli_num_rows($result) > 0) {
			    // output data of each linha
			    while($linha = mysqli_fetch_assoc($result)) {
				    echo $linha["ID"]. " " . $linha["ender"]. " " . $linha["status"] .  "<br>";
			    } 
		        } else {
			        echo "0 results";
		        }      
        }
   
       ?>
   

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.html">Entrega Rápida e Segura</a>
            </div>
        </div>
</nav>
</body>
    
    
    
    
    
    
</html>    
