<?php
class Account {

    private $errorArray;

    public function __construct() {
        this->errorArray = array();

    }
    public function register($us, $fn, $ln, $em, $em2, $pw, $pw2){
        $this->validateUsername($un);
        $this->validateFirstname($fn);
        $this->validateLastname($ln);
        $this->validateEmail($em, $em2);
        $this->validatePassword($pw, $pw2);
    }
    private function validateUsername($un){

        if(strlen($un) > 25 || strlen($us) < 5) {
array_push($this->errorArray, "Your username must be between 5 and 25 characters");
return;
        }
        //TODO: check userName exists
    }
    private function validateFirstname($fn){
        
    }
    private function validateLastname($ln){
        
    }
    private function validateEmail($em, $em2){
        
    }
    private function validatePassword($pw, $pw2){
        
    }
        
}
?>