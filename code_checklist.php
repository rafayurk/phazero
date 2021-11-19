<?php
include('authentication.php');
include('dbcon.php');


if(isset($_POST['checklist_delete_btn'])){

    $del_id = $_POST['checklist_delete_btn'];

    $ref_table = 'CHECKLISTS/'.$del_id;
    $deletequery_result = $database->getReference($ref_table) ->remove();

    if($deletequery_result){

        $_SESSION['status'] = "Checklist Deleted Successfully";
        header('Location: view_checklists.php');
    }

    else{

        $_SESSION['status'] = "Checklist Not Deleted";
        header('Location: view_checklists.php');
    }

}

if(isset($_POST['update_checklist']))
{

    $key = $_POST['key'];
    $name = $_POST['name'];
  
    $updateData = [
        'name'=>$name
    ];

    $ref_table = 'CHECKLISTS/'.$key;
    $updatequery_result = $database->getReference($ref_table) ->update($updateData);

    if($updatequery_result){

        $_SESSION['status'] = "Checklist Updated Successfully";
        header('Location: view_checklists.php');
    }

    else{

        $_SESSION['status'] = "Checklist Not Updated";
        header('Location: view_checklists.php');
    }

}







if(isset($_POST['create_checklist']))
{
    // $ref_table = 'CHECKLISTS';
    // $newPostKey = $database->getReference($ref_table)->push()->getKey();
    //$fetchdata = $database->getReference($ref_table)->getValue();
    $name = $_POST['name'];


    // foreach($fetchdata as $key => $row) {
    
    //     $key = $_POST['id'];
    
    // }
    $postData = [
        'name'=>$name
    ];

    $ref_table = "CHECKLISTS";
    $postRef_result = $database->getReference($ref_table)->push($postData);
    $postRefKey = $postRef_result-> getKey();
    // print_r($postRefKey);

    $postId = [
        'name' => $name,
        'id' => $postRefKey
    ];
    // $postRef_id = $database->getReference($postRefKey)->push($postId);
    $postRef_id= $database->getReference("CHECKLISTS/".$postRefKey)->set($postId);
    

    if($postRef_result){

        $_SESSION['status'] = "Checklist Created Successfully";
        header('Location: view_checklists.php');
    }

    else{

        $_SESSION['status'] = "Checklist Not Created";
        header('Location: view_checklists.php');
    }

}



?>