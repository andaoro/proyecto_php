<?php
// VendedorService.php
class VendedorService
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function ingresar($carne, $direccion)
    {
        $sql = "INSERT INTO Vendedor (carne, direccion) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$carne, $direccion]);
    }

    public function consultar()
    {
        $sql = "SELECT * FROM Vendedor";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificar($carne, $direccion)
    {
        $sql = "UPDATE Vendedor SET direccion = ? WHERE carne = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$direccion, $carne]);
    }

    public function borrar($carne)
    {
        $sql = "DELETE FROM Vendedor WHERE carne = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$carne]);
    }
}
