<?php

class Account {

    private $errorArray;
    private $con;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();

    }
    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
        $this->validateUsername($un);
        $this->validateFirstname($fn);
        $this->validateLastname($ln);
        $this->validateEmail($em, $em2);
        $this->validatePassword($pw, $pw2);

        if(empty($this->errorArray)){
            //TODO: insert into db
            return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
        }
        else {
            return false;
        }
    }
    public function login($un, $pw){
        $pw = md5($pw);

        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");

        if(mysqli_num_rows($query) == 1){
            return true;
        }
            else {
                array_push($this->errorArray, Constants::$loginFailed);
                echo 'login failed';
                return false;
            }

        }

    public function getError($error){
    if(!in_array($error, $this->errorArray)) {
        $error = "";
    }
        return "<span class='errorMessage'>$error</span>";
    }
    private function insertUserDetails($un, $fn, $ln, $em, $pw) {
        $encryptedPw = md5($pw);
        $profilepic = "assets/images.profilepics/head_emerald.png";
        $added = date("Y-m-d");

        $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$added', '$profilepic' )");

        return $result;
    }
    private function validateUsername($un){

        if(strlen($un) > 25 || strlen($un) < 5) {
            array_push($this->errorArray, Constants::$userNameLen);
            return;
        }
        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
        if(mysqli_num_rows($checkUsernameQuery) != 0){
            array_push($this->errorArray, Constants::$usernameTaken);
            return;
        }
    }
    private function validateFirstname($fn){
        if(strlen($fn) > 25 || strlen($fn) < 2) {
            array_push($this->errorArray, Constants::$firstNameLen);
            return;
        }
    }
    private function validateLastname($ln){
        if(strlen($ln) > 25 || strlen($ln) < 2) {
            array_push($this->errorArray, Constants::$lastNameChars);
            return;
        }
    }
    private function validateEmail($em, $em2){
        if($em != $em2){
            array_push($this->errorArray, Constants::$emailNotMatch);
            return;
        }
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray, Constants::$emailNotValid);
            return;
        }
        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
        if(mysqli_num_rows($checkEmailQuery) != 0){
            array_push($this->errorArray, Constants::$emailTaken);
            return;
    }
}
    private function validatePassword($pw, $pw2){
        if($pw != $pw2){
            array_push($this->errorArray, Constants::$passwordNotMatch);
            return;
        }
        if(preg_match('/[^\w!@#$%^&*()]/', $pw)){
            array_push($this->errorArray, Constants::$passwordNotAlpha);
            return;
        }
        if(strlen($pw) > 25 || strlen($pw) < 5) {
            array_push($this->errorArray, Constants::$passwordLen);
            return;
        }
        
    }
}
?>