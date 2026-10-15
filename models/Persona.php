<?php
namespace Models;

class Persona extends Cliente
{
    private string $cedula;
    private int $edad;

    public function __construct(string $cedula, string $nombre, int $edad)
    {
        parent::__construct($nombre);
        $this->cedula = $cedula;
        $this->edad = $edad;
    }

    public function obtIdentificacion(): string
    {
        return $this->cedula;
    }

    public function obtEdad(): int
    {
        return $this->edad;
    }

    public function cumplirAnios(): void
    {
        $this->edad++;
    }
}