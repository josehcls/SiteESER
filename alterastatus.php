<?php
   
   include('session.php');
        $busca = $_GET['entrega_id'];

	  $conn = mysqli_connect('localhost', 'root', '', 'cadastro');
	  $sql1 = "select ID, ender, nome, telefone, status from clientes C, entregas E  where ID = '$busca' ";
      $result = mysqli_query($db,$sql1);
      
		if (mysqli_num_rows($result) > 0) {
			// output data of each linha
			while($linha = mysqli_fetch_assoc($result)) {
				echo $linha["ID"]. " " . $linha["nome"]. " " . $linha["telefone"]. " " . $linha["ender"]. " " . $linha["status"] .  "<br>";
			} 
		} else {
			echo "Entrega não encontrada";
		}      
              
?>
<html>        
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
</html>
