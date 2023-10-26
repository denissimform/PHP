<?php

class UserView extends User
{
    public function __construct()
    {
        parent::__construct();
    }

    // return user details in html table form
    public function userDetails()
    {
        $output = '
        <div class="w-50 m-auto">
            <a type="submit" class="btn btn-success w-100" href="./Component/Export.php">Export</a>
        </div>
        <table class="table w-50 m-auto text-center">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                    </tr>
                </thead>
                <tbody>';

        // get all user data from user class
        foreach ($this->getAllUser() as $user) {
            $output .= "
                <tr>
                    <td>{$user['id']}</td>
                    <td>{$user['name']}</td>
                    <td>{$user['age']}</td>
                </tr>";
        }

        $output .= '</tbody></table>';

        // return html code  
        echo $output;
    }

    // return alert pop up html code
    private function getAlert($message, $error): string
    {
        return "
            <div class='alert alert-" . ($error ? "danger" : "success") . " alert-dismissible fade show rounded-0 text-center' role='alert'>
                <strong>" . ($error ? "Error" : "Success") . "!</strong> $message
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        ";
    }

    // insert the user data into database
    public function insertData($name, $age)
    {
        $res = $this->insert($name, $age);
        if ($res['success']) {
            echo $this->getAlert($res['message'], false);
        } else {
            echo $this->getAlert($res['message'], true);
        }
    }

    // import csv file data
    public function importCSVData($file)
    {
        $res = $this->importCSV($file);
        if ($res['success']) {
            echo $this->getAlert($res['message'], false);
        } else {
            echo $this->getAlert($res['message'], true);
        }
    }

    public function exportCSVFile()
    {
        $res = $this->exportCSV();
        echo $res;
    }
}
