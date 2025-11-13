<?php
class Database {
    // Use environment variables when available (for Vercel or other hosts)
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $conn;

    public function getConnection() {
        $this->conn = null;
        // Load from environment, with local fallbacks for development
        $this->host = getenv('DB_HOST') !== false ? getenv('DB_HOST') : 'localhost';
        $this->db_name = getenv('DB_NAME') !== false ? getenv('DB_NAME') : 'concesionario_db';
        $this->username = getenv('DB_USER') !== false ? getenv('DB_USER') : 'root';
        $this->password = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '12345';

        // If running in an environment without a reachable DB, return null and
        // let the controller handle the missing connection gracefully.
        try {
            if (!class_exists('PDO')) {
                error_log('PDO extension not available in this PHP runtime.');
                return null;
            }

            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            // Don't echo errors to users on serverless hosts; log them instead.
            error_log('Database connection error: ' . $exception->getMessage());
            $this->conn = null;
        }

        return $this->conn;
    }
}
?>