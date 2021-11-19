<?php
include('authentication.php');
include('dbcon.php');

if(isset($_POST['user_delete_btn'])){

    $del_id = $_POST['user_delete_btn'];

    $ref_table = 'Inspector/'.$del_id;
    $deletequery_result = $database->getReference($ref_table) ->remove();

    if($deletequery_result){

        $_SESSION['status'] = "User Deleted Successfully";
        header('Location: view_users.php');
    }

    else{

        $_SESSION['status'] = "User Not Deleted";
        header('Location: view_users.php');
    }

}




if(isset($_POST['update_user']))
{

    $key = $_POST['key'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];

    $updateData = [
        'email'=>$email,
        'fname'=>$first_name,
        'lname'=>$last_name,
        'password'=>$password
    ];

    $ref_table = 'Inspector/'.$key;
    $updatequery_result = $database->getReference($ref_table) ->update($updateData);

    if($updatequery_result){

        $_SESSION['status'] = "User Updated Successfully";
        header('Location: view_users.php');
    }

    else{

        $_SESSION['status'] = "User Not Updated";
        header('Location: view_users.php');
    }

}





if(isset($_POST['create_user']))
{

    $email = $_POST['insp_email'];
    $first_name = $_POST['insp_first_name'];
    $last_name = $_POST['insp_last_name'];
    $password = $_POST['insp_password'];

    $postData = [
        'email'=>$email,
        'fname'=>$first_name,
        'lname'=>$last_name,
        'password'=>$password
    ];

    $ref_table = "Inspector";
    $postRef_result = $database->getReference($ref_table)->push($postData);

    if($postRef_result){

        $_SESSION['status'] = "User Created Successfully";
        header('Location: view_users.php');
    }

    else{

        $_SESSION['status'] = "User Not Created";
        header('Location: view_users.php');
    }

}



?>