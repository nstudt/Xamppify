<?php

class Account {

    private $errorArray;

    public function __construct() {
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
            return true;
        }
        else {
            return false;
        }
    }
    public function getError($error){
    if(!in_array($error, $this->errorArray)) {
        $error = "";
    }
        return "<span class='errorMessage'>$error</span>";
    }
    private function validateUsername($un){

        if(strlen($un) > 25 || strlen($un) < 5) {
            array_push($this->errorArray, "Your username must be between 5 and 25 characters");
            return;
        }
        //TODO: check userName exists
    }
    private function validateFirstname($fn){
        if(strlen($fn) > 25 || strlen($fn) < 2) {
            array_push($this->errorArray, "Your First Name must be between 2 and 25 characters");
            return;
        }
    }
    private function validateLastname($ln){
        if(strlen($ln) > 25 || strlen($ln) < 2) {
            array_push($this->errorArray, "Your Last Name must be between 2 and 25 characters");
            return;
        }
    }
    private function validateEmail($em, $em2){
        if($em != $em2){
            array_push($this->errorArray, "Your emails must match");
            return;
        }
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray, "email is not valid");
            return;
        }

        //TODO: check that username is unique in db
    }
    private function validatePassword($pw, $pw2){
        if($pw != $pw2){
            array_push($this->errorArray, "Your passwords must match");
            return;
        }
        if(preg_match('/[^A-Za-z0-9!@#$%^&*()]/', $pw)){
            array_push($this->errorArray, "Your password cannot contain special; characters");
            return;
        }
        if(strlen($pw) > 25 || strlen($pw) < 5) {
            array_push($this->errorArray, "Your username must be between 5 and 25 characters");
            return;
        }
        
    }
}
?>