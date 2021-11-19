<?php
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
                            Registered Admins  
                            <a href="register_admin.php" class="btn btn-primary float-end" style="margin:5px;"> Register Admin </a>
                            
                           
                        </h4>
                    </div>
                    <div class="card-body">


                        <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Display</th>
                                <th>Email</th>
                                <!-- <th>Password (Hashed)</th> -->
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('dbcon.php');
                            $users = $auth->listUsers();

                            $i = 1;
                            foreach ($users as $user) {

                                ?>
                                        <tr>
                                            <td><?= $i++;?></td>
                                            <td><?= $user->displayName;?></td>
                                            <td><?= $user->email;?></td>
                                            <!-- <td><?= $user->passwordHash;?></td>  -->
                                            <!-- <td><?= $row['fname'];?></td>
                                            <td><?= $row['lname'];?></td>
                                            <td><?= $row['email'];?></td>
                                            <td><?= $row['password'];?></td> -->
                                            <td>
                                                <a href="edit-admin.php?id=<?=$user->uid; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            </td> 
                                            <td>   
                                                <!-- <a href="delete-admin.php" class="btn btn-danger btn-sm">Delete</a> -->

                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="user_delete_btn" value="<?=$user->uid;?>" class="btn btn-danger btn-sm"> Delete </button>
                                                </form>

                                            </td>
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