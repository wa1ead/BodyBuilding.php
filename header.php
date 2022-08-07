<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>BODY BUILDING</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <h1>BodyBuilding</h1>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="discover.php">ABOUT</a></li>
                <li><a href="blog.php">TRAINING</a></li>
                <?php
                if(isset($_SESSION['userusername'])){
                echo '<li><a href="profile.php">PROFILE</a></li>';
                echo '<li><a href="includes/logout.inc.php">LOGOUT</a></li>';
                }
                else{
                    echo '<li><a href="signup.php">SIGNUP</a></li>';
                    echo '<li><a href="login.php">LOGIN</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="content">