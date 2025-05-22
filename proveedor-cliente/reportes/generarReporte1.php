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
            $sql = 'SELECT * FROM familia';
            $ps  = $cn->prepare($sql);
            $ps->execute();
            $filas = $ps->fetchAll();
        ?>
        <h1>Generar Reporte de Categorías</h1>
        <hr>
        <select name="cbxIdFam" id="cbxIdFam" onchange="enviarValor()">
            <option>Seleccione</option>
            <?php foreach ($filas as $f) { ?>
                <option value="<?= $f[0] ?>"><?= $f[1] ?></option>
            <?php } ?>
        </select>
        <br>
        <input type="submit" value="Generar Reporte">
    </div>
</body>
</html>
<script>
    function enviarValor(){
        let idFam = document.getElementById('cbxIdFam').value;
        console.log(idFam);
        window.location.href="reporte1.php?idFam="+idFam;
    }
</script>
