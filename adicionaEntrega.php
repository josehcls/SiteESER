<?php
    include("cliente.php");
?>
<form method="post" action="<?php //    echo $_SERVER['PHP_SELF'];?>"class="form-horizontal"><center>
  Endereço da entrega:<input type="text" id="Ender" name="Ender" value="" placeholder="Endereço">
  <input type ="submit" value = "Adiciona!" >;
</form></center>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $ender = mysqli_real_escape_string($db,$_REQUEST['Ender']);
    $sql_cliente = "select cliente_ID from clientes where username = '$login_session'";
    $result_cliente = mysqli_query($db,$sql_cliente);
    $clienteID = mysqli_fetch_assoc($result_cliente)['cliente_ID']; 
    $sql_func = "select * from funcionarios";
    $result_func = mysqli_query($db,$sql_func);
    $min = 0;
    $entregador = 0;
    $num_func = (int) mysqli_num_rows($result_func) ;
    for ($i =0;$i<$num_func;$i++){
        $func = mysqli_fetch_assoc($result_func);
        $func_ID = (int)$func['func_ID'];
        $sql_entrega = "select * from entregas where func_ID = '$func_ID'";
        $result_entrega = mysqli_query($db,$sql_entrega);
        $count = (int) mysqli_num_rows($result_entrega);
        if($min >= $count){
            $min = $count;
            $entregador = $func_ID;
        }
    }
    $func_entrega = $entregador;
    if('$ender' != ""){
        $sql_adiciona = "insert into entregas(ender,cliente_ID,status,func_ID) values ('$ender' , '$clienteID', 'Estoque','$func_entrega')";
        if(mysqli_query($db,$sql_adiciona) === TRUE){
            echo "Entrega adicionada!";        
        } else{
            echo "Erro ao adicionar entrega!";
            }
    }
}

?>
