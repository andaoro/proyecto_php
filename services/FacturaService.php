<?php
// FacturaService.php
class FacturaService
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function ingresar($fecha, $numero, $total)
    {
        $sql = "INSERT INTO Factura (fecha, numero, total) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$fecha, $numero, $total]);
    }

    public function consultar()
    {
        $sql = "SELECT * FROM Factura";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificar($fecha, $numero, $total)
    {
        $sql = "UPDATE Factura SET fecha = ?, total = ? WHERE numero = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$fecha, $total, $numero]);
    }

    public function borrar($numero)
    {
        $sql = "DELETE FROM Factura WHERE numero = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$numero]);
    }
}
