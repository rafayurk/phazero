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
                            Edit & Update Section
                            
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php 
                         include('dbcon.php');

                         if(isset($_GET['id'])){

                             $key_child = $_GET['id'];
                             $ref_table = 'SECTIONS';
                             $getdata = $database->getReference($ref_table)-> getChild($key_child)->getValue();
                             
                             if ($getdata > 0)
                             {

                                 ?>
                            <form action="code_section.php" method="POST">


                            <input type= "hidden" name="key" value="<?=$key_child;?>">

                            <div class="form-group mb-3">
                                <label for="">Section Name: </label>
                                <input type="text" name="name" class="form-control">

                            </div>
                            
                            <div class="form-group mb-3">
                                <button type="submit" name="update_section" class="btn btn-primary">Update Section</button>
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