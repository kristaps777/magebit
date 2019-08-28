<?php
require_once('Connect.php');

class Register extends Connect
{
    public $pwHash;
    public $userName;
    public $userEmail;
    public $sql_stmt;

    public function registerUser() {
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

             if (isset($_POST['password'])) {
                $this->pwHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_SESSION['pwhash'] = $this->pwHash;
        };

            if (isset($_POST['email'])) $this->userEmail = mysqli_real_escape_string(parent::connectDB(), $_REQUEST['email']);
            if (isset($_POST['name'])) {
                $this->userName = mysqli_real_escape_string(parent::connectDB(), $_REQUEST['name']);
                $_SESSION['name'] = $this->userName;
        };

            $this->sql_stmt = parent::connectDB()->prepare("INSERT INTO users (name, email, pwhash) VALUES (?, ?, ?)");
            $this->sql_stmt->bind_param("sss", $this->userName, $this->userEmail, $this->pwHash);

            $this->sql_stmt->execute();
            parent::connectDB()->close();
        }
        header("Location: ../public/display.php");
    }
}
?>
