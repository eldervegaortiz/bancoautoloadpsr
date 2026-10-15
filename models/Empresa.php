<?php
namespace Models;

class Empresa extends Cliente
{
    private string $nit;
    private string $representante;

    public function __construct(string $nit, string $nombre, string $representante)
    {
        parent::__construct($nombre);
        $this->nit = $nit;
        $this->representante = $representante;
    }

    public function obtIdentificacion(): string
    {
        return $this->nit;
    }

    public function obtRepresentante(): string
    {
        return $this->representante;
    }

    public function cambiarRepres(string $repres): void
    {
        $this->representante = $repres;
    }
}