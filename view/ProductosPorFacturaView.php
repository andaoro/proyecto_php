<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Productos por Factura</title>
</head>

<body>
    <h1>Gestión de Productos por Factura</h1>
    <form action="/proyecto/controller/ProductosPorFacturaController.php" method="post">
        <input type="hidden" name="action" value="ingresar">
        Cantidad: <input type="number" name="cantidad" required><br>
        Subtotal: <input type="number" step="0.01" name="subtotal" required><br>
        <input type="submit" value="Ingresar">
    </form>
    <hr>
    <h2>Listado de Productos por Factura</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productosPorFactura as $productoPorFactura): ?>
                <tr>
                    <td><?= $productoPorFactura['cantidad'] ?></td>
                    <td><?= $productoPorFactura['subtotal'] ?></td>
                    <td>
                        <form action="/proyecto/controller/ProductosPorFacturaController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="borrar">
                            <input type="hidden" name="cantidad" value="<?= $productoPorFactura['cantidad'] ?>">
                            <input type="submit" value="Borrar">
                        </form>
                        <form action="/proyecto/controller/ProductosPorFacturaController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="modificar">
                            <input type="hidden" name="cantidad" value="<?= $productoPorFactura['cantidad'] ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>