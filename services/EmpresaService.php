<?php
// EmpresaService.php
class EmpresaService
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function ingresar($codigo, $nombre)
    {
        $sql = "INSERT INTO Empresa (codigo, nombre) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$codigo, $nombre]);
    }

    public function consultar()
    {
        $sql = "SELECT * FROM Empresa";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificar($codigo, $nombre)
    {
        $sql = "UPDATE Empresa SET nombre = ? WHERE codigo = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $codigo]);
    }

    public function borrar($codigo)
    {
        $sql = "DELETE FROM Empresa WHERE codigo = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$codigo]);
    }
}
