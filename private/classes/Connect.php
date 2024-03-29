<?php
require_once('../private/config.php');

// class Connect handles DB connection, DB status and retreives DB data
class Connect
{
    public $conn_DB;
    public $sql_request;
    public $send_sql;
    public $sql_response;

    public function connectDB() {
        $this->conn_DB = mysqli_connect(SERVER, USER, PW, DB);
        if ($this->conn_DB) {
            return $this->conn_DB;
        } else {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
    }

    public function getStatus() {
        global $dbStatusNok;
        global $dbStatusOk;
    
        if (!$this->connectDB()) {
            $_SESSION['dbStatus'] = $dbStatusNok;       //not used in production
        } else {
            $_SESSION['dbStatus'] = $dbStatusOk;        //not used in production

            $this->sql_request = "SELECT id, name FROM users WHERE email = '$_SESSION[email]' AND pwhash = '$_SESSION[pwhash]'";
            $this->send_sql = $this->connectDB()->query($this->sql_request);
            $this->sql_response = $this->send_sql->fetch_all(MYSQLI_ASSOC);
            foreach ($this->sql_response as $key => $row) {
            $_SESSION['userID'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            }
            mysqli_close($this->connectDB());
        }
    }

    public function checkEmpty() {
        session_start();
        if (empty($_SESSION['pwhash'])) {
        header("Location: index.html");
        }
    }

    public function getData() {
        $this->sql_request = "SELECT * FROM attributes WHERE userID = '$_SESSION[userID]' ORDER BY name ASC";
        $this->send_sql = $this->connectDB()->query($this->sql_request);
        $this->sql_response = $this->send_sql->fetch_all(MYSQLI_ASSOC);

        echo "<li>Name: $_SESSION[name]</li>";
        echo "<li>Email: $_SESSION[email]</li>";
        foreach ($this->sql_response as $key => $row) {
        echo "<li>$row[name]: $row[value]</li>";
        mysqli_close($this->connectDB());
    }
    }
}
?>
