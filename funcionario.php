<?php
   include('session.php');

            	  $conn = mysqli_connect('localhost', 'root', '', 'cadastro');
	            $sql1 = "select ID, ender, status from funcionarios F, entregas E  where F.username = '$login_session'     AND F.func_ID = E.func_ID";
                 $result = mysqli_query($db,$sql1);   
                $i = 0;
   
?>
<html>
   
   <head>
      <title>Funcionario </title>
   </head>
   
   <body>
      <h1>Funcionario <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
	  
     <form action="?b=ok" method="POST">
		    <input type="submit" value="Próximo!" />
	</form>      
<?php


        if (isset( $_GET['b']) && $_GET['b'] == 'ok'){
		        if (mysqli_num_rows($result) > 0) {
			        // output data of each linha
			        while( $linha = mysqli_fetch_assoc($result)){//$linha = mysqli_fetch_assoc($result)) {
                        $entrega = $linha["ID"];
                        ?>
                            <a href = "alterastatus.php"><?php echo $entrega; $entrega_id = $entrega; ?></a>
 <?php
				        echo  " " . $linha["ender"] . " " . $linha["status"] .  "<br>"
                        ;
                        
			        }    
                } else {
			        echo "0 results";
		        }      
        }
?>      
      
    <input list="atual" placeholder = "Atualiza Status">
    <datalist id="atual">
        <option value="">
        <option value="Loja">
        <option value="Estoque">
        <option value="Entregue">
        <option value="Devolvido">
    </datalist>
    </br>
    </br>   	   
     <form action="?a=ok" method="POST">
		    <input type="submit" value="Atualiza!" />
	</form>      


</body>
   
</html>