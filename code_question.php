<?php
session_start();
include('dbcon.php');


if(isset($_POST['question_delete_btn'])){

    $del_id = $_POST['question_delete_btn'];


    $table = 'QUESTIONS';
    $getdata = $database->getReference($table)->getValue();
    
    $ref_table = 'QUESTIONS/'.$del_id;
    $deletequery_result = $database->getReference($ref_table) ->remove();

    if($deletequery_result){

        $_SESSION['status'] = "Question Deleted Successfully";
        foreach($getdata as $i => $j)
        if($j['id']==$del_id)
        header('Location: view_questions.php?id='.$j['sectionId']);
        // header('Location: view_users.php');
    }

    else{

        $_SESSION['status'] = "Question Not Deleted";
        foreach($getdata as $i => $j)
        if($j['id']==$del_id)
        header('Location: view_questions.php?id='.$j['sectionId']);
        // header('Location: view_users.php');
    }

}


if(isset($_POST['update_question']))
{

    $key = $_POST['key'];
    $question = $_POST['question'];
   

    $updateData = [
        'question'=>$question
    ];

    $table = 'QUESTIONS';
    $getdata = $database->getReference($table)->getValue();


    $ref_table = 'QUESTIONS/'.$key;
    $updatequery_result = $database->getReference($ref_table) ->update($updateData);

    if($updatequery_result){

        $_SESSION['status'] = "Question Updated Successfully";
        foreach($getdata as $i => $j)
        if($j['id']==$key)
        header('Location: view_questions.php?id='.$j['sectionId']);
    }

    else{

        $_SESSION['status'] = "Question Not Updated";
        foreach($getdata as $i => $j)
        if($j['id']==$key)
        header('Location: view_questions.php?id='.$j['sectionId']);
        // header('Location: view_questions.php?id='.$key);
    }

}



if(isset($_POST['create_question']))
{
 
    $question = $_POST['question'];
    $sectionId = $_POST['sectionId'];
    $checklistId = $_POST['checklistId'];
    

  
    $postData = [
        'question'=>$question,
        'sectionId'=>$sectionId,
        'checklistId'=>$checklistId
    ];

    $ref_table = "QUESTIONS";
    $postRef_result = $database->getReference($ref_table)->push($postData);
    $postRefKey = $postRef_result-> getKey();
    

    $postId = [
        'question' => $question,
        'id' => $postRefKey,
        'sectionId'=>$sectionId,
        'checklistId'=>$checklistId
    
    ];
    // $postRef_id = $database->getReference($postRefKey)->push($postId);
    $postRef_id= $database->getReference("QUESTIONS/".$postRefKey)->set($postId);
    

    if($postRef_result){

        $_SESSION['status'] = "Question Created Successfully";
        header('Location: view_questions.php?id='.$sectionId);
    }

    else{

        $_SESSION['status'] = "Question Not Created";
        header('Location: view_questions.php?id='.$sectionId);
    }

}



?>