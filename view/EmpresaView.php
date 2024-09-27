<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Empresas</title>
</head>

<body>
    <h1>Gestión de Empresas</h1>
    <form action="/proyecto/controller/EmpresaController.php" method="post">
        <input type="hidden" name="action" value="ingresar">
        Código: <input type="text" name="codigo" required><br>
        Nombre: <input type="text" name="nombre" required><br>
        <input type="submit" value="Ingresar">
    </form>
    <hr>
    <h2>Listado de Empresas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empresas as $empresa): ?>
                <tr>
                    <td><?= $empresa['codigo'] ?></td>
                    <td><?= $empresa['nombre'] ?></td>
                    <td>
                        <form action="/proyecto/controller/EmpresaController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="borrar">
                            <input type="hidden" name="codigo" value="<?= $empresa['codigo'] ?>">
                            <input type="submit" value="Borrar">
                        </form>
                        <form action="/proyecto/controller/EmpresaController.php" method="post" style="display:inline">
                            <input type="hidden" name="action" value="modificar">
                            <input type="hidden" name="codigo" value="<?= $empresa['codigo'] ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>