<?php
include('authentication.php');
include('dbcon.php');



if(isset($_POST['section_delete_btn'])){

    $del_id = $_POST['section_delete_btn'];


    $table = 'SECTIONS';
    $getdata = $database->getReference($table)->getValue();
    
    $ref_table = 'SECTIONS/'.$del_id;
    $deletequery_result = $database->getReference($ref_table) ->remove();

    if($deletequery_result){

        $_SESSION['status'] = "Section Deleted Successfully";
        foreach($getdata as $i => $j)
        if($j['id']==$del_id)
        header('Location: view_section2.php?id='.$j['checklistId']);
        // header('Location: view_users.php');
    }

    else{

        $_SESSION['status'] = "Question Not Deleted";
        foreach($getdata as $i => $j)
        if($j['id']==$del_id)
        header('Location: view_section2.php?id='.$j['checklistId']);
        // header('Location: view_users.php');
    }

}



if(isset($_POST['update_section']))
{

    $key = $_POST['key'];
    $name = $_POST['name'];
   

    $updateData = [
        'name'=>$name
    ];

    $table = 'SECTIONS';
    $getdata = $database->getReference($table)->getValue();


    $ref_table = 'SECTIONS/'.$key;
    $updatequery_result = $database->getReference($ref_table) ->update($updateData);

    if($updatequery_result){

        $_SESSION['status'] = "Section Updated Successfully";
        foreach($getdata as $i => $j)
        if($j['id']==$key)
        header('Location: view_section2.php?id='.$j['checklistId']);
    }

    else{

        $_SESSION['status'] = "Section Not Updated";
        foreach($getdata as $i => $j)
        if($j['id']==$key)
        header('Location: view_section2.php?id='.$j['checklistId']);
        // header('Location: view_questions.php?id='.$key);
    }

}



if(isset($_POST['create_section']))
{
    // $ref_table = 'CHECKLISTS';
    // $newPostKey = $database->getReference($ref_table)->push()->getKey();
    //$fetchdata = $database->getReference($ref_table)->getValue();
    $name = $_POST['name'];
    $checklistId = $_POST['checklistId'];
    

    // foreach($fetchdata as $key => $row) {
    
    //     $key = $_POST['id'];
    
    // }
    $postData = [
        'name'=>$name,
        'checklistId'=>$checklistId
    ];

    $ref_table = "SECTIONS";
    $postRef_result = $database->getReference($ref_table)->push($postData);
    $postRefKey = $postRef_result-> getKey();
    
    // print_r($postRefKey);

    $postId = [
        'name' => $name,
        'id' => $postRefKey,
        'checklistId'=>$checklistId
    
    ];
    // $postRef_id = $database->getReference($postRefKey)->push($postId);
    $postRef_id= $database->getReference("SECTIONS/".$postRefKey)->set($postId);
    

    if($postRef_result){

        $_SESSION['status'] = "Section Created Successfully";
        header('Location: view_section2.php?id='.$checklistId);
    }

    else{

        $_SESSION['status'] = "Section Not Created";
        header('Location: view_section2.php?id='.$checklistId);
    }

}



?>