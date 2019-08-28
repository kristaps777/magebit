<?php
require_once('Connect.php');

// class Register handles user registration
class Register extends Connect
{
    public $pwHash;
    public $userName;
    public $userEmail;
    public $sql_stmt;
    public $sql_response;
    public $sql_row;

    public function registerUser() {
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !$this->checkEmail()) {

             if (isset($_POST['password'])) {
                $this->pwHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_SESSION['pwhash'] = $this->pwHash;
        };

            if (isset($_POST['email'])) {
                $this->userEmail = mysqli_real_escape_string(parent::connectDB(), $_REQUEST['email']);
                 $_SESSION['email'] = $this->userEmail;

            };
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

    public function checkEmail() {
        if (isset($_POST['email'])) {
                $this->userEmail = mysqli_real_escape_string(parent::connectDB(), $_REQUEST['email']);

                $this->sql_stmt = parent::connectDB()->prepare("SELECT id, name, pwhash FROM users WHERE email = ?");
                $this->sql_stmt->bind_param("s", $this->userEmail);
                $this->sql_stmt->execute();
                $this->sql_response = $this->sql_stmt->get_result();
                parent::connectDB()->close();

                $this->sql_row = $this->sql_response->fetch_assoc();

                if ($this->sql_response->num_rows >= 1) {
                    return true;
                    } else {
                    return false;
                    }
            }

    }
}
?>
