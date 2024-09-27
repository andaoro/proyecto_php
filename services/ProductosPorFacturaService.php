<?php
// ProductosPorFacturaService.php
class ProductosPorFacturaService
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function ingresar($cantidad, $subtotal)
    {
        $sql = "INSERT INTO ProductosPorFactura (cantidad, subtotal) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$cantidad, $subtotal]);
    }

    public function consultar()
    {
        $sql = "SELECT * FROM ProductosPorFactura";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificar($cantidad, $subtotal)
    {
        $sql = "UPDATE ProductosPorFactura SET subtotal = ? WHERE cantidad = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$subtotal, $cantidad]);
    }

    public function borrar($cantidad)
    {
        $sql = "DELETE FROM ProductosPorFactura WHERE cantidad = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$cantidad]);
    }
}
