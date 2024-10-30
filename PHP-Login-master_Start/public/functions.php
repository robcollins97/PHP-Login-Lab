<?php
function submit_login($username, $password)
{
    require('config.php');
    $pdo = get_connection();
    $query = 'SELECT * FROM users';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $users=$stmt->fetchAll();

if(isset($_POST['Submit']))
    {
            if ((char_check($username) == true) && (char_check($password) == true)) {
                foreach ($users as $user){
                if (($user['Username'] == $username)&& ($user['Password'] == $password)) {
                    $_SESSION['Username'] = $user['Username'] ;
                    $_SESSION['Active'] = true;
                    header("location:index.php");
                    exit;
                } else {
                    echo 'Incorrect Username or Password';
                }}
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

function get_connection()
{
    $config = require 'config.php';

    $pdo = new PDO(
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass']
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}
function register ($username, $password){
    require('config.php');
    if(isset($_POST['Submit'])) {
        if ((char_check($username) == true) && (char_check($password) == true)) {
        $pdo = get_connection();
            $queryid = 'SELECT id FROM users WHERE id=(SELECT max(id) FROM users);';
            //FINDING THE LAST RECORDS ID AND THEN ADDING 1 TO THAT ID TO CREATE AN ID FOR THE NEXT RECORD
            $stmt1 = $pdo->prepare($queryid);
            $stmt1->execute();
            $last_id=$stmt1->fetch();

            $id = $last_id[0]+1;

        $query = "INSERT INTO users (id,Username,Password) VALUES (:id,:username,:password)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id);

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            header("location:login.php");



        }else{
            echo 'enter a valid username and password,they must only contain letters and numbers';
        }
    }
}
?>