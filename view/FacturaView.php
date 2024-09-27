<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Facturas</title>
</head>

<body>
    <h1>Gestión de Facturas</h1>
    <form action="/proyecto/controller/FacturaController.php" method="post">
        <input type="hidden" name="action" value="ingresar">
        Fecha: <input type="date" name="fecha" required><br>
        Número: <input type="text" name="numero" required><br>
        Total: <input type="number" step="0.01" name="total" required><br>
        <input type="submit" value="Ingresar">
    </form>
    <hr>
    <h2>Listado de Facturas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Número</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facturas as $factura): ?>
                <tr>
                    <td><?= $factura['fecha'] ?></td>
                    <td><?= $factura['numero'] ?></td>
                    <td><?= $factura['total'] ?></td>
                    <td>
                        <form action="/proyecto/controller/FacturaController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="borrar">
                            <input type="hidden" name="numero" value="<?= $factura['numero'] ?>">
                            <input type="submit" value="Borrar">
                        </form>
                        <form action="/proyecto/controller/FacturaController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="modificar">
                            <input type="hidden" name="numero" value="<?= $factura['numero'] ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>