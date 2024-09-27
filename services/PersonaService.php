<?php
class PersonaService
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function ingresar($codigo, $email, $nombre, $telefono)
    {
        $sql = "INSERT INTO Persona (codigo, email, nombre, telefono) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$codigo, $email, $nombre, $telefono]);
    }

    public function consultar()
    {
        $sql = "SELECT * FROM Persona";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificar($codigo, $email, $nombre, $telefono)
    {
        $sql = "UPDATE Persona SET email = ?, nombre = ?, telefono = ? WHERE codigo = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$email, $nombre, $telefono, $codigo]);
    }

    public function borrar($codigo)
    {
        $sql = "DELETE FROM Persona WHERE codigo = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$codigo]);
    }
}
