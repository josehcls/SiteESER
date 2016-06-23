<html>
<?php
    include("admin.php");
    
   $sql_cota = "select Cota from cota" ;
   $result_cota = mysqli_query($db,$sql_cota);
   
   	if (mysqli_num_rows($result_cota) > 0) {
			        // output data of each linha
        $linha = mysqli_fetch_assoc($result_cota);
        ?><h2><?php
        echo "Cota atual: R$" . $linha['Cota'];?></h2><?php
       }
?>
</br>
<form method="post" action="<?php //    echo $_SERVER['PHP_SELF'];?>">
  Alterar Cotação: <input type="text" value="" placeholder="Nova Cota" name="mudaCota" id ="mudaCota" >
  <input type="submit" value = "Atualiza!">
</form>       	

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $cota = mysqli_real_escape_string($db,$_REQUEST['mudaCota']);
            if (empty($cota)) {
                echo "Valor inválido";
            } else {
                $sqlnovo = "update cota set Cota = '$cota'";
                if (mysqli_query($db,$sqlnovo) === TRUE) {
                    header("Refresh:0");
                } else {
                     echo "Atualização inválida!";
                }
            }
}
?>

    