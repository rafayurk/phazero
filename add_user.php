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
                            Add Inspector  
                            
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code_user.php" method="POST">


                            <div class="form-group mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="insp_first_name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="insp_last_name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="insp_password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" name="insp_email" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="create_user" class="btn btn-primary">Create User</button>
                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
<?php
include('includes/footer.php');
?>