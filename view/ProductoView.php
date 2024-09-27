<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>

<body>
    <h1>Gestión de Productos</h1>
    <form action="/proyecto/controller/ProductoController.php" method="post">
        <input type="hidden" name="action" value="ingresar">
        Código: <input type="text" name="codigo" required><br>
        Nombre: <input type="text" name="nombre" required><br>
        Stock: <input type="number" name="stock" required><br>
        Valor Unitario: <input type="number" step="0.01" name="valorUnitario" required><br>
        <input type="submit" value="Ingresar">
    </form>
    <hr>
    <h2>Listado de Productos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Valor Unitario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['codigo'] ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['stock'] ?></td>
                    <td><?= $producto['valorUnitario'] ?></td>
                    <td>
                        <form action="/proyecto/controller/ProductoController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="borrar">
                            <input type="hidden" name="codigo" value="<?= $producto['codigo'] ?>">
                            <input type="submit" value="Borrar">
                        </form>
                        <form action="/proyecto/controller/ProductoController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="modificar">
                            <input type="hidden" name="codigo" value="<?= $producto['codigo'] ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>