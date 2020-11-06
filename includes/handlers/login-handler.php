<?php
  // include("register-handler.php");
  
  if(isset($_POST['loginButton'])){
    $username = $_POST['loginUsername'];
    $password = $_POST['password'];

    $result = $account->login($username, $password);

    if($result) {
      $_SESSION['userLoggedIn'] = $username;
      header("Location: index.php");
    }
  }
?>