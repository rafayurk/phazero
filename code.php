<?php
include('authentication.php');
include('dbcon.php');



if(isset($_POST['register_btn']))
{

    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'password' => $password,
        'displayName' => $first_name. ' ' .$last_name,
    ];
    
    $createdUser = $auth->createUser($userProperties);

    if($createdUser)
    {
        $_SESSION['status'] = "Admin Registered Successfully";
        header('Location: register_admin.php');
        exit();
    }
    else 
    {
        $_SESSION['status'] = "Admin Not Registered Successfully";
        header('Location: register_admin.php');
        exit();
    }

}
if (isset($_POST['user_delete_btn']))
{
    $uid = $_POST['user_delete_btn'];

    try{
    $auth->deleteUser($uid);
    $_SESSION['status'] = "User Deleted Successfully";
    header('Location: view_admins.php');
    exit();

    }catch(Exception $e){

    $_SESSION['status'] = "No ID found";
    header('Location: view_admins.php');
    exit();

    }

}




if(isset($_POST['update_btn']))
{
    // $key = $_POST['key'];
    $email = $_POST['email'];
    $displayName = $_POST['display_name'];
  

    $uid = $_POST['user_id'];
    $properties = [
        // 'displayName' => 'New display name',
        'displayName' => $displayName,
        'email' => $email,


    ];

    $updatedUser = $auth->updateUser($uid, $properties);


    if($updatedUser)
    {
        $_SESSION['status'] = "Admin Updated Successfully";
        header('Location: view_admins.php');
        exit();
    }
    else 
    {
        $_SESSION['status'] = "Admin Not Updated Successfully";
        header('Location: view_admins.php');
        exit();
    }
}
//     $updateData = [
//         'email'=>$email,
//         'fname'=>$first_name,
//         'lname'=>$last_name,
//         'password'=>$password
//     ];
    
//     $ref_table = 'admin/'.$key;
//     $updatequery = $database->getReference($ref_table) ->update($updateData);



//     if($updatequery_result){

//         $_SESSION['status'] = "Admin Updated Successfully";
//         header('Location: view_admins.php');
//     }

//     else{

//         $_SESSION['status'] = "Admin Not Updated";
//         header('Location: view_admins.php');
//     }

// }

// if(isset($_POST['create_admin']))
// {

//     $email = $_POST['email'];
//     $first_name = $_POST['first_name'];
//     $last_name = $_POST['last_name'];
//     $password = $_POST['password'];

//     $postData = [
//         'email'=>$email,
//         'fname'=>$first_name,
//         'lname'=>$last_name,
//         'password'=>$password
//     ];

//     $ref_table = "admin";
//     $postRef_result = $database->getReference($ref_table)->push($postData);

//     if($postRef_result){

//         $_SESSION['status'] = "Admin Created Successfully";
//         header('Location: view_admins.php');
//     }

//     else{

//         $_SESSION['status'] = "Admin Not Created";
//         header('Location: view_admins.php');
//     }

// }



?>