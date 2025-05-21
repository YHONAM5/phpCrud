<?php
    require 'conexion.php';
    $idfam=$_GET['idCli'];
    $sql="delete from cliente where idcliente=:id";
    $ps=$cn->prepare($sql);
    $ps->bindParam(":id",$idfam);
    $ps->execute();
    header('Location: cargarCliente.php');
?>