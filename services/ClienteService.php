<?php
// ClienteService.php
class ClienteService
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function ingresar($codigo, $credito)
    {
        $sql = "INSERT INTO Cliente (codigo, credito) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$codigo, $credito]);
    }

    public function consultar()
    {
        $sql = "SELECT * FROM Cliente";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificar($codigo, $credito)
    {
        $sql = "UPDATE Cliente SET credito = ? WHERE codigo = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$credito, $codigo]);
    }

    public function borrar($codigo)
    {
        $sql = "DELETE FROM Cliente WHERE codigo = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$codigo]);
    }
}
