<?php	
    
    include("session.php");
    
       if($_SERVER["REQUEST_METHOD"] == "POST") {
            $mail = mysqli_real_escape_string($db,$_POST['altera_mail']);
            $fone = mysqli_real_escape_string($db,$_POST['altera_fone']);
            $nome = mysqli_real_escape_string($db,$_POST['altera_nome']);

            $sql = "update clientes set email = '$mail' , telefone = '$fone' , nome = '$nome' where  username = '$login_session'";

            if (mysqli_query($db,$sql) === TRUE) {
            echo "Informacoes alteradas com sucesso";
            } else {
            echo "Erro " ;
            }
       }
     
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
    background: url('http://i.imgur.com/Qj2lWB7.jpg') no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
}

</style>
</head>

    <title> Mudança de info clientes </title>
<body>
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
<br/><br/><br/><br/><br/> 
	
<div class="login-block"><center>
    <h1><center><font color = "#ff0000" > Novas informações: </font></center></h1>
    </br></br>
	<form action = "" method = "post">
		<p>
        <input type="text" value="" placeholder="Novo e-mail" name="altera_mail" id ="altera_mail"/>

        <input type="text" value="" placeholder="Novo telefone" name="altera_fone" id ="altera_fone"/>
            
		<input type="text" value="" placeholder="Novo Nome" name="altera_nome" id ="altera_nome"/>
        </br>
        </br>   
		<button>Submit</button>
        </p>
	</form>
	<div style = "font-size:11px; color:#ffffff; margin-top:10px"><?php if (isset($error)){echo $error;} ?></div>
</center>
</div>

    <h4><a href = "cliente.php">Retornar</a></h2></br>    

</body>
    
    
    
    
    
    
</html>    
