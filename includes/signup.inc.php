<?php
if(isset($_POST['submit'])){

    $name= $_POST['name'];
    $email= $_POST['email'];
    $username= $_POST['username'];
    $pwd= $_POST['pwd'];
    $pwdconf= $_POST['pwdconf'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $username, $password, $passwordconf) !== false){
        header('location: ../signup.php?error=emptyInput');
        exit();
    }
    if(invalidEmail($email) !== false){
        header('location: ../signup.php?error=invalidEmail');
        exit();
    }
    if(invalidUsername($username) !== false){
        header('location: ../signup.php?error=invalidUsername');
        exit();
    }
    if(usernameMatch($conn ,$username, $email) !== false){
        header('location: ../signup.php?error=usernameTaken');
        exit();
    }
    if(passwordsMatch($password, $passwordconf) !== false){
        header('location: ../signup.php?error=passwordsMatch');
        exit();
    }

    createUser($conn, $name, $email, $username, $password);

}else{
    header('location: ../signup.php');
    exit();
}