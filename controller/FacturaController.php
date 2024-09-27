<?php
require_once(__DIR__ . '/../services/FacturaService.php');
$pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");

$service = new FacturaService($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'ingresar') {
        $service->ingresar($_POST['fecha'], $_POST['numero'], $_POST['total']);
    } elseif ($action === 'modificar') {
        $service->modificar($_POST['fecha'], $_POST['numero'], $_POST['total']);
    } elseif ($action === 'borrar') {
        $service->borrar($_POST['numero']);
    }
    header("Location: ../index.php?page=factura");
} else {
    $facturas = $service->consultar();
    include __DIR__ . '/../view/FacturaView.php';
}
