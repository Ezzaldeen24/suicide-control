<?php
// Include config file
require_once 'db/connect.php';

     





// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = '';
$username_err = $password_err = $email_err = $confirm_password_err = '';

// Processing form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate username
    if (empty(trim($_POST['username']))) {
        $username_err = 'Please enter a username.';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST['username']))) {
        $username_err =
            'Username can only contain letters, numbers, and underscores.';
    } else {
        // Prepare a select statement
        $sql = 'SELECT id FROM users WHERE username = ?';

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 's', $param_username);




            $gender=$_POST['submit'];
            $sql="INSERT INTO sc(gender)
            names('$gender')";

            // Set parameters
            $param_username = trim($_POST['username']);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = 'This username is already taken.';
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo 'Oops! Something went wrong. Please try again later.';
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate Email
    if (empty(trim($_POST['email']))) {
        $email_err = 'Please enter a email.';
    } else {
        $email = trim($_POST['email']);
    }

    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter a password.';
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $password_err = 'Password must have atleast 6 characters.';
    } else {
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = 'Please confirm password.';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if (empty($password_err) && $password != $confirm_password) {
            $confirm_password_err = 'Password did not match.';
        }
    }

    // Check input errors before inserting in database
    if (
        empty($username_err) &&
        empty($password_err) &&
        empty($email_err) &&
        empty($confirm_password_err)
    ) {
        // Prepare an insert statement
        $sql = 'INSERT INTO users (username,email,password) VALUES (?,?,?)';

        echo $email;

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param(
                $stmt,
                'sss',
                $param_username,
                $param_email,
                $param_password
            );

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                echo 'SUCCEESS123123';
                header('location: login.php');
            } else {
                echo 'SUCCEESS123123123123';
                echo 'Oops! Something went wrong. Please try again later.';
            }


            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>







<!DOCTYPE html>

<html lang="">
<head>
<title>Register</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('image/sunset.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 
      <!-- ################################################################################################ -->
      
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <div id="logo" class="fl_left"> 
        
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
      </div>
      <nav id="mainav" class="fl_right"> 
        <a href="index.php"><img src="image/mylogo.png"></a>   

        <!-- ################################################################################################ -->
        <ul class="clear">
          
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="login.php">Sign in</a></li>
          <li><a class="drop" href="">Glimmer of hope</a>
            <ul>
              <li><a href="glimmer of hope.html">Experiences</a></li>
              <li><a href="advices.html">Advices</a></li>
              
            </ul>
          </li>          <li><a href="therapists.html">Therapists</a></li>
        <li><a href="contact us.html">Contact Us</a></li>
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>
  

  <div class="container55">
   <h2>Sign Up</h2>
   <form action="<?php echo htmlspecialchars(
       $_SERVER['PHP_SELF']
   ); ?>" method="post">
       <div class="user-details .input-box input">
           <label>Username</label>
           <input type="text" name="username" class="form-control <?php echo !empty(
               $username_err
           )
               ? 'is-invalid'
               : ''; ?>" value="<?php echo $username; ?>">
           <span class="invalid-feedback"><?php echo $username_err; ?></span>
       </div>  
       
       <div class="user-details .input-box input">
           <label>Email</label>
           <input type="text" name="email" class="form-control <?php echo !empty(
               $email_err
           )
               ? 'is-invalid'
               : ''; ?>" value="<?php echo $email; ?>">
           <span class="invalid-feedback"><?php echo $email_err; ?></span>
       </div> 
       <div class="user-details .input-box input">
           <label>Password</label>
           <input type="password" name="password" class="form-control <?php echo !empty(
               $password_err
           )
               ? 'is-invalid'
               : ''; ?>" value="<?php echo $password; ?>">
           <span class="invalid-feedback"><?php echo $password_err; ?></span>
       </div>
       <div class="user-details .input-box input">
           <label>Confirm Password</label>
           <input type="password" name="confirm_password" class="form-control <?php echo !empty(
               $confirm_password_err
           )
               ? 'is-invalid'
               : ''; ?>" value="<?php echo $confirm_password; ?>">
           <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
       </div>
       <div class="gender-details">
           <form action="" method="post">
               
       <input type="radio" name="gender" value="patient" id="dot-1">
       <input type="radio" name="gender" value="volunteer" id="dot-2">
       <input type="radio" name="gender" value="doctor" id="dot-3">
       <span class="gender-title"></span>
       <div class="category">
         <label for="dot-1">
         <span class="dot one"></span>
         <span class="gender">Patient</span>
       </label>
       <label for="dot-2">
         <span class="dot two"></span>
         <span class="gender">Volunteer</span>
       </label>
       <label for="dot-3">
         <span class="dot three"></span>
         <span class="gender">Doctor</span>
         </label>
       </div>
     </div>

       <div class="button">
           <input type="submit" name="submit" class="btn btn-primary" value="Submit">
       </div>

       
       
       <p>Already have an account? <a href="login.php">Login here</a>.</p>
   </form>
</div>    









<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Bottom Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('image/sea-and-the-rocks-11.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row4">
    <footer id="footer" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div class="group btmspace-50">
        <div class="one_quarter first">
          <h6 class="heading">S.C</h6>
          <p>We can all help prevent suicide. Suicide Control provides 24/7, free and confidential support for people in distress, prevention and crisis resources for you or your loved ones, and best practices for professionals in Egypt.[<a href="#">&hellip;</a>]</p>
          <ul class="faico clear">
            <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
            <li><a class="faicon-linkedin" href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a class="faicon-vk" href="https://www.youtube.com/c/Psych2go"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
        <div class="one_quarter">
          <h6 class="heading"></h6>
          <ul class="nospace linklist">
            <li><a href="#">FAQs</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="one_quarter">
          <h6 class="heading">if you want to join our team</h6>
          <p class="nospace btmspace-15">Enter your name and email, and we will contact with you as soon as possible.</p>
          <form action="https://formspree.io/f/moqrypad" method="post" autocomplete="off">
            <fieldset>
              <legend>Newsletter:</legend>
              <input class="btmspace-15" type="text" value="" placeholder="Name" name="name">
              <input class="btmspace-15" type="text" value="" placeholder="Email" name="email">
              <button class="btn" type="submit" value="submit">Submit</button>
            </fieldset>
          </form>
        </div>
        <div class="one_quarter">
          <h6 class="heading">Emergency contact</h6>
          <p>
          <li><a href="tel:+02010333333333">+020-10333-333-333</a></li>
          <li><a href="tel:+02011666333333">+020-11666-333-333</a></li>
          <br><br><br>
          <li><a href="em">Suicide_Control.gov.eg</a></li>

        </p>
          
        </div>
      </div>
      <!-- ################################################################################################ -->
      <hr class="btmspace-50">
      <!-- ################################################################################################ -->
      <nav>
        <ul class="nospace">
        <li><a href="index.php"><i class="fas fa-lg fa-home"></i></a></li>
          <li><a href="#">About</a></li>
          <li><a href="login.php">login</a></li>
          <li><a href="glimmer of hope.html">Experiences</a></li>
          <li><a href="advices.html">Advices</a></li>
          <li><a href="therapists.html">Therapists</a></li>
          <li><a href="contact us.html">Contact us</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </footer>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved.</p>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Bottom Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>