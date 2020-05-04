<<?php include("registerheader.php"); ?>

<?php 

$conn=mysqli_connect("localhost", "root", "", "cofit");

if(!$conn){
  echo "Connection error". mysqli_connect_error();
}

 ?>

<?php
$fn="";
$ln="";
$un="";
$em="";
$pswd="";
$pswd2="";
$he="";
$we="";

  $errors = array('fn' => '', 'ln' => '', 'un' => '', 'em'=> '', 'pswd'=>'', 'pswd2'=>'','he'=>'','we'=>'');

  if(isset($_POST['submit'])){
    
    // check email
    if(empty($_POST['InputEmail'])){
      $errors['em'] = 'An email is required';
    } else{
      $em = $_POST['InputEmail'];
      //$e_check = mysqli_query($conn,"SELECT email FROM users WHERE email='$en'");
      //$check=mysqli_num_rows($e_check);
      //if($check<>0){
        //$errors['em']='This email is already taken';
      //}

      if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
        $errors['em'] = 'Email must be a valid email address';
      }

    }

    if(array_filter($errors)){
      //echo 'errors in form';
    } else {
      // escape sql chars
      $em = mysqli_real_escape_string($conn, $_POST['InputEmail']);
      $fn= mysqli_real_escape_string($conn, $_POST['FirstName']);
      $ln= mysqli_real_escape_string($conn, $_POST['LastName']);
      $un= mysqli_real_escape_string($conn, $_POST['Username']);
      $pswd= mysqli_real_escape_string($conn, $_POST['InputPassword']);
      $pswd2= mysqli_real_escape_string($conn, $_POST['RepeatPassword']);
      $he= mysqli_real_escape_string($conn, $_POST['Height']);
      $we= mysqli_real_escape_string($conn, $_POST['Weight']);

      // create sql
      $sqlinput = "INSERT INTO users(id, username, email, password, firstname, lastname, height, weight) VALUES ('','$un','$em','$pswd','$fn','$ln','$he','$we')";

      // save to db and check
      if(mysqli_query($conn, $sqlinput)){
        // success
        header('Location: login.html');

      } else {
        echo 'query error: '. mysqli_error($conn);
      }

      
    }

  }  else {
    echo "error with button";
    }// end POST check
?>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="#" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="FirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="LastName" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="InputEmail" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input type="username" class="form-control form-control-user" name="Username" placeholder="User Name">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="Height" placeholder="Height (in cm)">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="Weight" placeholder="Weight (in lbs)">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="InputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="RepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <input type="submit" class="btn btn-primary btn-user btn-block" name="submit"value="Sign Up!">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>

</html>
