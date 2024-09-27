<?php
require_once(__DIR__ . '/../services/EmpresaService.php');
$pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");

$service = new EmpresaService($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'ingresar') {
        $service->ingresar($_POST['codigo'], $_POST['nombre']);
    } elseif ($action === 'modificar') {
        $service->modificar($_POST['codigo'], $_POST['nombre']);
    } elseif ($action === 'borrar') {
        $service->borrar($_POST['codigo']);
    }
    header("Location: ../index.php?page=empresa");
} else {
    $empresas = $service->consultar();
    include __DIR__ . '/../view/EmpresaView.php';
}
