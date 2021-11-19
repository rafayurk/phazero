<?php
// session_start();
include('authentication.php');
include('includes/header.php');

?>
 
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <?php
                if(isset($_SESSION['status']))
                {
                    echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                    unset($_SESSION['status']);
                }
                
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Submitted Question  
                            
                        </h4>
                       
                    </div>
                    <div class="card-body">
                    

                    <table class="table table-bordered table-striped">

<thead>
    <tr>
        <th>ID</th>
        <th>Checklist ID</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Photo</th>
        <th>Question ID</th>
        <th>Section ID</th>
        <th>User ID</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    <?php
        include('dbcon.php');
        $ref_table = 'ANSWERED_QUESTIONS';
        $fetchdata = $database->getReference($ref_table)->getValue();
        $check_table = 'QUESTIONS';
        $questionid =  $database->getReference($check_table)->getValue();

        if($fetchdata>0)
        {

            $i = 1;
            foreach($fetchdata as $key => $row){
                foreach($questionid as $i => $j){
                    
                    if ($row['questionId'] == $j['id'] ){
                        if($row['id'] != $_GET['id'])
                            continue;
                        ?>
                        <tr>
                            <!-- <td><?= $i++;?></td> -->
                            <td><?= $row['id'];?></td>
                            <td><?= $row['checklistId'];?></td>
                            <td><?= $row['question'];?></td>
                            <td><?= $row['answer'];?></td>
                            <?php
                            if (strlen($row['photo']) >= 1) 
                            
                            ?>
                            <td><a href="<?= $row['photo'];?>">Photo</a></td>
                            
                            
                            <!-- <td><?= strlen($row['photo']);?></td> -->
                            <td><?= $row['questionId'];?></td>
                            <td><?= $row['sectionId'];?></td>
                            <td><?= $row['userId'];?></td>
                            <td>   
                            <!-- <a href="delete-user.php" class="btn btn-danger btn-sm">Delete</a> -->
                            <form action="code_filled.php" method="POST">
                                <button type="submit" name="filled_delete_btn" value="<?=$key;?>" class="btn btn-danger btn-sm"> Delete </button>
                            </form>
                            </td>
                        
                </tr>
                <?php

                        }

                    
                        
        // else
        // {

        //     ?>

        <!-- //         <tr>
        //             <td colspan="7">No Record Found</td>
        //         </tr> -->
             <?php




        // }
            } 
 
                
        } 
        
    } 
    

        

    ?>
    <tr>
        <td>





        </td>



    </tr>


</tbody>
                       
</table>


                  
  
<?php
include('includes/footer.php');
?>