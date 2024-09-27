<?php
require_once(__DIR__ . '/../services/VendedorService.php');
$pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");

$service = new VendedorService($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'ingresar') {
        $service->ingresar($_POST['carne'], $_POST['direccion']);
    } elseif ($action === 'modificar') {
        $service->modificar($_POST['carne'], $_POST['direccion']);
    } elseif ($action === 'borrar') {
        $service->borrar($_POST['carne']);
    }
    header("Location: ../index.php?page=vendedor");
} else {
    $vendedores = $service->consultar();
    include __DIR__ . '/../view/VendedorView.php';
}
