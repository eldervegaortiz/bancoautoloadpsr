<?php
namespace Controller;

use Models\Banco;
use Models\Persona;
use Models\Empresa;
use View\VisualizarBanco;

class ControladorBanco
{
    private $vista;

    public function __construct(VisualizarBanco $vista)
    {
        $this->vista = $vista;
    }

    public function desarrollar()
    {
        $banco = new Banco("Banco Nacional de Santander");

        // Datos de prueba iniciales según el diagrama
        $banco->adCliente(new Persona("10982341", "Ana María Pérez", 25));
        $banco->adCliente(new Persona("10989988", "Mateo Gómez", 16)); // Menor de edad
        $banco->adCliente(new Empresa("900123456-1", "Tecnología S.A.S.", "Carlos Ruiz"));

        if (isset($_POST["registrar"])) {
            $tipo = $_POST["tipo"] ?? 'persona';
            $nombre = $_POST["nombre"] ?? '';
            $identificacion = $_POST["identificacion"] ?? '';
            $edad = (int)($_POST["edad"] ?? 0);
            $representante = $_POST["representante"] ?? '';

            if (!empty($nombre) && !empty($identificacion)) {
                if ($tipo === "empresa") {
                    $cliente = new Empresa($identificacion, $nombre, $representante);
                } else {
                    $cliente = new Persona($identificacion, $nombre, $edad);
                }
                $banco->adCliente($cliente);
            }
        }

        $this->vista->mostrartitulo("PANEL DE GESTIÓN BANCARIA - UML");
        $this->vista->mostrarReporte($banco);
    }
}