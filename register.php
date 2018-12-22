<!DOCTYPE html>

<?php
    include "includes/config.php";
    include "includes/classes/Account.php";
    include "includes/classes/Constants.php";

    $account = new Account($con);

    include "includes/handlers/register-handler.php";
    include "includes/handlers/login-handler.php";

    function getInputValue($name)
    {
        if (isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="includes/assets/js/register.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welsome to Xamppify</title>
    <link rel="stylesheet" href="includes/assets/css/register.css">
</head>
<body>
    <?php
    if(isset($_POST['registerButton'])) {
        echo'<script>
        $(document).ready(function(){
        $("#loginForm").hide();
        $("#registerForm").show();
        });
    </script>';
    }
    else {
        echo'<script>
        $(document).ready(function(){
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
					<h2>Login to your account</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" required>
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
					</p>

                    <button type="submit" name="loginButton">LOG IN</button>
                    <div class="hasAccountText">
                        <a href="#"><span id="hideLogin">Don't have an account yet? Sign up here.</span></a>

                    </div>

				</form>

            <form id="registerForm" action="register.php" method="post">
                <h2>Create your free account</h2>
                <p>
                    <?php echo $account->getError(Constants::$userNameLen); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="username" value="<?php getInputValue('username')?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$firstNameLen); ?>
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" placeholder="First" value="<?php getInputValue('firstName')?>"  required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$lastNameChars); ?>
                    <label for="lastName">Username</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Last" value="<?php getInputValue('lastName')?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$emailNotMatch); ?>
                    <?php echo $account->getError(Constants::$emailNotValid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="user@domain.com" value="<?php getInputValue('email')?>" required>
                </p>
                <p>
                    <label for="email2">Confirm Eamil</label>
                    <input type="email" id="email2" name="email2" placeholder="user@domain.com" value="<?php getInputValue('email2')?>" required>
                </p>

                <p>
                    <?php echo $account->getError(Constants::$passwordNotMatch); ?>
                    <?php echo $account->getError(Constants::$passwordNotAlpha); ?>
                    <?php echo $account->getError(Constants::$passwordLen); ?>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"  placeholder="enter your password" required>
                </p>
                <p>
                    <label for="password2">Confirm Password</label>
                    <input type="password" id="password2" name="password2" placeholder="confirm your password" required>
                </p>

                <button type="submit" name="registerButton">SIGN UP</button>
                    <div class="hasAccountText">
                                <a href="#"><span id="hideRegister">Already have an account? Login here.</span></a>

                    </div>
            </form>
            </div>
    </div>
</div>
</body>
</html>