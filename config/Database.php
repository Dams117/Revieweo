<?php

class Database {
    private static ?PDO $instance = null;

    // Le Singleton pour ton code à toi
    public static function getInstance(): PDO {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    'mysql:host=localhost;dbname=revieweo;charset=utf8',
                    'root',
                    '', // Ton mot de passe XAMPP (vide par défaut)
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            } catch (PDOException $e) {
                die('Erreur de connexion : ' . $e->getMessage());
            }
        }
        return self::$instance;
    }

    // La fonction de compatibilité pour tes camarades
    public function getConnection() {
        return self::getInstance();
    }
}