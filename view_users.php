<?php
// session_start();
include('authentication.php');
include('includes/header.php');

?>
    <!-- <h1>PhazeRo</h1>
    <h3>A project by Rafay, Nihad, Muhammad and Premices</h3> -->

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
                            Inspectors  
                            <a href="add_user.php" class="btn btn-primary float-end"> Add Inspector </a>
                            <!-- <a href="add-checklist.php" class="btn btn-primary float-end" style="margin:1px;"> Add Checklist </a> -->
                        </h4>
                    </div>
                    <div class="card-body">


                        <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('dbcon.php');
                                $ref_table = 'Inspector';
                                $fetchdata = $database->getReference($ref_table)->getValue();

                                if($fetchdata>0)
                                {

                                    $i = 1;
                                    foreach($fetchdata as $key => $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $i++;?></td>
                                            <td><?= $row['fname'];?></td>
                                            <td><?= $row['lname'];?></td>
                                            <td><?= $row['email'];?></td>
                                            <td><?= $row['password'];?></td>
                                            <td>
                                                <a href="edit-user.php?id=<?=$key;?>" class="btn btn-primary btn-sm">Edit</a>
                                            </td> 
                                            <td>   
                                                <!-- <a href="delete-user.php" class="btn btn-danger btn-sm">Delete</a> -->
                                                <form action="code_user.php" method="POST">
                                                    <button type="submit" name="user_delete_btn" value="<?=$key;?>" class="btn btn-danger btn-sm"> Delete </button>
                                                </form>

                                            </td>
                                        </tr>
                                        <?php


                                    }

                                }
                                else
                                {

                                    ?>

                                        <tr>
                                            <td colspan="7">No Record Found</td>
                                        </tr>
                                    <?php




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