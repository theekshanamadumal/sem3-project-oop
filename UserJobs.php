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
    require_once 'controller/ui.ctrl.php';
    $loginId='971650834v';//$_SESSION['loginID'];
    $uictrll=new uiControl();
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
       <th>Request Type</th>
       <th>User ID</th>
       <th></th>
       
     </tr>
   </thead>
   <!--Table head-->
   <!--Table body-->
   <tbody>
     <tr>
       <th scope="row">1</th>
       <td>Mark</td>
       <td>Otto</td>
       <td>@mdo</td>
       <td><button type="button" class="btn btn-success">Proceed</button></td>       
     </tr>
     
     
   </tbody>
   <!--Table body-->
 </table>
 <!--Table-->
</div>
        </div>
    </div>
<?php include_once('inc/Footer.php'); ?>      
    <?php
    while ($row=$uictrll->fetchData($result)){
        echo "<tr><td class='column1' >" .$row["requestNo"]."</td><td class='column1'>".$row["details"]."</td><td class='column1'>".$row["status"] . "</td><td class='column1'>".$row["description"]."</td></tr>";
    }?>
            </tbody>
        </table>
    <?php
    }
    else   echo "No Jobs Submitted Yet";
    
    ?>
    <?php include_once('inc/Footer.php'); ?>
  </body>

</html>