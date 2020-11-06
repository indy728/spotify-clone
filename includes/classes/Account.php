<?php
  class Account {
    private $con;
    private $errorArray;

    public function __construct($con) {
      $this->con = $con;
      $this->errorArray = array();
    }

    public function login($username, $password) {
      $password = md5($password);

      $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username' AND password='$password'");

      if(mysqli_num_rows($query) == 1) {
        return true;
      } else {
        array_push($this->errorArray, Constants::$loginFailed);
        return false;
      }
    }

    public function register($un, $fn, $ln, $e1, $e2, $p1, $p2) {
      $this->validateUsername($un);
      $this->validatefirstName($fn);
      $this->validatelastName($ln);
      $this->validateEmails($e1, $e2);
      $this->validatePasswords($p1, $p2);

      if(empty($this->errorArray) == true) {
        // Insert to db

        return $this->insertUserDetails($un, $fn, $ln, $e1, $p1);
      } else {
        return false;
      }
    }

    private function insertUserDetails($un, $fn, $ln, $email, $password) {
      $encryptedPw = md5($password);
      $profilePic = "assets/img/profile-pics/my-face.jpg";
      $date = date("Y-m-d");
      return mysqli_query($this->con, "INSERT INTO users VALUES (NULL, '$un', '$fn', '$ln', '$email', '$encryptedPw', '$date', '$profilePic')");
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

      $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
      if (mysqli_num_rows($checkUsernameQuery) != 0) {
        array_push($this->errorArray, Constants::$usernameTaken);
      }
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

      $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$e1'");
      
      if (mysqli_num_rows($checkEmailQuery) != 0) {
        array_push($this->errorArray, Constants::$emailTaken);
      }
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