<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vendedores</title>
</head>

<body>
    <h1>Gestión de Vendedores</h1>
    <form action="/proyecto/controller/VendedorController.php" method="post">
        <input type="hidden" name="action" value="ingresar">
        Carné: <input type="text" name="carne" required><br>
        Dirección: <input type="text" name="direccion" required><br>
        <input type="submit" value="Ingresar">
    </form>
    <hr>
    <h2>Listado de Vendedores</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Carné</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendedores as $vendedor): ?>
                <tr>
                    <td><?= $vendedor['carne'] ?></td>
                    <td><?= $vendedor['direccion'] ?></td>
                    <td>
                        <form action="/proyecto/controller/VendedorController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="borrar">
                            <input type="hidden" name="carne" value="<?= $vendedor['carne'] ?>">
                            <input type="submit" value="Borrar">
                        </form>
                        <form action="/proyecto/controller/VendedorController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="modificar">
                            <input type="hidden" name="carne" value="<?= $vendedor['carne'] ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>