<?php
class Denis extends PDOException
{
    private $dbname, $hostname, $password, $username;

    // set the value for connection 
    protected function __construct($hostname, $username, $password, $dbname)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    // set the connection for operation
    // return PDO connection
    protected function connect()
    {
        // Exception handling for PDO
        try {
            $dsn = "mysql:host=" . $this->hostname . ";dbname=" . $this->dbname . ";";
            $conn = new PDO($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "at Line " . $e->getLine() . "<br>";
        }
    }
}
