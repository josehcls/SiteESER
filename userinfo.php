<?php
        include("session.php");
        include("background.php");       
       
       switch($tipo_session){
           case 1: //admin
    ?>
           <form method = "post" action=""><center>
                <input type="password" value="" placeholder="Senha Atual" name="atual" id ="atual">
                <input type="text" value="" placeholder="Nova senha" name="nova" id ="nova"></br></br>
                <input type="submit" value = "Muda senha!">
            </form></center>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $atual = mysqli_real_escape_string($db,$_REQUEST['atual']);
                $nova = mysqli_real_escape_string($db,$_REQUEST['nova']);
                if($atual == $password_session){
                    $sql = "update users set password = '$nova' where username = '$login_session'";
                    $result = mysqli_query($db,$sql);
                    header("location:admin.php");
                } else {
                    echo "Inválido!";
                    }
                 }            
                break;
            case 2: //funcionario   
    ?>
           <form method = "post" action=""><center>
                <input type="password" value="" placeholder="Senha Atual" name="atual" id ="atual">
                <input type="text" value="" placeholder="Nova senha" name="nova" id ="nova"></br></br>
                <input type="submit" value = "Muda senha!">
            </form></center>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $atual = mysqli_real_escape_string($db,$_REQUEST['atual']);
                $nova = mysqli_real_escape_string($db,$_REQUEST['nova']);
                if($atual == $password_session){
                    $sql = "update users set password = '$nova' where username = '$login_session'";
                    $result = mysqli_query($db,$sql);
                    header("location:admin.php");
                } else {
                    echo "Inválido!";
                    }
                 }            
                break;
            case 3: //cliente ?>
            <h3><center><?php
                $sql2 = "select email, telefone, nome from clientes where username = '$login_session'";
                $result1 = mysqli_query($db,$sql2);
                $linha1 = mysqli_fetch_assoc($result1);
                echo $linha1["nome"] . "      " . $linha1["telefone"] . "         " . $linha1["email"] ;
            ?></h3></center>
            <form method = "post" action=""><center>
                <input type="password" value="" placeholder="Senha Atual" name="atual" id ="atual">
                <input type="text" value="" placeholder="Nova senha" name="nova" id ="nova"></br></br>
                <input type="submit" value = "Muda senha!">
            </form></br></br>
            <a href = "cliente_info.php"> Alterar Informações</a>
            </center>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $atual = mysqli_real_escape_string($db,$_REQUEST['atual']);
                $nova = mysqli_real_escape_string($db,$_REQUEST['nova']);
                if($atual == $password_session){
                    $sql = "update users set password = '$nova' where username = '$login_session'";
                    $result = mysqli_query($db,$sql);
                    header("location:admin.php");
                } else {
                    echo "Inválido!";
                    }
                 }
                break;  
       }
       ?>