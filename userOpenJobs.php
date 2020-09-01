<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Jobs Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

  </head>
  <body>
  <?php include_once("inc/Header.php"); ?>
  <link rel="stylesheet" href="css/newJobs.css">
    <?php 
    require_once 'controller/userJob.ctrl.php';
    $loginId=$_SESSION['loginID'];
    $uictrll=new uiTableControl();
    $result=$uictrll-> requestHistory($loginId);
    if ($uictrll->hasJobsSubmitted($result)) {
        ?>

      <p id="demo"></p>
      <div class="row">
      <div class="col-sm-8"> </div>
        <div class="col-sm-4"> 
        <div class="search-bar"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."></div>
        </div>
      </div>
      <div>
      <div class='table-responsive'>
 <!--Table-->
 <table id="tablePreview" class="table table-hover table-striped">
 <!--Table head-->
   <thead>
     <tr>
       <th>Request #</th>
       <th>Request ID</th>
       <th>Status</th>
       <th>Description</th>
       <th></th>
       
     </tr>
   </thead>
   <tbody>
     <?php
   
    
    while ($row=$uictrll->fetchData($result)){
        $rowdata= "<tr><td class='column1'>" .$row["requestNo"]
                 ."</td><td class='column1'>".$row["details"]
                 ."</td><td class='column1'>".$row["status"]
                 ."</td><td class='column1'>".$row["description"]."</td>";

        $finishButton='<td> <form method="post"> 
        <input type="hidden" name="requestNo" value='.$row["requestNo"].'>
    
        <input type="submit" name="Finish"
                class="btn btn-secondary " value="Finish" id='.$row["requestNo"].' )" /> </form></td></tr>';




        $resumeButton='<td> <form method="post"> 
        <input type="hidden" name="requestNo" value='.$row["requestNo"].'>
        <input type="submit" name="Resume"
                class="btn btn-warning" value="Resume" /> </form></td></tr>';
             
        
        switch ($row["status"]) {
          case 'completed':
            echo $rowdata,$finishButton;
            break;
          
          case 'pending':
            echo $rowdata,$resumeButton;
          break;
          
          default:
            echo $rowdata,'<td></td></tr>';
            break;
        }
    }?>
            </tbody>
        </table>
        </div>
  </div>
  

    <?php
    }
    else   echo "No Jobs Submitted Yet";
    
    ?>


    <?php
        $uiButtonCtrl= new uiButtonControl();

        if(array_key_exists('Finish', $_POST)) { 
          
          
            $uiButtonCtrl->finishButton($_POST["requestNo"]); 
        } 
        else if(array_key_exists('Resume', $_POST)) { 
          
          $uiButtonCtrl->resumeButton($_POST["requestNo"]);  
        } 
         
    ?> 


    
 
    <?php include_once('inc/Footer.php'); ?>
    
  </body>

</html>



   

   