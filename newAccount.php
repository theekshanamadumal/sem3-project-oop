<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create new account</title>
</head>
<body>
<?php include_once("inc/Header.php"); ?><br>
<link rel="stylesheet" href="css/newAccount.css?">

<?php
    if (isset($_POST['submit'])) {

        $ID=$_POST["ID"];    
        $pw1=$_POST["password1"];
        $pw2=$_POST["password2"];
        
        $first_name=$_POST['first_name'];
        $second_name=$_POST['second_name'];
        $address=$_POST['address'];
        $telephone=$_POST['telephone'];
        $email=$_POST['email'];
        $school=$_POST['school'];
        $occupation=$_POST['occupation'];

        require_once 'controller/newAcc.ctrl.php';
        require_once 'inc/alert.view.php';
        $newAcCtrll=new newAccCtrl();
        $alertView=new alert();
        list($message,$status)=$newAcCtrll->createAccount($ID,$pw1,$pw2,$first_name,$second_name,$address,$telephone,$email,$school,$occupation);
        echo $alertView->showAlert($message,$status);
    }
?>
<div class="row">

<div class = "col-sm-3"></div>
<div class = "col-sm-6">
<div class="col-md-auto "> 
<div  class="form-container">

    <form action = "newAccount.php" method="POST" style="border: none;">
    <div class="container" class="textInput">
 <input name="ID" type="text" placeholder="National ID Number" value="<?php echo isset($_POST["ID"]) ? $_POST["ID"] : ''; ?>" >
 <input name="first_name" type="text"  placeholder="First Name" value="<?php echo isset($_POST["first_name"]) ? $_POST["first_name"] : ''; ?>">
  <input name="second_name" type="text"  placeholder="Last Name" value="<?php echo isset($_POST["second_name"]) ? $_POST["second_name"] : ''; ?>">
  <input name="address" type="text"  placeholder="Address" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>">
  <input name="telephone" type="text"  placeholder="Telephone" value="<?php echo isset($_POST["telephone"]) ? $_POST["telephone"] : ''; ?>">
  <input name="email" type="text"  placeholder="Email Address" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
  <input name="school" type="text"  placeholder="School" value="<?php echo isset($_POST["school"]) ? $_POST["school"] : ''; ?>"><br><br>
  Occupation         
 <select name="occupation"  placeholder="Occupation"><br><br>
 <option value=""></option>
 <option value="teacher">Teacher</option>
 <option value="Principal">Principal</option>
 <option value="Staff">Staff</option>
</select><br>
<div class="info-hover">
    <span class="info-text">Use a Password of at least 8 characters in length,at least one upper case letter and at least one number </span>
  <input name="password1" type="password"  placeholder="Enter Password">
</div>
  <input name="password2" type="password"  placeholder="Confirm Password"> 
  
  <input name="submit"  class="loginbtn" type="submit" value="Submit">
  </div>
</form>
</div>
    </div>
    </div>
    <div class = "col-sm-3"></div>
</div>



<?php include_once('inc/Footer.php'); ?>
</body>
</html>
