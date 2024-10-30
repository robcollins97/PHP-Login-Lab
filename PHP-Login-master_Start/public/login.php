<?php require_once('../template/header_login.php'); ?>


<link rel="stylesheet" type="text/css" href="../css/signin.css">
    <title>Sign in</title>
</head>


<body>
<div class="container">
    <div class="header clearfix">
        <nav>
            <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="discover.php">Discover</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">PHP Login exercise - Contacts page</h3>
    </div>    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" >Username</label>
        <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>

    </form>
    <?php
    require ('functions.php');

        submit_login($_POST['Username'],$_POST['Password']);
    ?>
</div>
</body>
</html>
