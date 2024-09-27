<?php

require_once(__DIR__ . '/../services/PersonaService.php');
$pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");

if (!$pdo) {
    die("Connection failed: " . mysqli_connect_error());
}

$service = new PersonaService($pdo);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'ingresar') {
        $service->ingresar($_POST['codigo'], $_POST['email'], $_POST['nombre'], $_POST['telefono']);
    } elseif ($action === 'modificar') {
        $service->modificar($_POST['codigo'], $_POST['email'], $_POST['nombre'], $_POST['telefono']);
    } elseif ($action === 'borrar') {
        $service->borrar($_POST['codigo']);
    }
    header("Location: ../index.php?page=persona");
    exit();
} else {
    $personas = $service->consultar();
    include __DIR__ . '/../view/PersonaView.php';
}
