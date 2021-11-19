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
                            Sections  
                            <?php
                     echo  "<a href=add_section.php?id={$_GET['id']}   class= 'btn btn-primary float-end' role='button'> Add Section </a><br>" ; ?>
                            
                        </h4>
                        
                    </div>
                    <div class="card-body">

                    <table class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                <th>Section Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                            <?php
                                include('dbcon.php');
                                $ref_table = 'SECTIONS';
                                $fetchdata = $database->getReference($ref_table)->getValue();
                    
                                foreach($fetchdata as $key => $row) {
                                   
                                    if ($row['checklistId'] == $_GET['id']  ){

                                        ?>
                                    
                                        <tr>
                                            <td>
                                                <?php
                                                
                                                echo  "<a href=view_questions.php?id={$key}> {$row['name']} </a><br>" ;
                                                                                        
                                                ?>
                                            </td> 
                                            <td>
                                                <a href="edit-section.php?id=<?=$key;?>" class="btn btn-primary btn-sm">Edit</a>
                                            </td> 
                                            <td>   
                                                <!-- <a href="delete-section.php" class="btn btn-danger btn-sm">Delete</a> -->
                                                <form action="code_section.php" method="POST">
                                                    <button type="submit" name="section_delete_btn" value="<?=$key;?>" class="btn btn-danger btn-sm"> Delete </button>
                                                </form>

                                            </td>           
                                                                        
                                        </tr>
                                    <?php
                                    }
                                

                    




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