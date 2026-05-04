<?php

class Database
{
    public static function connect()
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'fabricadecarros';

        $conn = new mysqli($host, $user, $password, $database);

        if ($conn->connect_errno) {
            throw new Exception('Falha na conexão com o banco de dados: ' . $conn->connect_error);
        }

        $conn->set_charset('utf8mb4');
        return $conn;
    }
}
