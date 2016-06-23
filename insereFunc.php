<?php
    include("admin.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $telfone = mysqli_real_escape_string($db,$_REQUEST['telefone']);
    $cpf = mysqli_real_escape_string($db,$_REQUEST['CPF']);  
    $cargo = mysqli_real_escape_string($db,$_REQUEST['Cargo']);  
    $nome = mysqli_real_escape_string($db,$_REQUEST['Nome']);
    $user = mysqli_real_escape_string($db,$_REQUEST['Username']);      
    $sql_busca = "select username from users where username = '$user'";
    $achou = mysqli_query($db,$sql_busca);
    if(mysqli_num_rows($achou) >= 1){
        echo "Username já utilizado!";        
    } else{
        $sql_usuario = "insert into users(username, tipo) values ('$user', 2 )";
        if (mysqli_query($db,$sql_usuario) === TRUE) {
            } else {
                echo "Inválido!";
                }        
        $sql3 = "insert into funcionarios(telefone, CPF, Nome, Cargo, username) values ('$telfone','$cpf','$nome','$cargo','$user')";
            if (mysqli_query($db,$sql3) === TRUE) {
                echo "Funcionário adicionado com sucesso!";
            } else {
                echo "Inválido!";
                }
        }
}
?>
<form method="post" action="<?php //    echo $_SERVER['PHP_SELF'];?>"class="form-horizontal">
  <div class="form-group">
    <label for="inputTel" class="col-sm-2 control-label">Telefone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="telefone" name="telefone" value="" placeholder="Telefone">
    </div>
  </div>
  <div class="form-group">
    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Nome" name="Nome" value="" placeholder="Nome">
    </div>
  </div>
  <div class="form-group">
    <label for="inputCPF" class="col-sm-2 control-label">CPF</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="CPF" name="CPF" value="" placeholder="CPF">
    </div>
  </div>
  <div class="form-group">
    <label for="inputCargo" class="col-sm-2 control-label">Cargo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Cargo" name="Cargo" value="" placeholder="Cargo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Username" name="Username" value="" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Insere Funcionario</button>
    </div>
  </div>
</form>

