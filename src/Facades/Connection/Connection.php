<?php

namespace Farhanisty\Vetran\Facades\Connection;

class Connection
{
    private static ?\PDO $instance = null;

    public static function getInstance(): ?\PDO
    {
        if (!self::$instance) {
            $dbengine = $_ENV['DB_ENGINE'];
            $dbname = $_ENV['DB_NAME'];
            $dbhost = $_ENV['DB_HOST'];
            $dbport = $_ENV['DB_PORT'];
            $username = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];

            $dsn = $dbengine . ':host=' . $dbhost . ';dbname=' . $dbname . ';port=' . $dbport;

            self::$instance = new \PDO(dsn: $dsn, username: $username, password: $password);
        }

        return self::$instance;
    }
}
