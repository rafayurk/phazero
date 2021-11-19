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
                            Add Checklist  
                            
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code_checklist.php" method="POST">


                            <div class="form-group mb-3">
                                <label for="">Name of Checklist: </label>
                                <input type="text" name="name" class="form-control">
                            </div>

    

                            
                            <div class="form-group mb-3">
                                <button type="submit" name="create_checklist" class="btn btn-primary">Create Checklist</button>
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