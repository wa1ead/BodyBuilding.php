<?php
    include_once 'header.php';
?>
    <div class="signup-box">
        <h2>Sign Up</h2>
            <form action="includes/signup.inc.php" method="post">
                <label>NAME</label>
                <input type="text" name="name" placeholder="Full Name..."></br>
                <label>EMAIL</label>
                <input type="text" name="email" placeholder="Email..."></br>
                <label>USERNAME</label>
                <input type="text" name="username" placeholder="Username..."></br>
                <label>PASSWORD</label>
                <input type="password" name="pwd" placeholder="Password..."></br>
                <label>CONFIRM PASSWORD</label>
                <input type="password" name="pwdconf" placeholder="Repeat Password..."></br>
                <button type="submit" name="submit">Sign Up</button>
            </form>
    </div>
   
<?php
    if(isset($_GET['error'])){
        if($_GET['error'] == 'emptyInput'){
            echo "Fill In All Fields!";
        }
        else if($_GET['error'] == "invalidEmail"){
            echo "Please Pick A Valid Email!";
        }
        else if($_GET['error'] == "invalidUsername"){
            echo "Please Pick A Valid Username!";
        }
        else if($_GET['error'] == "usernameTaken"){
            echo "Username Exists Already!";
        }
        else if($_GET['error'] == "passwordsMatch"){
            echo "Passwords Don't Match!";
        }
        else if($_GET['error'] == "stmtFailed "){
            echo "Something Went Wrong, Please Try Again!";
        }
        else if($_GET['error'] == "none"){
            echo "SignUp SUCCEED!";
        }
    }
?>

<?php
    include_once 'footer.php';
?>