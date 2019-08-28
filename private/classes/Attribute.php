<?php
require_once('Connect.php');

// class Attribute handles adding new attributes
class Attribute extends Connect
{
    public $attributeName;
    public $attributeValue;
    public $userID;
    public $sql_stmt;


     public function addAttribute() {
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['attr_name']) && !empty($_POST['attr_value'])) {

            $this->attributeName = mysqli_real_escape_string(parent::connectDB(), $_REQUEST['attr_name']);
            $this->attributeValue = mysqli_real_escape_string(parent::connectDB(), $_REQUEST['attr_value']);
            $this->userID = mysqli_real_escape_string(parent::connectDB(), $_SESSION['userID']);
            $this->sql_stmt = parent::connectDB()->prepare("INSERT INTO attributes (name, value, userID) VALUES (?, ?, ?)");
            $this->sql_stmt->bind_param("sss", $this->attributeName, $this->attributeValue, $this->userID);

            $this->sql_stmt->execute();
            parent::connectDB()->close();
        }
         header("Location: ../public/display.php");
     }

}

?>
