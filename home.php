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
                            HSE Checklists  
                        
                        </h4>
                    </div>
                    <div class="card-body">
                    <a href="view_checklists.php" class="btn btn-primary ">View Checklists</a>
                        
                    <br> <br> 
                    <a href="add_checklist.php" class="btn btn-primary ">Add a New Checklist</a>

                    </div>


                    <div class="card">
                    <div class="card-header">
                        <h4>
                            HSE Admins  
                        </h4>
                    </div>
                    <div class="card-body">
                    <a href="view_admins.php" class="btn btn-primary ">View Admins</a>
                            <br> <br> 
                    <a href="register_admin.php" class="btn btn-primary ">New Admins</a>

                    </div>


                    <div class="card">
                    <div class="card-header">

                        <h4>
                            HSE Application Users
                        </h4>
                    </div>
                    <div class="card-body">
                    <a href="view_users.php" class="btn btn-primary ">View Users</a>
                            <br> <br> 
                    <a href="add_user.php" class="btn btn-primary ">New User</a>

                    </div>



                </div>
            </div>
        </div>
    </div>
  
<?php
include('includes/footer.php');
?>