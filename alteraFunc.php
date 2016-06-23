
<head>
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
<?php

    include("admin.php");
?>
<table>
    <tr>
        <th>ID</th>
        <th>Telefone</th>
        <th>CPF</th>
        <th>Nome</th>
        <th>Cargo</th>
    </tr>
<?php
	if (mysqli_num_rows($result) > 0) {
			        // output data of each linha
	   while( $linha = mysqli_fetch_assoc($result)){
           ?>
    <tr>
        <td><?php echo  $linha["func_ID"] ?></td>
        <td><?php echo  $linha["telefone"] ?></td>
        <td><?php echo  $linha["CPF"] ?></td>
        <td><?php echo  $linha["Nome"] ?></td>
        <td><?php echo  $linha["Cargo"] ?></td>
    </tr>
    <?php
        }
?>

</table>
    </br>
<form method="post" action="<?php //    echo $_SERVER['PHP_SELF'];?>">
  IDfuncionário: <input type="text" value="" placeholder="ID do funcionário" name="funci_id" id ="funci_id" >
  <select name="campo" >
  <option value="">Escolha campo:</option>
  <option value="telefone">Telefone</option>
  <option value="CPF">CPF</option>
  <option value="Nome">Nome</option>
  <option value="Cargo">Cargo</option>
  </select>
  <input type="text" value="" placeholder="Novo valor" name="atual" id ="atual">
  <input type="submit" value = "Atualiza!">
</form>       	

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $id = mysqli_real_escape_string($db,$_REQUEST['funci_id']);
    $campo = $_REQUEST['campo'];
    $atual = mysqli_real_escape_string($db,$_REQUEST['atual']);  
    switch($campo){
        case "CPF":
            if (empty($id)) {
                echo "Funcionário inválido";
            } else {
                $sql3 = "update funcionarios set CPF = '$atual' where func_ID = '$id'";
                if (mysqli_query($db,$sql3) === TRUE) {
                    header("Refresh:0");
                } else {
                     echo "Atualização inválida!";
                }
            }
            break;
        case "Nome":
            if (empty($id)) {
                echo "Funcionário inválido";
            } else {
                $sql3 = "update funcionarios set Nome = '$atual' where func_ID = '$id'";
                if (mysqli_query($db,$sql3) === TRUE) {
                    header("Refresh:0");
                } else {
                     echo "Atualização inválida!";
                }
            }
            break;
        case "telefone":
            if (empty($id)) {
                echo "Funcionário inválido";
            } else {
                $sql3 = "update funcionarios set telefone = '$atual' where func_ID = '$id'";
                if (mysqli_query($db,$sql3) === TRUE) {
                    header("Refresh:0");
                } else {
                     echo "Atualização inválida!";
                }
            }
            break;
        case "Cargo":
            if (empty($id)) {
                echo "Funcionário inválido";
            } else {
                $sql3 = "update funcionarios set Cargo = '$atual' where func_ID = '$id'";
                if (mysqli_query($db,$sql3) === TRUE) {
                    header("Refresh:0");
                } else {
                     echo "Atualização inválida!";
                }
            }
            break;
        case "":
            echo "Escolha um campo.";
            break;
    }
    
}
    }
?>
