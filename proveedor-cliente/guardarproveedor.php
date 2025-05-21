
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Módulo de inserción</h1>
        <hr>
        <form action="" method="post">
            Ingrese Nombre del Proveedor<br>
            <input type="text" name="txtNom"> <br>
            Ingrese RUC PRoveedor <br>
            <input type="text" name="txtDes"> <br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
<?php
    require 'conexion.php';
    if($_POST){
        $nom=$_POST['txtNom'];
        $des=$_POST['txtDes'];
        $sql="insert into proveedor (nombre,ruc) values (:nom, :des)";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":nom",$nom);
        $ps->bindParam(":des",$des);
        $ps->execute();
        header('Location: cargarProveedor.php');
    }
?>