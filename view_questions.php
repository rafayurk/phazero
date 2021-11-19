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
                            Questions  
                            <?php
                        echo  "<a href=add_question.php?id={$_GET['id']} class= 'btn btn-primary float-end' role='button'> Add Question </a><br>" ; 
                        ?>
                            
                        </h4>
                        
                    </div>
                    <div class="card-body">

                    <table class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                <th>Question Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                    

                            <?php
                                include('dbcon.php');
                                $ref_table = 'QUESTIONS';
                                $fetchdata = $database->getReference($ref_table)->getValue();
                                $check_table = 'SECTIONS';
                                $checklistid =  $database->getReference($check_table)->getValue();
                                
                               
                                 
                                foreach($fetchdata as $key => $row){
                                        
                                    if ($row['sectionId'] == $_GET['id']  ){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                echo  "<a href=view_filled_questions.php?id={$key}> {$row['question']} </a><br>" ;
                                                ?>
                                            </td>
                                            <td>
                                                <a href="edit-question.php?id=<?=$key;?>" class="btn btn-primary btn-sm">Edit</a>
                                            </td> 
                                            <td>   
                                                <!-- <a href="delete-question.php" class="btn btn-danger btn-sm">Delete</a> -->
                                                <form action="code_question.php" method="POST">
                                                    <button type="submit" name="question_delete_btn" value="<?=$key;?>" class="btn btn-danger btn-sm"> Delete </button>
                                                </form>

                                            </td>  
                                        
                                        </tr>
                                    <?php
                                    }
                                        // print_r($fetchchild);
                                        // print_r($j);
                                        // print_r($row['question']);
                                        // print_r($_GET['id']);

                                        // print_r($fetchchild);
                                        

                                    }
                                

                      
                                        ?>
                    <tr>
                    <td>

                    </td>



                    </tr>


                    </tbody>
                            
                    </table>

                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                             
                  
  
<?php
include('includes/footer.php');
?>