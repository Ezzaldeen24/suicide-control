<?php

require_once 'db/connect.php';
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('location: welcome.php');
    exit();
}
?>
 





 <!DOCTYPE html>

<html lang="">
<head>
<title>S.C</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('image/a2.jpg');"> 
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
          <li><a class="drop" href="">Glimmer of hope</a>
            <ul>
              <li><a href="glimmer of hope.html">Experiences</a></li>
              <li><a href="advices.html">Advices</a></li>
              
            </ul>
            <ul>
              <li><a href="glimmer of hope.html">Experiences</a></li>
              <li><a href="advices.html">Advices</a></li>
              
            </ul>
          </li>          <li><a href="therapists.html">Therapists</a></li>
        <li><a href="contact us.html">Contact Us</a></li>


        <?php if (
            isset($_SESSION['loggedin']) ||
            $_SESSION['loggedin'] == true
        ): ?>
    <li><a href="logout.php">Logout</a></li>
<?php endif; ?>
        
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>

    
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
 
    <div class="text-box2">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
   
    <h1 class="my-5">&nbsp  Hi, <b><?php echo htmlspecialchars(
        $_SESSION['username']
    ); ?></b>. Welcome to our site.</h1>



    <article>
      <p></p>
      <h3 class="heading">Suicide Control</h3>
      <p>SAFER CARE FOR THOSE AT RISK OF SUICIDE..<br>
        Suicide control is a Transformational Framework for Health and Behavioral Health Care Systems
        The foundational belief of Suicide control is that suicide deaths for individuals under the care of health and behavioral health systems are preventable. For systems dedicated to improving patient safety, Suicide control presents an aspirational challenge and practical framework for system-wide transformation toward safer suicide care.</p>


    </article>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <section id="services">
      <h6 class="heading font-x3">Why do some people have suicidal thoughts?</h6>
      <p class="btmspace-80 bold">Suicidal feelings can affect anyone, of any age, gender or background, at any time.</p>
      <ul class="nospace group">
        <li class="one_quarter">
          <article>
            <h6 class="heading">Social Isolation</h6>
            <p>A person can become socially isolated for many reasons, including losing friends or a spouse, undergoing a separation or divorce, physical or mental illness, social anxiety, retirement.</p>
            <footer><a class="btn" href="#">See Details</a></footer>
          </article>
        </li>
        <li class="one_quarter">
          <article>
            <h6 class="heading">Traumatic Stress</h6>
            <p>A person who has had a traumatic experience, including childhood sexual abuse, rape, physical abuse, or war trauma, is at a greater risk for suicide, even many years after the trauma.</p>
            <footer><a class="btn" href="#">See Details</a></footer>
          </article>
        </li>
        <li class="one_quarter">
          <article>
            <h6 class="heading">Substance Use and Impulsivity</h6>
            <p>Drugs and alcohol can also influence a person who is feeling suicidal, making them more impulsive and likely to act upon their urges than they would be while sober.</p>
            <footer><a class="btn" href="#">See Details</a></footer>
          </article>
        </li>
        <li class="one_quarter">
          <article>
            <h6 class="heading">Loss or Fear of Loss</h6>
            <p>Academic failure<br>
              Bullying, shaming, or humiliation, including cyberbullying<br>
              Financial problems<br>
              End of a close friendship or romantic relationship<br>
            
              
            <footer><a class="btn" href="#">See Details</a></footer>
          </article>
        </li>
      </ul>
    </section>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('image/pexels-pixabay-38537.jpg');">
  <section class="hoc container clear">
    <div class="points group"> 
      <!-- ################################################################################################ -->
      <div class="sectiontitle">
        <p class="nospace font-xs">Supporting</p>
        <h6 class="heading font-x2">How can I help someone who is having suicidal thoughts?</h6>
      </div>
      <p class="btmspace-80 bold">If you think that someone might be having suicidal thoughts<br> you can encourage them to talk about how they’re feeling</p>
      <figure class="one_half first">
        <ul class="nospace clear">
          <li><a href="#"><i class="fab fa-fly"></i></a>
            <p>Empathise with them. Be aware you don’t know exactly how they feel. You could say something like, ‘I can’t imagine how painful this is for you, but I would like to try to understand.</p>
          </li>
          <li><a href="#"><i class="fab fa-ethereum"></i></a>
            <p>Encourage them to seek help that they are comfortable with. Such as help from a doctor or counsellor, or support through a charity.</p>
          </li>
          <li><a href="#"><i class="fas fa-tree"></i></a>
            <p>Ask about their reasons for living and dying and listen to their answers. Try to explore their reasons for living in more detail.</p>
          </li>
        </ul>
      </figure>
      <div class="one_half"><img class="borderedbox inspace-10" src="image/Two-Women-Talking.jpg" alt=""></a></div>
      <!-- ################################################################################################ -->
    </div>
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('image/233.jpg');">
<section class="hoc container clear">
    <div class="points1 group">
    <div class="sectiontitle1">
        <p class="nospace font-xs">Youtube section</p>
        <h6 class="heading font-x2">Channels may help you</h6>
      </div>
      <section class="neon bd-container">
            <div class="neon__container">
                <div class="neon__card">
                    <svg class="neon__icon" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        
                    </svg>
                    <h1 class="neon__title">Psych2Go</h1>
                    <img src="image/ps.png">
                    <p class="neon__description">suicidal thoughts Channel</p>
                    <a href="https://www.youtube.com/c/Psych2go" class="neon__button">Click here
                        <svg class="neon__button-icon" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            
                        </svg>
                    </a>
                </div>
    
                <div class="neon__card">
                    <svg class="neon__icon" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        
                    </svg>
                    <h1 class="neon__title">Tracey Marks</h1>
                    <img src="image/dr.png">
                    <p class="neon__description">suicidal thoughts Channel</p>
                    <a href="https://www.youtube.com/c/DrTraceyMarks" class="neon__button">Click here
                        <svg class="neon__button-icon" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            
                        </svg>
                    </a>
                </div>
    
                <div class="neon__card">
                    <svg class="neon__icon" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                       
                    </svg>
                    <h1 class="neon__title">Kati Morton</h1>
                    <img src="image/dr2.png">
                    <p class="neon__description">Life coach Channel</p>
                    <a href="https://www.youtube.com/c/Katimorton" class="neon__button">Click here
                        <svg class="neon__button-icon" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            
                        </svg>
                    </a>
                </div>
            </div>
        </section>
</div>
    <!-- ################################################################################################ -->
  </section>
</div>
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