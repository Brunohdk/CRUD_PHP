<?php

    include 'conn.php';

    $registro = $conn->query("SELECT * FROM agendass")->fetchAll(PDO::FETCH_OBJ);

    if(isset($_POST['cadastrar'])){

        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $nascimento=$_POST['nascimento'];
        $telefone=$_POST['telefone'];
        $obs=$_POST['obs'];

        $sql = ("INSERT INTO agendass (nome, email, telefone, obs) VALUES 
                (:nome, :email, :telefone, :obs)");
        $resultado = $conn->prepare($sql);
        $resultado->execute(array(":nome"=>$nome, ":email"=>$email,
            ":telefone"=>$telefone, ":obs"=>$obs));
        header("Location:index.php");
    }

    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>TESTE</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"">
    <link rel="stylesheet" type="text/css" href="meu.css"
</head>
<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <fieldset id="add">
        <legend>Adicionar Contato</legend>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Inserir nome" required/>
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="Inserir e-mail"/>
        </div>
        <div>
            Telefone:
            <input type="number" name="telefone" placeholder="Inserir telefone" required/>
        </div>
        <div>
            Observações:
            <input type="text" name="obs" placeholder="Inserir observações" />
        </div>
        <div>
            <br/><input type="submit" value="Adicionar" name="cadastrar">
        </div>
    </fieldset>
</form>

<div class="table" id="info">
    <table width="40%" align="center" >
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>E-mail</td>
            <td>Telefone</td>
            <td>Observações</td>
        </tr>
        <?php

        foreach ($registro as $pessoa):

        ?>
        <tr>
            <td><?php echo $pessoa->usuario_id?></td>
            <td><?php echo $pessoa->nome?></td>
            <td><?php echo $pessoa->email?></td>
            <td><?php echo $pessoa->telefone?></td>
            <td><?php echo $pessoa->obs?></td>

            <td><a href="deletar.php?usuario_id=<?php echo $pessoa->usuario_id?>"> <input type="button" value="Deletar"></a</td>

            <td><a href="editar.php?usuario_id=<?php echo $pessoa->usuario_id?> &
nome=<?php echo $pessoa->nome?> & email=<?php echo $pessoa->email?> & telefone=<?php echo $pessoa->telefone?> &
 obs=<?php echo $pessoa->obs?>"><input type="button" value="Editar"></a></td>
        </tr>
        <?php
        endforeach;
        ?>
</body>
</html>