<?php
  include("includes/classes/Constants.php");
  include("includes/classes/Account.php");
  $account = new Account();
  
  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");

  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }

?>

<html>

<head>
  <title>
    Welcome to Spotify!
  </title>
</head>

<body>

  <div id="inputContainer">
    <form id="loginForm" action="register.php" method="POST">
      <h2>Log in to your account</h2>
      <p>
        <label for="loginUsername">Username</label>
        <input type="text" id="username" name="loginUsername" placeholder="e.g. dr-dingle" required value="<?php getInputValue('loginUsername'); ?>">
      </p>
      <p>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </p>
      <button type="submit" name="loginButton">Log In</button>
    </form>

    <form id="registerForm" action="register.php" method="POST">
      <h2>Create your free account</h2>
      <p>
        <?php echo $account->getError(Constants::$usernameLen) ?>
        <label for="registerUsername">Username</label>
        <input type="text" id="username" name="registerUsername" placeholder="e.g. dr-dingle" required value="<?php getInputValue('registerUsername'); ?>">
      </p>
      <p>
        <?php echo $account->getError(Constants::$fNameLen) ?>
        <label for="firstName">First Name</label>
        <input type="text" id="fname" name="firstName" placeholder="e.g. Barry" required value="<?php getInputValue('firstName'); ?>">
      </p>
      <p>
        <?php echo $account->getError(Constants::$lNameLen) ?>
        <label for="lastName">Last Name</label>
        <input type="text" id="lname" name="lastName" placeholder="e.g. Dingle" required value="<?php getInputValue('lastName'); ?>">
      </p>
      <p>
        <?php echo $account->getError(Constants::$emailInvalid) ?>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="e.g. bdskat@web.md" required value="<?php getInputValue('email'); ?>">
      </p>
      <p>
        <?php echo $account->getError(Constants::$emailNoMatch) ?>
        <label for="confirmEmail">Confirm Email</label>
        <input type="email" id="confirmEmail" name="confirmEmail" placeholder="e.g. bdskat@web.md" required value="<?php getInputValue('confirmEmail'); ?>">
      </p>
      <p>
        <?php echo $account->getError(Constants::$passwordPattern) ?>
        <?php echo $account->getError(Constants::$passwordLen) ?>
        <label for="registerPassword">Password</label>
        <input type="password" id="password" name="registerPassword" required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$passwordNoMatch) ?>
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
      </p>
      <button type="submit" name="registerButton">Sign Up</button>
    </form>
  </div>

</body>

</html>