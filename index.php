<?php
// define variables and set to empty values
$nameErr = $groupErr=array();
 $emailErr = $genderErr=$agreeErr=$SelectedCoursesErr="";
 $classDetailErr="";
 

if($_SERVER['REQUEST_METHOD']=='POST'){
    // Validate name 
    if (empty($_POST["name"])) {
        array_push($nameErr,"* Name is required");
    }else if(preg_match("/[^A-Za-z]/",$_POST['name'] )){
            array_push($nameErr,"* Name must be include characters only");  
    }else{
        $name=$_POST['name'];
    }
    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "* Email is required";
      } else {
        $email = $_POST["email"];
      }

    //   Validate Gender
    if (empty($_POST["gender"])) {
        $genderErr = "* Gender is required";
      } else {
        $gender = $_POST["gender"];
      }

    // validate group number
    if (empty($_POST["group#"])) {
      array_push($groupErr,"* Group Number is required");
      } else if(preg_match("/[^0-9]/",$_POST['group#'])){
        array_push($groupErr,"* Group Number Must be include numbers only");
      }else {
        $group = $_POST["group#"];
      }
    //   Validate agree check
    if(!isset($_POST['agree'])){
      $agreeErr="* you must check agree button :) ";
    }else{
        $agree=$_POST['agree'];
    }

    // Validate class Details
    if(preg_match("/^[A-Za-z0-9.,+]/", $_POST['classDetails']) == 1){
        $classDetails=$_POST['classDetails'];
    }else{
        $classDetailErr="* you must write your own class Details :)";
    }
    // validate selected Courses
    if(!isset($_POST['SelectedCourses'])){
        $SelectedCoursesErr="* you must select one course or more :)";
    }else{
        $SelectedCourses=$_POST['SelectedCourses'];
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submit</title>
    <!-- Bootstrap -->
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
            crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css"
            rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="col-12">Application name: AAST_BIS class registeration </h1>
    </div>
    <div class="container mt-5">
        <p class="col-12" style="color:red;">* Required field.</p>
    </div>
<div class="container mt-5">
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="post" class="row g-3">
            <div class="col-md-12">
                <label for="inputName" class="form-label">Name <span style="color:red;">*<?php  $cont="";
                      for($i=0;$i<count($nameErr);$i++){
                         $cont .=$nameErr[$i]." ";
                       } 
                       echo $cont;
       ?></span></label>
                <input type="name" class="form-control" id="inputName" name="name" value="<?php if(isset($name)) echo $name; ?>">
            </div>
            <div class="col-md-12">
              <label for="inputEmail4" class="form-label">E-mail <span style="color:red;">*<?php  echo $emailErr;?></span></label>
              <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php if(isset($email)) echo $email; ?>">
            </div>
            <div class="col-md-12">
                <label for="inputGroup" class="form-label"> Group# <span style="color:red;"><?php  
                $con="";
                for($i=0;$i<count($groupErr);$i++){
                   $con .=$groupErr[$i]." ";
                 } 
                 echo $con;
                
                ?></span></label>
                <input type="number" class="form-control" id="inputGroup" name="group#" value="<?php if(isset($group)) echo $group; ?>"> 
            </div>
            <div class="col-md-12">
              <label for="inputClass" class="form-label">Class Details<span style="color:red;"><?php echo $classDetailErr;?></span></label>
              <textarea name="classDetails" id="inputClass" class="form-control" cols="30" rows="5" required><?php if(isset($classDetails)){ echo $classDetails;} ?></textarea>
            </div>
            <fieldset class="form-group">
              <div class="row">
                  <legend class="col-form-label col-sm-2 pt-0">Gender <span style="color:red;">*<?php  echo $genderErr;?></span></legend>
                  <div class="col-sm-10">
                     <div class="form-check">
                        <input class="form-check-input" type="radio"  id="gridRadios1"  name="gender" value="female" checked>
                        <label class="form-check-label" for="gridRadios1">
                       Female
                        </label>
                     </div>
                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="male">
                       <label class="form-check-label" for="gridRadios2">
                       Male
                       </label>
                       </div>
                    
                    </div>
                    
               </div>
          </fieldset>
          <div class="col-12">
            <label for="selectCourse" class="form-label">Select Course or More <span style="color:red;"><?php echo $SelectedCoursesErr; ?></span></label>
          <select class="form-select" id="selectCourse" multiple aria-label="multiple select example" name="SelectedCourses[]" value="<?php if(isset($SelectedCourses)){ $container=null;for($i=0;$i<count($SelectedCourses);$i++){
              $container.=$SelectedCourses[$i];} echo $container;}?>">
                <option value="PHP">PHP</option>
               <option value="Javascript">Javascript</option>
               <option value="MySQL">MySQL</option>
               <option value="HTML">HTML</option>
          </select>
          </div>
          
          <div class="form-group row mt-5">
                    <div class="col-sm-2">Agree <span style="color:red;">*<?php echo $agreeErr; ?></span></div>
                       <div class="col-sm-10">
                          <div class="form-check">
                             <input class="form-check-input" name="agree" type="checkbox" id="gridCheck1">
                             <label class="form-check-label" for="gridCheck1">
                               
                             </label>
                           </div>
                      </div>
         </div>
           
            <div class="col-12 mb-5">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
    </div>
   
    <div class="container mt-5">

        <?php if($_SERVER['REQUEST_METHOD']=='POST'){ ?>
       <h1 class="col-12">Your Data:</h1>
       <?php }?>

       <?php if(isset($name)){ ?>
       <p class="col-12">Name is <?php  echo $name; ?></p>
       <?php }?>

       <?php if(isset($email)){ ?>
       <p class="col-12">Email is <?php  echo $email; ?></p>
       <?php }?>

       <?php if(isset($group)){ ?>
       <p class="col-12">Group Number is <?php  echo $group; ?></p>
       <?php }?>

       <?php if(isset($classDetails)){ ?>
       <p class="col-12">Class Details is <?php echo $classDetails; ?></p> 
       <?php }?>


       <?php if(isset($gender)){ ?>
       <p class="col-12">Gender is <?php  echo $gender; ?></p>
       <?php }?>
       <?php 
    if(isset($SelectedCourses)){ 
        $container=null;
        for($i=0;$i<count($SelectedCourses);$i++){
           $container.=$SelectedCourses[$i]." ";
       }
        ?>
        <p class="col-12">Selected Courses Are: <?php echo $container; ?></p>
        <?php }?>
    </div>

<!-- Bootstrap files -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
        <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
