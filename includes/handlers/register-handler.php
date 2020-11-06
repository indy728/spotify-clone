<?php
  function sanitizeFormUsername($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
  }
  function sanitizeFormString($inputText) {
    $inputText = sanitizeFormUsername($inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
  }


  if(isset($_POST['registerButton'])){
    // Register Button Pressed Action
    $username = sanitizeFormUsername($_POST['registerUsername']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = strip_tags($_POST['email']);
    $confirmEmail = strip_tags($_POST['confirmEmail']);
    $password = strip_tags($_POST['registerPassword']);
    $confirmPassword = strip_tags($_POST['confirmPassword']);
  
    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword);

    if($wasSuccessful) {
      $_SESSION['usserLoggedIn'] = $username;
      header("Location: index.php");
    } else {
      echo $wasSuccessful;
    }
  }
?>