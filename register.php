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
        <input type="text" id="username" name="loginUsername" placeholder="e.g. dr-dingle" required>
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
        <label for="registerUsername">Username</label>
        <input type="text" id="username" name="registerUsername" placeholder="e.g. dr-dingle" required>
      </p>
      <p>
        <label for="firstName">First Name</label>
        <input type="text" id="fname" name="firstName" placeholder="e.g. Barry" required>
      </p>
      <p>
        <label for="lastName">Last Name</label>
        <input type="text" id="lname" name="lastName" placeholder="e.g. Dingle" required>
      </p>
      <p>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="e.g. bdskat@web.md" required>
      </p>
      <p>
        <label for="confirmEmail">Confirm Email</label>
        <input type="email" id="confirmEmail" name="confirmEmail" placeholder="e.g. bdskat@web.md" required>
      </p>
      <p>
        <label for="registerPassword">Password</label>
        <input type="password" id="password" name="registerPassword" required>
      </p>
      <p>
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
      </p>
      <button type="submit" name="registerButton">Sign Up</button>
    </form>
  </div>

</body>

</html>