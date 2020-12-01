<?php
  include("includes/config.php");
  include("includes/classes/Constants.php");
  include("includes/classes/Account.php");
  $account = new Account($con);
  
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
  <link rel="stylesheet" type="text/css" href="assets/css/register.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="assets/js/register.js"></script>
</head>

<body>
  <?php
    if(isset($_POST['registerButton'])) {
      echo '<script>
        $(document).ready(function() {
          $("#loginForm").hide();
          $("#registerForm").show();
        });
      </script>';
    } else {
      echo '<script>
        $(document).ready(function() {
          $("#loginForm").show();
          $("#registerForm").hide();
        });
      </script>';
    }
  ?>
  <div id="background">
  
    <div id="loginContainer">
      <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
          <h2>Log in to your account</h2>
          <p>
            <?php echo $account->getError(Constants::$loginFailed) ?>
            <label for="loginUsername">Username</label>
            <input type="text" id="username" name="loginUsername" placeholder="e.g. dr-dingle" required value="<?php getInputValue('loginUsername'); ?>">
          </p>
          <p>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
          </p>
          <button type="submit" name="loginButton">Log In</button>

          <div class="hasAccountText">
            <span id="hideLogin">
              Don't have an account yet? Sign up here.
            </span>
          </div>
          
        </form>

        <form id="registerForm" action="register.php" method="POST">
          <h2>Create your free account</h2>
          <p>
            <?php echo $account->getError(Constants::$usernameLen) ?>
            <?php echo $account->getError(Constants::$usernameTaken) ?>
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
            <?php echo $account->getError(Constants::$emailTaken) ?>
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

          <div class="hasAccountText">
            <span id="hideRegister">
              Already have an account? Log in here
            </span>
          </div>
        </form>
      </div>
    
      <div id="loginText">
          <h1>Get great music, right now</h1>
          <h2>Listen to loads of songs for free</h2>
          <ul>
            <li>Discover music you'll fall in love with</li>
            <li>Create your own playlists</li>
            <li>Follow artists to keep up to date</li>
          </ul>
        </div>
    
    </div>


  </div>

</body>

</html>