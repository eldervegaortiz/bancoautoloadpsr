<?php
namespace View;

use Models\Banco;
use Models\Persona;
use Models\Empresa;

class VisualizarBanco
{
    public function mostrarReporte(Banco $banco)
    {
        echo "<h3>Reportes del Banco: " . $banco->obtNombre() . "</h3>";
        echo "<p><strong>Total de clientes registrados:</strong> " . $banco->obtNumClientes() . "</p>";
        echo "<hr>";

        // 1. Todos los nombres de los clientes
        echo "<h4>1. Nombres de todos los clientes:</h4><ul>";
        foreach ($banco->obtClientes() as $cliente) {
            echo "<li>" . $cliente->obtNombre() . "</li>";
        }
        echo "</ul>";

        // 2. Nombres y cédulas de las personas clientes
        echo "<h4>2. Nombres y cédulas de clientes Persona:</h4><ul>";
        foreach ($banco->obtClientes() as $cliente) {
            if ($cliente instanceof Persona) {
                echo "<li>Nombre: " . $cliente->obtNombre() . " - Cédula: " . $cliente->obtIdentificacion() . "</li>";
            }
        }
        echo "</ul>";

        // 3. Nombre y representante de cada empresa
        echo "<h4>3. Nombre y representante de cada Empresa:</h4><ul>";
        foreach ($banco->obtClientes() as $cliente) {
            if ($cliente instanceof Empresa) {
                echo "<li>Empresa: " . $cliente->obtNombre() . " - Representante: " . $cliente->obtRepresentante() . " (NIT: " . $cliente->obtIdentificacion() . ")</li>";
            }
        }
        echo "</ul>";

        // 4. Nombres de los clientes menores de edad (< 18)
        echo "<h4>4. Clientes menores de edad:</h4><ul>";
        $hayMenores = false;
        foreach ($banco->obtClientes() as $cliente) {
            if ($cliente instanceof Persona && $cliente->obtEdad() < 18) {
                echo "<li>" . $cliente->obtNombre() . " (" . $cliente->obtEdad() . " años)</li>";
                $hayMenores = true;
            }
        }
        if (!$hayMenores) echo "<li>No hay menores de edad registrados.</li>";
        echo "</ul>";

        // 5. Cliente más joven y Cliente más viejo
        $masJoven = null;
        $masViejo = null;
        foreach ($banco->obtClientes() as $cliente) {
            if ($cliente instanceof Persona) {
                if ($masJoven === null || $cliente->obtEdad() < $masJoven->obtEdad()) {
                    $masJoven = $cliente;
                }
                if ($masViejo === null || $cliente->obtEdad() > $masViejo->obtEdad()) {
                    $masViejo = $cliente;
                }
            }
        }

        echo "<h4>5. Estadísticas de Edades:</h4>";
        if ($masJoven) {
            echo "<p><strong>Cliente más joven:</strong> " . $masJoven->obtNombre() . " con " . $masJoven->obtEdad() . " años.</p>";
        }
        if ($masViejo) {
            echo "<p><strong>Cliente más viejo:</strong> " . $masViejo->obtNombre() . " con " . $masViejo->obtEdad() . " años.</p>";
        }
    }

    public function mostrartitulo($titulo)
    {
        echo "<h2>== {$titulo} ==</h2>";
    }
}