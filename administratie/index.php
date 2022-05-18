<?php
session_start();
ob_start();
require("connection.php");
include("functions.php");
?>
<!-- PHP sluiting -->
<!doctype html>
<html>

  <head>
    <title>Administratiepaneel van The Roselles</title>
    <link rel="stylesheet" type="text/css" href="backstyle.css">
  </head>

  <body>

<?php if (isset($_SESSION["user"]) ) { ?>

<!-- Als de gebruiker ingelogd is -->
    <h2>Het administratiepaneel.</h2>

    <!-- Uploadsysteem -->

    <form class="form-style-5"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      <h3>Gallerij uploader</h3>

      <p>Selecteer een afbeelding om te uploaden naar je gallerij:</p>
      <br></br>
      <p><?php if (isset ($_POST["img_submit"])) { echo fileUpload($connect); } ?></p>
      <input type="file" name="imageFile" id="imageFile"><br>
      <input type="text" name="imgName" placeholder="Afbeeldingstitel" required>
      <input type="text" name="imgText" placeholder="Afbeeldingsbeschrijving" required>
      <input class="file" type="submit" value="Uploaden" name="img_submit">
    </form>

    <div class="gallery form-style-5">
        <h3>Alle huidige foto's</h3>
        <br></br>
        <p>
      <?php echo gallery2($connect);?>
      </p>
    </div>
      <div class="delete">


        <form class="form-style-5"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <h3>Deleter</h3>
          <p>Selecteer een afbeelding om te verwijderen.</p>
          <br></br>
          <p><?php if (isset ($_POST["delete"]) ) { echo deleteImg($_POST['delete_value'], $connect); } ?></p>

          <select name="delete_value">
          <option value="" disabled selected hidden required>Selecteer een afbeelding</option>
<?php
$sql = "SELECT * FROM fotogallerij";
$rows = $connect->query($sql)->num_rows;
$c = 0;

if ($rows != 0 ) {
  while ($c < $rows) {
    $sql = "SELECT * FROM fotogallerij LIMIT " . $c . ", 1 ";
    $r = $connect->query($sql)->fetch_array(MYSQLI_NUM);
    echo "<option value=\"" . $r[1] . "\">" . $r[1] ."</option>";
    $c++;
  }
} else {
  echo "<option value=\"geen_afbeeldingen\">Geen afbeeldingen</option>";
}

?>
          </select>
          <button type="submit" name="delete">Delete</button>
        </form>

        <form class="form-style-5"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <h3>Slides updater</h3>
          <p>Selecteer een afbeelding om als sliderafbeelding in te stellen. Selecteer vervolgens de slide om ermee te vervangen.</p>
<br></br>
<p><?php if (isset ($_POST["slider_update"]) ) { echo updateSlider($_POST['slider_value'], $_POST['slides'], $connect); } ?></p>
          <select name="slider_value">
          <option value="" disabled selected hidden required>Selecteer een afbeelding</option>
<?php
$sql = "SELECT * FROM fotogallerij";
$rows = $connect->query($sql)->num_rows;
$c = 0;

if ($rows != 0 ) {
  while ($c < $rows) {
    $sql = "SELECT * FROM fotogallerij LIMIT " . $c . ", 1 ";
    $r = $connect->query($sql)->fetch_array(MYSQLI_NUM);
    echo "<option value=\"" . $r[1] . "\">" . $r[1] ."</option>";
    $c++;
  }
} else {
  echo "<option value=\"geen_afbeeldingen\">Geen afbeeldingen</option>";
}

?>
          </select>

          <select name="slides">
            <option value="" disabled selected hidden required>Selecteer slide</option>
            <option value="Slide 1">Slide 1</option>
            <option value="Slide 2">Slide 2</option>
            <option value="Slide 3">Slide 3</option>
          </select>
          <button type="submit" name="slider_update" value="Update">Update</button>
        </form>

    </div>

    </div>
    <!-- Paginabewerker -->
    <form class="form-style-5"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h3>Paginabewerker</h3>
      <p>Pas hier aan hoe je het  op de website wil hebben. Onderin zie je een voorstelling van wat er momenteel op de website staat. </p>
<br></br><p>
<?php

if ( isset($_POST['page_name']) && isset($_POST['page_content']) ) {
     $page=$_POST['page_name'];
     echo updatePage($page, $_POST['page_content'], $connect);
}

?></p>
      <textarea type="text" name="page_content"><?php echo fetchPage('about', $connect); ?></textarea>
      <input type="hidden" name="page_name" value="about" />
      <input type="submit" name="about_submit" value="Bewerk"/>
    </form>



<!-- Inhoudlijst -->
<div class="form-style-5">
    <b>Huidige paginainhoud</b><br>
    <p>
    <?php
      echo 'Pagina Home: '.fetchPage('about', $connect)."<br>";
    ?>
  </p>
</div>
<!-- Als de gebruiker 'niet' ingelogd is -->
<?php
} else {
?>



    <form class="form-style-5"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="logform">
      <h2>Loginpagina</h2>
      <p>Welkom, gebruikersnaam is: demo wachtwoord: demo123</p>
      <p>
        <?php if (isset ($_POST["loginSubmit"])) { echo login($connect); } ?>
      </p>
    <input type="text" name="username" placeholder="Loginnaam" required><br>
    <input type="password" name="password" placeholder="Wachtwoord" required><br>
    <input type="submit" name="loginSubmit" value="Login">
    </form>

<!-- PHP sluiting -->
<?php
}
$connect->close();
?>

</body>
</html>
