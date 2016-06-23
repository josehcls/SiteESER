<?php	
    include("session.php");
    include("background.php");
       if($_SERVER["REQUEST_METHOD"] == "POST") {
            $mail = mysqli_real_escape_string($db,$_POST['altera_mail']);
            $fone = mysqli_real_escape_string($db,$_POST['altera_fone']);
            $nome = mysqli_real_escape_string($db,$_POST['altera_nome']);

            $sql = "update clientes set email = '$mail' , telefone = '$fone' , nome = '$nome' where  username = '$login_session'";

            if (mysqli_query($db,$sql) === TRUE) {
                echo "Informacoes alteradas com sucesso";
                header("location:userinfo.php");
            } else {
                echo "Erro " ;
            }
       }
     
?>  
<html>
    <head>
</head>

    <title> Mudança de info clientes </title>
<body>
	
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
</body>
    
    
    
    
    
    
</html>    
