<?php
require_once "administratie/recaptchalib.php";
require("administratie/connection.php");
include("administratie/functions.php");

$resultMsg = '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Roselles musicale duo</title>

	<link href="https://fonts.googleapis.com/css?family=Smythe" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">

  </head>
<body>
<!-- Header ---------------->

<!-- Nav Bar ---------------->
<div class="container navigation">

     <div class="col-sm-12 col-md-12 col-lg-12">
       <div class="nav_container container">
          <nav class="nav">
            <ul>
              <li class="active nav-section"><a href="#Home">Home</a></li>
              <li class="nav-section"><a href="#About">Over ons</a></li>
              <li class="logospace"></li>
              <li class="nav-section"><a href="#Media">Media</a></li>
              <li class="nav-section"><a href="/theroselles/administratie/">Admin</a></li>
              <img class="candy anchor_img" src="Images/Banner/candy.jpg"></img>
            </ul>
            <div class="logo"><a href="#Home"><img src="Images/Logo/logoRoselles.png" alt="Logo van de Roselles"></img></a></div>
          </nav>
          <div class="banner_right"></div>
          <div class="banner_left"></div>
        </div>

    <nav class="navbar navbar-inverse navbar-static-top burger" role="navigation">
			<div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <div class="logo"><a href="#Home"><img src="Images/Logo/logoRoselles.png" alt="Logo van de Roselles"></img></a></div>
      </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  				<ul class="nav navbar-nav">
            <li class="active nav-section"><a href="#Home">Home</a></li>
            <li class="nav-section"><a href="#About">Over ons</a></li>
            <li class="nav-section"><a href="#Media">Media</a></li>
            <li class="nav-section"><a href="#Contact">Contact</a></li>
  				</ul>
  		</div>
		</nav>
  </div>
    	</div>
</div>

<section id="Home">
<!-- slider ---------------->
    <!-- slider ---------------->
    <div class="container">
    <div class="slider">
    	<div class="row">
    		<div class="col sm-12 col-md-12">
    			<div id="myCarousel" class="carousel slide" data-ride="carousel">
      			<!-- Indicators -->
      			<ol class="carousel-indicators">
    				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        			<li data-target="#myCarousel" data-slide-to="1"></li>
        			<li data-target="#myCarousel" data-slide-to="2"></li>
      			</ol>

      <!-- Wrapper for slides -->
      <!-- De Carousel queried naar het database welke foto als eerste, tweede en derde slide aangegeven staat ---------------->
      <!-- Tegenwoordig zou ik het eerder andersom doen. Waarbij slide een, twee en drie door de admin verandert wordt ---------------->
      		<div class="carousel-inner">
        		<div class="item active">
          			<img src="<?php echo "uploads/" . fetchSlide('Slide 1', $connect) ?>">
        		</div>

        		<div class="item">
    				<img src="<?php echo "uploads/" . fetchSlide('Slide 2', $connect) ?>">
        		</div>

        		<div class="item">
    				<img src="<?php echo "uploads/" . fetchSlide('Slide 3', $connect) ?>">
        		</div>
      		</div>

      <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				  </a>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="col sm-12 col-md-12 bottombutton">
    <span class="glyphicon glyphicon-chevron-down bot"></span>
  </div>
  </div>
  </div>
</section>
<!-- About ---------------->
    <section id="About">
		<div class="BG">
        <div class="container">
            <div class="row page">
                <div class="col-md-7">
                	<img class="Kader" src="Images/Roselles/IMG_8.jpg">
                </div>
				<div class="col-md-5">
					<h2>The Roselles</h2>
					<p id="Text">
            <?php echo fetchPage('about', $connect) ?>
</p>
					<button id="Button" class="contact_button" type="button">Contact</button>
				</div>

			</div>
			</div>
        </div>
    </section>

<!-- Media ---------------->
	<section id="Media">
		<div class="BG">
      <div class="container">
        <h2 style="text-align: center;">Media</h2>
          <div class="gallery">
          <?php echo gallery($connect);?>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
              <symbol id="close" viewBox="0 0 18 18">
                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
            			S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
            			l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
            			c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
            			s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z"/>
              </symbol>
            </svg>
          </div>
          <div class="mediaNav">
            <ul>
              <li>1</li>
            </ul>
          </div>
      </div>
		</div>
	</section>

<!-- Contact ---------------->
<!-- Tegenwoordig ben ik ervan bewust dat een mailform als dit zeer gevaarlijk is, al probeerde ik destijds ---------------->
<!-- De tekst van invulvelden serverside wel te controleren met een regex.  ---------------->
<!-- En ik hoopte bots tegen te gaan met recaptcha. Ik dacht vroeger ook dat recaptcha onveilige code tegenhield  ---------------->
<?php

  if (isset($_POST['submit_contact']) ) {
    foreach ($_POST as $key => $value) {
      if ($value == NULL) {
        $value = " ";
        $_POST[$key] = $value;
      }
    }

    $name     = $_POST['name'];
    $mail     = $_POST['mail'];
    $phone    = $_POST['phone'];
    $ref      = $_POST['refference'];
    $subj     = $_POST['subject'] . " via TheRoselles.nl";
    $text     = $_POST['message'];
    $mailTo   = "Info  <demo@demo.nl>";
    $headers  = "From: " . $name . "<" . $mail . ">" . "\r\n" .
                "Reply-To: " . $mail. "\r\n" .
                "X-Mailer: PHP/" . phpversion() . "MIME-Version: 1.0\r\n" .
                "Content-Type: text/html; charset=iso-8859-1\n";
    $mailCheck = "/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/";
    $textCheck  = "/^[A-Za-z .'-]+$/";

    $pH = "Er is iets mis gegaan. Namelijk: <br></ br>";
    $resultMsg = $pH;

    if (!preg_match($textCheck, $name)) {
      $resultMsg .= "Er staan ongeldige tekens in je naam. <br>";
    }

    if (!preg_match($mailCheck, $mail)) {
      $resultMsg .= "Je e-mailadres is niet juist opgesteld. <br>";
    }

    if ($resultMsg == $pH) {
      if ($resp != null && $resp->success) {
        $resultMsg = "Het versturen van je e-mail is gelukt! Wij sturen je zo spoedig mogelijk een reactie. ";
        @mail($mailTo, $subj, $text, $headers);
      } else {
        $resultMsg = "Je hoeft alleen nog de robot-check te doen.";
      }


    }
  }

?>
<section id="Contact">
  <div class="BG">
  <div class="container">
    <div class="row page">
			<div class="col-md-6 col-s-">
        <h2>Contact</h2>
        <div class="form-result">
        <?php echo $resultMsg; ?>
        </div>
          <form class="contactForm "action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" placeholder="Uw naam" name="name" required><br>
            <input type="text" placeholder="Uw e-mailadres" name="mail" required><br>
            <input type="text" placeholder="Uw telefoonnummer" name="phone"><br>
            <input type="text" placeholder="Hoe heeft u ons gevonden?" name="refference"><br>
            <br></br >
            <input type="text" placeholder="Onderwerp" name="subject" required><br>
            <script src='https://www.google.com/recaptcha/api.js'></script>
            <button type="submit" name="submit_contact">Verstuur</button>
          </form>
			</div>

			<div class="col-md-6">
        <style>
  my-email::after {
    content: attr(data-domain);
  }
  my-email::before {
    content: attr(data-user) "\0040";
  }
</style>

<!-- Set data-user and data-domain as your
       email username and domain respectively -->


        <p><h4>Contactgegevens:</h4>
          Voor meer informatie neem contact op met Marcelle en Ronald via:<br></br>
        <b> Tel: 0618769892 </b><br>
          <b>E-mail: <a href = "mailto: infoATtherosellesDOTcom" onclick = "this.href=this.href
              .replace(/AT/,'&#64;')
              .replace(/DOT/,'&#46;')"
><my-email data-user="info" data-domain="theroselles.nl"></my-email></a></b><br>
        </p>
        <img class="Kader" src="Images/Roselles/IMG_5.jpg">
			</div>
	   </div>
  </div>
  </div>
</section>
</body>
<footer>

<!-- Footer ---------------->
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/custom_js.js"></script>

</footer>

</html>
