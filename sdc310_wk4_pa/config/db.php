<!--------------
Gaby Malaka
5.2.2026
SDC 310 WK 4 PA
--------------->
<?php
class Database {
    private $host = "localhost";
    private $dbname = "sdc310_wk4pa";
    private $username = "ecpi_user";
    private $password = "Password1";

    public function connect() {
        try {
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->username,
                $this->password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
?>