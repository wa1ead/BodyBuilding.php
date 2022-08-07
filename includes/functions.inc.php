<?php

function emptyInputSignup($name, $email, $username, $password, $passwordconf){
    $result= true;
    if(empty($name) || empty($email) || empty($username) || empty($password) || empty($passwordconf)){
        $result= false;
    }
    return $result;
}

function invalidEmail($email){
    $result= false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result= true;
    }
    return $result;
}

function invalidUsername($username){
    $result =false;
    if(!preg_match("/^[a-zA-Z0-9]*/", $username)){
        $result= true;
    }
    return $result;
}

function passwordsMatch($password, $passwordconf){
    $result= false;
    if($password !== $passwordconf){
        $result= true;
    }
    return $result;
}

function usernameMatch($conn, $username, $email){
    $sql= "SELECT * FROM users WHERE usersUSERNAME= ? OR usersEMAIL= ?;";
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location: ../signup.php?error=stmtFailed');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData= mysqli_stmt_get_result($stmt);
    if($row= mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result= false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password){
    $sql= "INSERT INTO users (usersNAME, usersEMAIL, usersUSERNAME, usersPASSWORD) VALUES (?, ?, ?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location: ../signup.php?error=stmtFailed');
        exit();
    }
    $hashedPassword= password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../signup.php?error=none');
    exit();
}