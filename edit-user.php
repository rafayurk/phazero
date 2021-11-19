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
                            Edit & Update Users 
                            <a href="view_users.php" class="btn btn-danger float-end"> Back </a>

                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            include('dbcon.php');

                            if(isset($_GET['id'])){

                                $key_child = $_GET['id'];
                                $ref_table = 'Inspector';
                                $getdata = $database->getReference($ref_table)-> getChild($key_child)->getValue();
                                
                                if ($getdata > 0)
                                {

                                    ?>


                                <form action="code_user.php" method="POST">

                                    <input type= "hidden" name="key" value="<?=$key_child;?>">
                                    <div class="form-group mb-3">
                                        <label for="">First Name</label>
                                        <input type="text" name="first_name" value="<?=$getdata['fname'];?>" class="form-control">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name" value="<?=$getdata['lname'];?>" class="form-control">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Password</label>
                                        <input type="password" name="password" value="<?=$getdata['password'];?>" class="form-control">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="email" value="<?=$getdata['email'];?>" class="form-control">
                                    </div>

                                    <div class="form-group mb-3">
                                        <button type="submit" name="update_user" class="btn btn-primary">Update Admin</button>
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