<?php
namespace Models;

abstract class Cliente
{
    protected string $nombre;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function obtNombre(): string
    {
        return $this->nombre;
    }

    public function cambiarNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    abstract public function obtIdentificacion(): string;
}