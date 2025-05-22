<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.7.1.min.js"></script>
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
        <div id="res">

        </div>
    </div>
</body>
</html>
<script>
    function enviarValor(){
        idFam = $('#cbxIdFam').val();
        param = {'idFam':idFam};
        $.ajax({
            data: param,
            url:'reporte1.php',
            type: 'get',
            success:function(res){
                //alert(res);
                $('#res').html(res);
            }
        });
    }
</script>
