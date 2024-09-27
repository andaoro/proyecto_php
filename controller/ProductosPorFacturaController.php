<?php
require_once(__DIR__ . '/../services/ProductosPorFacturaService.php');
$pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");

$service = new ProductosPorFacturaService($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'ingresar') {
        $service->ingresar($_POST['cantidad'], $_POST['subtotal']);
    } elseif ($action === 'modificar') {
        $service->modificar($_POST['cantidad'], $_POST['subtotal']);
    } elseif ($action === 'borrar') {
        $service->borrar($_POST['cantidad']);
    }
    header("Location: ../index.php?page=productos_por_factura");
} else {
    $productosPorFactura = $service->consultar();
    include __DIR__ . '/../view/ProductosPorFacturaView.php';
}
