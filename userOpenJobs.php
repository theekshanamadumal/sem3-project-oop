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
   
    $finishButton='<td> <form method="post"> 
    <input type="hidden" name="requestNo" value={$row["requestNo"]}>

    <input type="submit" name="Finish"
            class="btn btn-secondary" value="Finish" /> </form></td></tr>';
    $resumeButton='<td> <form method="post"> 
    <input type="hidden" name="requestNo" value={$row["requestNo"]}>
    <input type="submit" name="Resume"
            class="btn btn-warning" value="Resume" /> </form></td></tr>';

    while ($row=$uictrll->fetchData($result)){
        $rowdata= "<td class='column1' >" .$row["requestNo"]."</td><td class='column1'>".$row["details"]."</td><td class='column1'>".$row["status"] . "</td><td class='column1'>".$row["description"]."</td>";
        
        switch ($row["status"]) {
          case 'completed':
            echo $rowdata,$finishButton;
            break;
          
          case 'pending':
            echo $rowdata,$resumeButton;
          
          default:
            echo'</tr>';
            break;
        }
    }?>
            </tbody>
        </table>
        </div>
  </div>
  </div>
    <?php
    }
    else   echo "No Jobs Submitted Yet";
    
    ?>


    <?php
        $uiButtonCtrl= new uiButtonControl();

        if(array_key_exists('Finish', $_POST)) { 
          echo $_POST["requestNo"];
            $uiButtonCtrl->finishButton($_POST["requestNo"]); 
        } 
        else if(array_key_exists('Resume', $_POST)) { 
          echo $row["requestNo"];
          $uiButtonCtrl->resumeButton($row["requestNo"]);  
        } 
         
    ?> 


    
 
    <?php include_once('inc/Footer.php'); ?>
  </body>

</html>



   

   