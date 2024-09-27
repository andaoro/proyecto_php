<?php
abstract class Persona
{
    protected $codigo;
    protected $email;
    protected $nombre;
    protected $telefono;

    public function __construct($codigo, $email, $nombre, $telefono)
    {
        $this->codigo = $codigo;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
    }

    abstract public function mostrarInformacion();

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
}
