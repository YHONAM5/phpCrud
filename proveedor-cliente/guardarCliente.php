<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            require 'conexion.php';
            $sql = 'select * from proveedor';
            $ps  = $cn ->prepare ($sql);
            $ps -> execute();
            $filas = $ps -> fetchAll();
        ?>
        <h1>Inserción de Clientes</h1>
        <hr>
        <form action="" method="post">
            Nombres <br>
            <input type="text" name="txtNom"> <br>
            Apellidos <br>
            <input type="text" name="txtApe"> <br>
            DNI <br>
            <input type="text" name="txtDni"> <br>
            Celular <br>
            <input type="text" name="txtCel"> <br>
            Direccion <br>
            <input type="text" name="txtDir"> <br>
            Proveedor <br>
            <select name="cbxIdProve">
                <option>Seleccione</option>
                <?php
                    foreach($filas as $f){
                ?>
                <option value="<?=$f[0]?>"><?=$f[1]?></option>
                <?php
                    }
                ?>
            </select>
            <br>
            <input type="submit" value="Guardar">
        </form>
</div>
</body>
</html>
<?php
    if($_POST){
        $nombre = $_POST['txtNom'];
        $apellido = $_POST['txtApe'];
        $dni = $_POST['txtDni'];
        $celular = $_POST['txtCel'];
        $direccion = $_POST['txtdic'];
        $idrpvedor = $_POST['cbxIdProve'];
        $sql = 'insert into cliente (nombres,apellidos,dni,celular,direccion,idproveedor) values (:nom,:ape,:dni,:cel,:dir,:id)';
        $ps = $cn -> prepare($sql);
        $ps -> bindParam(":nom", $nombre);
        $ps -> bindParam(":ape", $apellido);
        $ps -> bindParam(":dni", $dni);
        $ps -> bindParam(":cel", $celular);
        $ps -> bindParam(":dir", $direccion);
        $ps -> bindParam(":id", $idrpvedor);
        $ps -> execute();
        header('Location: cargarCliente.php');
    }
?>