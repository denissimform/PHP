<?php

class User extends Denis
{
    public $conn;

    protected function __construct()
    {
        // create connection data 
        parent::__construct("localhost", "denis", "Denis@123", "PHP");
        $this->conn = $this->connect();
    }

    // get all data from user table 
    protected function getAllUser()
    {
        $sql = "SELECT * FROM user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // insert single entry into the table
    protected function insert($name, $age)
    {
        $sql = "INSERT INTO `user` (name, age) VALUES(?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute([$name, $age])) {
            return ["success" => true, "message" => "Data inserted"];
        } else {
            return ["success" => false, "message" => "Somthing went wrong {$this->conn->errorCode()}"];
        }
    }

    // insert csv data into table
    protected function importCSV($file)
    {
        $fileName = $file['csv_file']['tmp_name'];
        $f = fopen($fileName, 'r');

        // start transaction for insert multiple column in database
        $this->conn->beginTransaction();

        // insert the value line by line
        $data = fgetcsv($f);

        while (!feof($f)) {
            $res = $this->insert($data[0], $data[1]);

            if (!$res['success']) {
                // rollabck transaction if some thing went wrong
                $this->conn->rollBack();
                return $res;
            }
            $data = fgetcsv($f);
        }

        // after successfully insert whole csv file into the database
        $this->conn->commit();
        return $res;
    }

    // export csv file
    protected function exportCSV()
    {
        $output = "";
        foreach ($this->getAllUser() as $user) {
            $output .= "{$user['name']},{$user['age']}\n";
        }
        return $output;
    }
}
