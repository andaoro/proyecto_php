<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión del Sistema</title>
    <link rel="stylesheet" href="styles.css"> <!-- Vincula el archivo CSS aquí -->
</head>

<body>

    <?php
    $action = $_REQUEST['action'] ?? 'index';
    $controller = $_REQUEST['page'] ?? '';

    switch ($controller) {
        case 'persona':
            require_once './controller/PersonaController.php';
            break;
        case 'cliente':
            require_once './controller/ClienteController.php';
            break;
        case 'vendedor':
            require_once './controller/VendedorController.php';
            break;
        case 'empresa':
            require_once './controller/EmpresaController.php';
            break;
        case 'producto':
            require_once './controller/ProductoController.php';
            break;
        case 'factura':
            require_once './controller/FacturaController.php';
            break;
        case 'productos_por_factura':
            require_once './controller/ProductosPorFacturaController.php';
            break;
        default:
            echo "
        <div class='container'>
            <h1>Bienvenido al sistema de gestión</h1>
            <div class='menu'>
                <a href='index.php?page=persona' class='button'>Gestionar Personas</a>
                <a href='index.php?page=cliente' class='button'>Gestionar Clientes</a>
                <a href='index.php?page=vendedor' class='button'>Gestionar Vendedores</a>
                <a href='index.php?page=empresa' class='button'>Gestionar Empresas</a>
                <a href='index.php?page=producto' class='button'>Gestionar Productos</a>
                <a href='index.php?page=factura' class='button'>Gestionar Facturas</a>
                <a href='index.php?page=productos_por_factura' class='button'>Gestionar Productos por Factura</a>
            </div>
        </div>";
            break;
    }
