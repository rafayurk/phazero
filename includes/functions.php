<?php
session_start();

// variable declaration
$username = "";
$email = "";
$errors = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
    register();
}

// REGISTER USER
function register() {


    // call these variables with the global keyword to make them available in function
        global $db, $errors, $username, $email;
    
    // receive all input values from the form. Call the e() function
    // defined below to escape form values
        $username = e($_POST['username']);
        $email = e($_POST['email']);
        $password_1 = e($_POST['password_1']);
        $password_2 = e($_POST['password_2']);
        $usertype = e($_POST['userType']);
    
    // form validation: ensure that the form is correctly filled
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }
    
    // register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = ($password_1); //encrypt the password before saving in the database
    
            $_SESSION['success'] = "New user successfully created!!";
            $logged_in_user_id = $cid;

            $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
            $_SESSION['success'] = "You are now logged in";

            header('location: index.php');
        } else {
            //$password = md5($password);

            $cid = uniqid();
            $logged_in_user_id = $cid;

            $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session

            $_SESSION['usertype'] = 'Admin';
            $_SESSION['success'] = "You are now logged in";
            header('location: home.php');
            //header('location: admin/home.php');
        }
    }



    // call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
    login();
}

// LOGIN USER
function login() {
    global $db, $username, $errors;

// grap form values
    $username = e($_POST['username']);
    $password = e($_POST['password']);

// make sure form is filled properly
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

// attempt login if no errors on form
    if (count($errors) == 0) {

       
                $_SESSION['user'] = $logged_in_user = $row;
                $_SESSION['success'] = "You are now logged in";


                header('location: index.php');
             // echo "successful";
          
}





    
}