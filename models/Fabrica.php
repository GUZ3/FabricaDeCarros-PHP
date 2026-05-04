<?php

require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Carro.php';

class Fabrica
{
    public function fabricar($modelo, $cor)
    {
        $conn = Database::connect();
        $stmt = $conn->prepare('INSERT INTO carros (modelo, cor) VALUES (?, ?)');
        $stmt->bind_param('ss', $modelo, $cor);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function vender($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $conn = Database::connect();
        $stmt = $conn->prepare('DELETE FROM carros WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $deleted = $stmt->affected_rows > 0;
        $stmt->close();
        $conn->close();

        return $deleted;
    }

    public function listar()
    {
        $conn = Database::connect();
        $result = $conn->query('SELECT id, modelo, cor FROM carros ORDER BY id ASC');

        $carros = [];
        while ($row = $result->fetch_assoc()) {
            $carros[] = new Carro($row['modelo'], $row['cor'], $row['id']);
        }

        $result->free();
        $conn->close();

        return $carros;
    }
}
