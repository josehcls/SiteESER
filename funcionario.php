<?php
   include('session.php');
   include('background.php');
   
      	  $conn = mysqli_connect('localhost', 'root', '', 'cadastro');
          $sql1 = "select ID, ender, status from funcionarios F, entregas E  where F.username = '$login_session'     AND F.func_ID = E.func_ID";
          $result = mysqli_query($db,$sql1);      

function mudaEntrega($eid,$estado) {
    $sql3 = "update entregas set status = '$estado' where ID = '$eid'";
    if (mysqli_query($db,$sql3) === TRUE) {
        echo "Informacoes alteradas com sucesso";
    } else {
        echo "Entrega inválida" ;
    }    
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $id = mysqli_real_escape_string($db,$_REQUEST['entrega_id']);
    $atual = mysqli_real_escape_string($db,$_REQUEST['atual']);  
    if (empty($id)) {
        echo "Entrega inválida";
    } else {
         $sql3 = "update entregas set status = '$atual' where ID = '$id'";
        if (mysqli_query($db,$sql3) === TRUE) {
            header("Refresh:0");
        } else {
            echo "entrega inválida!";
        }
}
}
    
?>
<html>   
   <head>
      <title>Funcionario </title>
	<style>
    table , td, th{
        border: 1px black solid;
    }
    table{
        border-collapse: collapse;
        width:100%;
    }
    
    th, td {
        text-align: left;
        padding: 8px;
    }
    
    th{
        background-color:#4CAF50;
        color: white;
    }
    </style>   
   </head>   
   <body>

<table>	
    <tr>
        <th>ID</th>
        <th>Endereço</th>
        <th>Status</th>
    </tr>
<?php
	if (mysqli_num_rows($result) > 0) {
			        // output data of each linha
	   while( $linha = mysqli_fetch_assoc($result)){
?>
    <tr>
        <td><?php echo  $linha["ID"] ?></td>
        <td><?php echo  $linha["ender"] ?></td>
        <td><?php echo  $linha["status"] ?></td>
    </tr>
<?php
    }
    }
?>
</table>
     
    </br>
<form method="post" action="<?php //    echo $_SERVER['PHP_SELF'];?>">
  IDentrega: <input type="text" value="" placeholder="Entrega a ser alterada" name="entrega_id" id ="entrega_id" >
  <select name="atual" >
  <option value="">Escolha estado:</option>
  <option value="Estoque">Estoque</option>
  <option value="Pendente">Pendente</option>
  <option value="Entregue">Entregue</option>
  <option value="Devolvido">Devolvido</option>
  </select>
  <input type="submit" value = "Atualiza!">
</form>       	


<div id="confirmaalt"></div>      
</body>   
</html>