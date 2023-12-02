<?php
// Initialize the session
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('location: welcome.php');
    exit();
}

// Include config file
require_once 'db/connect.php';

// Define variables and initialize with empty values
$username = $password = '';
$username_err = $password_err = $login_err = '';

// Processing form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if username is empty
    if (empty(trim($_POST['username']))) {
        $username_err = 'Please enter username.';
    } else {
        $username = trim($_POST['username']);
    }

    // Check if password is empty
    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter your password.';
    } else {
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = 'SELECT id, username, password FROM users WHERE username = ?';

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 's', $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result(
                        $stmt,
                        $id,
                        $username,
                        $hashed_password
                    );
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION['loggedin'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $username;

                            // Redirect user to welcome page
                            header('location: index.php');
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = 'Invalid username or password.';
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = 'Invalid username or password.';
                }
            } else {
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
<title>sign in</title>
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
  

  <div class="ezz">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        } ?>

        <form action="<?php echo htmlspecialchars(
            $_SERVER['PHP_SELF']
        ); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo !empty(
                    $username_err
                )
                    ? 'is-invalid'
                    : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo !empty(
                    $password_err
                )
                    ? 'is-invalid'
                    : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
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