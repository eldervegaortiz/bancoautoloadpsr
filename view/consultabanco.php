<?php
namespace View;

class ConsultaBanco
{
    public function consultar()
    {
        echo '
        <h2>Sistema Bancario - Registro de Clientes</h2>
        <form method="post">

            <label for="tipo">Tipo de Cliente:</label><br>
            <select name="tipo" id="tipo" required>
                <option value="persona">Persona</option>
                <option value="empresa">Empresa</option>
            </select>
            <br><br>

            <label for="nombre">Nombres completos:</label><br>
            <input type="text" name="nombre" id="nombre" required>
            <br><br>

            <label for="identificacion">Cédula o NIT:</label><br>
            <input type="text" name="identificacion" id="identificacion" required>
            <br><br>

            <label for="edad">Edad :</label><br>
            <input type="number" name="edad" id="edad" min="0" value="0">
            <br><br>

            <label for="representante">Representante Legal (Solo si es Empresa):</label><br>
            <input type="text" name="representante" id="representante">
            <br><br>

            <input type="submit" name="registrar" value="Registrar en el Banco">

        </form>
        <hr>';
    }
}