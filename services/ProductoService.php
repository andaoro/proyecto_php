<?php
// ProductoService.php
class ProductoService
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function ingresar($codigo, $nombre, $stock, $valorUnitario)
    {
        $sql = "INSERT INTO Producto (codigo, nombre, stock, valorUnitario) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$codigo, $nombre, $stock, $valorUnitario]);
    }

    public function consultar()
    {
        $sql = "SELECT * FROM Producto";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificar($codigo, $nombre, $stock, $valorUnitario)
    {
        $sql = "UPDATE Producto SET nombre = ?, stock = ?, valorUnitario = ? WHERE codigo = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $stock, $valorUnitario, $codigo]);
    }

    public function borrar($codigo)
    {
        $sql = "DELETE FROM Producto WHERE codigo = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$codigo]);
    }
}
