<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>TESTE</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"">
    <link rel="stylesheet" type="text/css" href="meu.css"
</head>
<body>

<?php

include 'conn.php';

if (!isset($_POST["usuario_id"])){
    $id=$_GET["usuario_id"];
    $nome=$_GET["nome"];
    $email=$_GET["email"];
    $telefone=$_GET["telefone"];
    $obs=$_GET['obs'];

}else{
    $id=$_POST["usuario_id"];
    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $telefone=$_POST["telefone"];
    $obs=$_POST['obs'];

    $sql = "UPDATE agendass SET nome=:nome, email=:email, 
telefone=:telefone, obs=:obs WHERE usuario_id=:usuario_id";

    $resultado = $conn->prepare($sql);

    $resultado->execute(array(":usuario_id"=>$id, ":nome"=>$nome, ":email"=>$email,
      ":telefone"=>$telefone, ":obs"=>$obs));

    header("Location:index.php");

}

?>

<form method="post" action="<?php  $_SERVER['PHP_SELF']; ?>">
    <div class="table">
    <table width="45%" align="center">
        <tr>
            <td>Nome</td>
            <td><label for="id"></label>
                <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $id ?>></td>
        </tr>
        <tr>
            <td>Nome</td>
            <td><label for="nome"></label>
                <input type="text" name="nome" id="nome" value="<?php echo $nome ?>"></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><label for="email"></label>
                <input type="text" name="email" id="email" value="<?php echo $email?>"></td>
        </tr>

        <tr>
            <td>Telefone</td>
            <td><label for="telefone"></label>
                <input type="text" name="telefone" id="telefone" value="<?php echo $telefone?>"></td>
        </tr>
        <tr>
            <td>Observações</td>
            <td><label for="obs"></label>
            <input type="text" name="obs" id="obs" value="<?php echo $obs?>"> </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="atualizar"></td>
        </tr>
    </table>
    </div>
</form>
</body>
</html>