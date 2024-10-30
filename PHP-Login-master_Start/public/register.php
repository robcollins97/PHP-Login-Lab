<?php require_once '../template/header_login.php';?>

<body>
<div class="container">
    <div class="header clearfix">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contacts.php">Contact</a></li>
                <li><a href="discover.php">Discover</a></li>

            </ul>
        </nav>
        <h3 class="text-muted">PHP Login exercise - Discover page</h3>
    </div>    <form action="" method="post" name="Register_Form" class="form-register">
        <h2 class="form-register-heading">Please Register Here!</h2>
        <label for="inputUsername" >Username</label>
        <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit">Register</button>

    </form>
    <?php
    require ('functions.php');

    register($_POST['Username'],$_POST['Password']);
    ?>
</div>
</body>

        <?php require_once '../template/footer.php';?>
