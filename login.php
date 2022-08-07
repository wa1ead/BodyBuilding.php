<?php
    include_once 'header.php';
?>
    <div class="container my-5">
        <div class="mb-3">
            <h2>Login</h2>
            <form action="includes/login.inc.php" method="post">
                <div class="mb-3">
                    <label>USERNAME OR EMAIL</label>
                    <input type="text" name="username" placeholder="Username/Email...">
                </div>
                <div class="mb-3">
                    <label>PASSWORD</label>
                    <input type="password" name="pwd" placeholder="Password...">
                </div>
                    <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
    </div>
   
    <?php
    if(isset($_GET['error'])){
        if($_GET['error'] == 'emptyInput'){
            echo "Fill In All Fields!";
        }
        else if($_GET['error'] == "loginFailed"){
            echo "Wrong Informations, Please Try Again!";
        }
    }
?>

<?php
    include_once 'footer.php';
?>