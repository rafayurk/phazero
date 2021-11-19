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
                            Questions  
                            
                        </h4>
                        <?php
                      echo  "<a href=add_question.php?id={$_GET['id']}  class= 'btn btn-primary float-en' role='button'> Add Question </a><br>" ; 
                      ?>
                    </div>
                    <div class="card-body">
                    

                            <?php
                                include('dbcon.php');
                                $ref_table = 'QUESTIONS';
                                $fetchdata = $database->getReference($ref_table)->getValue();
                                $ref = 'ANSWERED_QUESTIONS';
                                $fetchanswers = $database->getReference($ref)->getValue();
                                $check_table = 'SECTIONS';
                                $checklistid =  $database->getReference($check_table)->getValue();
                                
                                // $fetchchild = $database->getReference($ref_table)-> getChild($_GET['id']) -> getValue();
                                // sect_ref = $fetchdata -> getReference()
                                //checklist_ref =  get Refer3ence (checlists) -> getChild ('drilling operation) 
                                // section referemce = getReference (checklist_ref) = 
                                //  print_r($fetchdata);
                                
                                 
                                foreach($fetchdata as $key => $row){
                                    // echo "1st loop";
                                    foreach($fetchanswers as $i => $j){
                                        // echo "2nd loop";
                                        if ($row['sectionId'] == $_GET['id']  ){
                                            // echo "1st if";
                                            if ($row['id'] == $j['questionId'] ){
                                                // echo "2nd if";
                                                if(strlen($j['answer'])>=1){
                                                    // echo "3rd if </br>";
                                                    // echo "Answer is higher than 1";
                                                    // print_r(strlen($j['answer']));
                                                    echo  "<a href=view_filled_questions.php?id={$key}> {$row['question']} </a><br>" ;
      
                                                } else{
                                                    // echo "Answer is less than 1";
                                                    echo "Answer is coming here: " ;
                                                    echo($row['question']);
                                                }
                                            } 
                                            else {
                                                if ($row['sectionId'] == $_GET['id'])
                                                // if ($row['id'] == $j['questionId'] )
                                                echo "My first IF condition";
                                                echo($row['question']);
                                                break;
                                                
                                                // continue;

                                            }
                                            
                                    } 
                                    // else {
                                    //     // echo "Answer is less than 1"
                                    //     if ($row['sectionId'] == $_GET['id']  )
                                    //     // if ($row['id'] == $j['questionId'] )
                                    //     echo($row['question']);
                                    //     echo "Reaching this IF condition </br>";
                                    //     continue;
                                    // }
                                }
                                }

                                
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