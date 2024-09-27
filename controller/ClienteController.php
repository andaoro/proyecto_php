<?php
require_once(__DIR__ . '/../services/ClienteService.php');
$pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");

$service = new ClienteService($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'ingresar') {
        $service->ingresar($_POST['codigo'], $_POST['credito']);
    } elseif ($action === 'modificar') {
        $service->modificar($_POST['codigo'], $_POST['credito']);
    } elseif ($action === 'borrar') {
        $service->borrar($_POST['codigo']);
    }
    header("Location: ../index.php?page=cliente");
} else {
    $clientes = $service->consultar();
    include __DIR__ . '/../view/ClienteView.php';
}
