<?php

    include 'conn.php';

    $id = $_GET['usuario_id'];

    $conn->query("DELETE FROM agendass WHERE USUARIO_ID='$id'");
    header("Location:index.php");
    ?>