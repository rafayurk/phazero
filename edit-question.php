<?php
include('authentication.php');
include('includes/header.php');

?>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Edit & Update Question
                            
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                         include('dbcon.php');

                         if(isset($_GET['id'])){

                             $key_child = $_GET['id'];
                             $ref_table = 'QUESTIONS';
                             $getdata = $database->getReference($ref_table)-> getChild($key_child)->getValue();
                             
                             if ($getdata > 0)
                             {

                                 ?>
                            <form action="code_question.php" method="POST">

                            
                                <input type= "hidden" name="key" value="<?=$key_child;?>">

                                <!-- <label for="">Section ID: </label>
                                <input type="hidden" name="sectionId" value="<?php echo($_GET['id']); ?>" class="form-control" readonly> -->

                                <div class="form-group mb-3">
                                    <label for="">Question: </label>
                                    <input type="text" name="question" value="<?=$getdata['question'];?>" class="form-control">



                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="update_question" class="btn btn-primary">Update Question</button>
                            </div>

                            </form>
                            <?php

                        }
                                else {
                                    $_SESSION['status'] = "Invalid ID!";
                                    header('Location: home.php');
                                    exit();
                                }
                             
                            }
                             else {
                                $_SESSION['status'] = "Not found!";
                                header('Location: home.php');
                                exit();
                            }
                            

                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
<?php
include('includes/footer.php');
?>