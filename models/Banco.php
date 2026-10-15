<?php
namespace Models;

class Banco
{
    private string $nombre;
    private array $clientes = [];
    private int $numeroDeClientes = 0;

    public function __construct(string $nom)
    {
        $this->nombre = $nom;
    }

    public function obtNombre(): string
    {
        return $this->nombre;
    }

    public function cambiarNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function adCliente(Cliente $clie): void
    {
        $this->clientes[] = $clie;
        $this->numeroDeClientes++;
    }

    public function obtNumClientes(): int
    {
        return $this->numeroDeClientes;
    }

    public function obtCliente(int $posicion): ?Cliente
    {
        return $this->clientes[$posicion] ?? null;
    }

    public function obtClientes(): array
    {
        return $this->clientes;
    }
}