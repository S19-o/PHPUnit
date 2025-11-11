<?php
    namespace App;
    use PDO;
    use PDOException;
    class Database {
        private static ?PDO $pdo = null;

        public static function getConnetion():PDO {
            if(self::$pdo == null) {
                $host = '127.0.0.1';
                $db = 'stock_db';
                $user = 'root';
                $pass = '';
                $charset = 'utf8mb4';

                $dsn = "mysql:host=$host:dbname=$db:charset=$charset";

                try {
                    self:$pdo = new PDO($dsn, $user, $pass, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]);
                } catch (PDOException $e) {
                    die("Erreur de connexion :" . $e->getMessage());
                }
            }
            return self::$pdo;
        }
    }