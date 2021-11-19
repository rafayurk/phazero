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
                            Add Question
                            
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code_question.php" method="POST">


                            <div class="form-group mb-3">
                                <label for="">Question: </label>
                                <input type="text" name="question" class="form-control">

                        

                                <label for="">Section ID: </label>
                                <input type="text" name="sectionId" value="<?php echo($_GET['id']); ?>" class="form-control" readonly>

                            <?php
                                include('dbcon.php');
                                $check_table = 'SECTIONS';
                                $checklistid =  $database->getReference($check_table)->getValue();
                            

                                foreach($checklistid as $key => $row){
                                        
                                    if ($row['id'] == $_GET['id']  ){
                                        // print_r($fetchchild);
                                        // print_r($j);
                                        // print_r($row['question']);
                                        // print_r($_GET['id']);
                            ?>
                                        
                                        <label for="">Checklist ID: </label>
                                        <input type="text" name="checklistId" value="<?php echo($row['checklistId']); ?>" class="form-control" readonly>
                                        
                            <?php
                                    }
                                }
                            
                            ?>   
                            

                            </div>

    

                            
                            <div class="form-group mb-3">
                                <button type="submit" name="create_question" class="btn btn-primary">Create Question</button>
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