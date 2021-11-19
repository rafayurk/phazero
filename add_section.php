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
                            Add Section
                            
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code_section.php" method="POST">


                            <div class="form-group mb-3">
                                <label for="">Name of Section: </label>
                                <input type="text" name="name" class="form-control">

                        

                                <label for="">Checklist ID: </label>
                                <input type="text" name="checklistId" value="<?php echo($_GET['id']); ?>" class="form-control" readonly>


                            </div>

    

                            
                            <div class="form-group mb-3">
                                <button type="submit" name="create_section" class="btn btn-primary">Create Section</button>
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