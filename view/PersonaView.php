<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Personas</title>
</head>

<body>
    <h1>Gestión de Personas</h1>
    <form action="/proyecto/controller/PersonaController.php" method="POST">
        <input type="hidden" name="action" value="ingresar">
        Código: <input type="text" name="codigo" required><br>
        Email: <input type="email" name="email" required><br>
        Nombre: <input type="text" name="nombre" required><br>
        Teléfono: <input type="text" name="telefono" required><br>
        <input type="submit" value="Ingresar">
    </form>
    <hr>
    <h2>Listado de Personas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Código</th>
                <th>Email</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $persona): ?>
                <tr>
                    <td><?= $persona['codigo'] ?></td>
                    <td><?= $persona['email'] ?></td>
                    <td><?= $persona['nombre'] ?></td>
                    <td><?= $persona['telefono'] ?></td>
                    <td>
                        <form action="/proyecto/controller/PersonaController.php" method="POST" style="display:inline">
                            <input type="hidden" name="action" value="borrar">
                            <input type="hidden" name="codigo" value="<?= $persona['codigo'] ?>">
                            <input type="submit" value="Borrar">
                        </form>
                        <form action="/proyecto/controller/PersonaController.php" method="POST" style="display:inline">
                            <input type="hidden" name="action" value="modificar">
                            <input type="hidden" name="codigo" value="<?= $persona['codigo'] ?>">
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>