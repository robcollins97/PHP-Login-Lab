<?php
function submit_login($username, $password)
{
    require('config.php');

    if(isset($_POST['Submit']))
    {
            if ((char_check($username) == true) && (char_check($password) == true)) {
                if (($Username == $username) && ($Password == $password)) {
                    $_SESSION['Username'] = $Username;
                    $_SESSION['Active'] = true;
                    header("location:index.php");
                    exit;
                } else {
                    echo 'Incorrect Username or Password';
                }
            } else {
                echo 'Username and Password must be only letters or numbers';
            }
        }
}


function char_check($textinput){
    $chars = "/^[A-Za-z0-9]+$/";

    if (preg_match($chars, $textinput)) {
        return true;
    } else {
        return false;
    }


}


?>