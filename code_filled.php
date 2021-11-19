<?php
include('authentication.php');
include('dbcon.php');


if(isset($_POST['filled_delete_btn'])){

    $del_id = $_POST['filled_delete_btn'];

    $ref_table = 'ANSWERED_QUESTIONS/'.$del_id;
    $deletequery_result = $database->getReference($ref_table) ->remove();

    if($deletequery_result){

        $_SESSION['status'] = "Answered Question Deleted Successfully";
        header('Location: view_checklists.php');
    }

    else{

        $_SESSION['status'] = "Answered Question Not Deleted";
        header('Location: view_checklists.php');
    }

}

?>