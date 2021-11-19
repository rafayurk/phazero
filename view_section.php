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
                    <!-- <a href="add_section.php" class="btn btn-primary ">Add Section</a> -->
                    
                
                            <?php
                                include('dbcon.php');
                                // print_r($_GET['id']); //checklist ID

                                $ref_table = 'SECTIONS';
                                $fetchdata = $database->getReference($ref_table)->getValue();
                                $check_table = 'CHECKLISTS';
                                $checklistid =  $database->getReference($check_table)->getValue();
                                
                                // $fetchchild = $database->getReference($check_table)-> getValue($_GET['id']);
                               
                                // sect_ref = $fetchdata -> getReference()
                                //checklist_ref =  get Refer3ence (checlists) -> getChild ('drilling operation) 
                                // section referemce = getReference (checklist_ref) = 
                                //  print_r($fetchdata);
                                
                                 
                             
                                    foreach($fetchdata as $key => $row){
                                        
                                        if ($row['checklistId'] == $_GET['id']  ){
                                            // print_r($fetchchild);
                                            // print_r($j);
                                            // print_r($row['checklistId']);
                                            // print_r($_GET['id']);
                                            // print_r($fetchchild);
                                            echo  "<a href=view_questions.php?id={$key}> {$row['name']} </a><br>" ;

                                        }
                                    }

                                

                                // foreach($fetchchild as $key => $row){
                                //    print_r($key);
                                //    print_r($row);
                                        
                                  
                                    // echo  "<a href=view_questions.php?id={$key}> {$row['name']} </a><br>" ;

                                
                            
                                // print_r($key);
                        
                                // echo  "<a href=view_section.php?id={$key}> {$row['id']} </a><br>" ;
                                // echo  "<a href=view_questions2.php?id={$key}> {$key}</a><br>"

                                //  <a href="view_section.php?id=$fetchdata">$fetchdata</a>
                                
                               
                                // foreach($fetchdata['Drilling Operations'] as $result) {
                                //     echo $result, '<br>';
                                // }
                                // print_r($fetchdata['Drilling Operation']);

                                // if($fetchdata>0)
                                // {

                                //     $i = 1;
                                //     foreach($fetchdata as $key => $row)
                                //     {
                                        ?>
                             
                  
  
<?php
include('includes/footer.php');
?>