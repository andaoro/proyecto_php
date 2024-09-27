<?php
require_once 'Persona.php';

class Cliente extends Persona
{
    private $credito;

    public function __construct($codigo, $email, $nombre, $telefono, $credito)
    {
        parent::__construct($codigo, $email, $nombre, $telefono);
        $this->credito = $credito;
    }

    public function getCredito()
    {
        return $this->credito;
    }

    public function setCredito($credito)
    {
        $this->credito = $credito;
    }

    public function mostrarInformacion()
    {
        echo "Cliente: " . $this->nombre . " con crédito: " . $this->credito;
    }
}
