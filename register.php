<!DOCTYPE html>

<?php
include("includes/classes/Account.php");

$account =  new Account();

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welsome to Xamppify</title>
</head>
<body>
    <h1>Registration Page</h1>
    <div id="inputContainer">
    <form id="loginForm" action="register.php" method="post">
    <h2>Login to your account</h2>
    <p>
    <label for="loginUsername">Username</label>
    <input type="text" id="loginUsername" name="loginUsername" placeholder="username" required>
    </p>
    <p>
    <label for="loginPassword">Password</label>
    <input type="password" id="loginPassword" name="loginPassword"  required>
    </p>

    <button type="submit" name="loginButton">Log In</button>
    
    </form>

    <form id="registerForm" action="register.php" method="post">
    <h2>Create your free account</h2>
    <p>
    <?php echo $account->getError("Your username must be between 5 and 25 characters"); ?>
    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="username" required>
    </p>
    <p>
    <?php echo $account->getError("Your First Name must be between 2 and 25 characters"); ?>
    <label for="firstName">First Name</label>
    <input type="text" id="firstName" name="firstName" placeholder="First" required>
    </p>
    <p>
    <?php echo $account->getError("Your Last Name must be between 2 and 25 characters"); ?>
    <label for="lastName">Username</label>
    <input type="text" id="lastName" name="lastName" placeholder="Last" required>
    </p>
    <p>
    <?php echo $account->getError("Your emails must match"); ?>
    <?php echo $account->getError("email is not valid"); ?>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="user@domain.com" required>
    </p>
    <p>
    <label for="email2">Confirm Eamil</label>
    <input type="email" id="email2" name="email2" placeholder="user@domain.com" required>
    </p>

    <p>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"  placeholder="enter your password" required>
    </p>
    <p>
    <label for="password2">Confirm Password</label>
    <input type="password" id="password2" name="password2" placeholder="confirm your password" required>
    </p>

    <button type="submit" name="registerButton">SIGN UP</button>
    
    </form>
    </div>
</body>
</html>