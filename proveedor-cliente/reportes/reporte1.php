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
            require '../conexion.php';
            $idFam = $_GET['idFam'];
            $sql='select * from categoria where idfamilia = :id';
            $ps=$cn->prepare($sql);
            $ps->bindParam(":id",$idFam);
            $ps->execute();
            $filas=$ps->fetchall();    
        ?>
        <h1>Listado de categorias</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>id familia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($filas as $f){
                ?>
                <tr>
                    <td><?=$f[0]?></td>
                    <td><?=$f[1]?></td>
                    <td><?=$f[2]?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>