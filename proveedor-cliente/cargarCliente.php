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
            $sql='select * from cliente';
            $ps=$cn->prepare($sql);
            $ps->execute();
            $filas=$ps->fetchall();    
        ?>
        <h1>Listado de Clientes</h1>
        <hr>
        <a href="guardarCliente.php">Crear Nuevo</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Celular</th>
                    <th>Direccion</th>
                    <th>ID Proveedor</th>

                    <th>Modificar</th>
                    <th>Borrar</th>
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
                    <td><?=$f[3]?></td>
                    <td><?=$f[4]?></td>
                    <td><?=$f[5]?></td>
                    <td><?=$f[6]?></td>

                    <td><a href="modificarCliente.php?idCli=<?=$f[0]?>">Modificar</a></td>
                    <td><a href="borrarCliente.php?idCli=<?=$f[0]?>">Borrar</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>