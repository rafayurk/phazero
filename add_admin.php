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
                            Add Admin  
                            
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">


                            <div class="form-group mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="create_admin" class="btn btn-primary">Create Admin</button>
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