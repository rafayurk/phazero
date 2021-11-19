<?php 
session_start();

if(isset($_SESSION['verified_user_id'])){
    $_SESSION['status'] = "You are already logged in!";
    header('Location: home.php');
    exit();    
}

// include('includes/functions.php');
include('includes/loginheader.php');

?>
<!DOCTYPE html>
<html>
<title>HSE Admin Log in</title>
    <head>
        <title>HSE ADMIN LOGIN</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body>
        <div class="header">
            <h2>HSE ADMIN LOGIN</h2>
        </div>
        <form action="logincode.php" method="POST">

            <div class="input-group">
                <label>Email: </label>
                <input type="text" name="email" >
            </div>
            <div class="input-group">
                <label>Password: </label>
                <input type="password" name="password">
            </div>
            
            <div class="input-group">
                <button type="submit" name="login_btn" class="btn btn-primary" >Login</button>
            </div>
        
        </form>
    </body>
</html>
