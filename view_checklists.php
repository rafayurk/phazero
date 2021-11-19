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
                            Checklists   
                            <a href="add_checklist.php" class="btn btn-primary float-end"> Add Checklist </a>
                            
                        </h4>
                    </div>
                    <div class="card-body">

                    <table class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                <th>Checklist Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                            <?php
                                include('dbcon.php');
                                $ref_table = 'CHECKLISTS';
                                $fetchdata = $database->getReference($ref_table)->getValue();
                                
                                
                                
                                
                                foreach($fetchdata as $key => $row) {

                                    ?>
                                    
                                    <tr>
                                        <td>
                                            <?php
                                            
                                            echo "<a href=view_section2.php?id={$key}> {$row['name']} </a>" ; 
                                                                                    
                                            ?>
                                        </td> 
                                        <td>
                                            <a href="edit-checklist.php?id=<?=$key;?>" class="btn btn-primary btn-sm">Edit</a>
                                        </td> 
                                        <td>   
                                            <!-- <a href="delete-checklist.php" class="btn btn-danger btn-sm">Delete</a> -->
                                            <form action="code_checklist.php" method="POST">
                                                    <button type="submit" name="checklist_delete_btn" value="<?=$key;?>" class="btn btn-danger btn-sm"> Delete </button>
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