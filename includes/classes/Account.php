<?php
  class Account {
    private $errorArray;

    public function __construct() {
      $this->errorArray = array();
    }

    public function register($un, $fn, $ln, $e1, $e2, $p1, $p2) {
      $this->validateUsername($un);
      $this->validatefirstName($fn);
      $this->validatelastName($ln);
      $this->validateEmails($e1, $e2);
      $this->validatePasswords($p1, $p2);

      if(empty($this->errorArray) == true) {
        return true;
      } else {
        return false;
      }
    }

    public function getError($error) {
      if(!in_array($error, $this->errorArray)) {
        $error = "";
      }
      return "<span class='error-message'>$error</span>";
    }

    private function validateUsername($username) {
      if(strlen($username) > 25 || strlen($username) < 5) {
        array_push($this->errorArray, Constants::$usernameLen);
        return;
      }
      // TODO: check if username exists
    }
    private function validatefirstName($firstName) {
      if(strlen($firstName) > 20 || strlen($firstName) < 2) {
        array_push($this->errorArray, Constants::$fNameLen);
        return;
      }
    }
    private function validatelastName($lastName) {
      if(strlen($lastName) > 20 || strlen($lastName) < 2) {
        array_push($this->errorArray, Constants::$lNameLen);
        return;
      }
    }
    private function validateEmails($e1, $e2) {
      if($e1 != $e2) {
        array_push($this->errorArray, Constants::$emailNoMatch);
        return;
      }
      if(!filter_var($e1, FILTER_VALIDATE_EMAIL)) {
        array_push($this->errorArray, Constants::$emailInvalid);
        return;
      }

      // TODO: check if email exists
    }
    private function validatePasswords($p1, $p2) {
      if($p1 != $p2) {
        array_push($this->errorArray, Constants::$passwordNoMatch);
        return;
      }
      if(preg_match('/[^A-Za-z0-9]/', $p1)){
        array_push($this->errorArray, Constants::$passwordPattern);
        return;
      }
      if(strlen($p1) > 30 || strlen($p1) < 5) {
        array_push($this->errorArray, Constants::$passwordLen);
        return;
      }
    }
  }

?>