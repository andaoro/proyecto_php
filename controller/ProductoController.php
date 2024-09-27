<?php
require_once(__DIR__ . '/../services/ProductoService.php');
$pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");

$service = new ProductoService($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'ingresar') {
        $service->ingresar($_POST['codigo'], $_POST['nombre'], $_POST['stock'], $_POST['valorUnitario']);
    } elseif ($action === 'modificar') {
        $service->modificar($_POST['codigo'], $_POST['nombre'], $_POST['stock'], $_POST['valorUnitario']);
    } elseif ($action === 'borrar') {
        $service->borrar($_POST['codigo']);
    }
    header("Location: ../index.php?page=producto");
} else {
    $productos = $service->consultar();
    include  __DIR__ . '/../view/ProductoView.php';
}
