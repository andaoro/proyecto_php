<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
</head>

<body>
    <h1>Gestión de Clientes</h1>
    <form action="/proyecto/controller/ClienteController.php" method="post">
        <input type="hidden" name="action" value="ingresar">
        Código: <input type="text" name="codigo" required><br>
        Crédito: <input type="number" step="0.01" name="credito" required><br>
        <input type="submit" value="Ingresar">
    </form>
    <hr>
    <h2>Listado de Clientes</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Código</th>
                <th>Crédito</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente['codigo'] ?></td>
                    <td><?= $cliente['credito'] ?></td>
                    <td>
                        <form action="/proyecto/controller/ClienteController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="borrar">
                            <input type="hidden" name="codigo" value="<?= $cliente['codigo'] ?>">
                            <input type="submit" value="Borrar">
                        </form>
                        <form action="/proyecto/controller/ClienteController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="modificar">
                            <input type="hidden" name="codigo" value="<?= $cliente['codigo'] ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>