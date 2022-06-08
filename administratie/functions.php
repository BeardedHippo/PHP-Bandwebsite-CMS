// Dit bestand bevat alle functionaliteiten dat de website gebruikte. Na al deze jaren ben ik blij dat ik tegenwoordig
// goed uitgeschreven namen gebruik voor variabelen en functies.

<?php
  //Login
  function login($connect) {

    $gebruiker = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM gebruiker WHERE user='" . $gebruiker . "'";

    if ( $connect->query($sql)->num_rows == TRUE) {
      $dataPWD = $connect->query($sql)->fetch_array(MYSQLI_ASSOC)["password"];
      if ( password_verify($password, $dataPWD) ) {
        $_SESSION["user"] = $gebruiker;
        $homeMsg = "Het inloggen was een succes! Een moment geduld... <br>";
        header("Refresh:1");
      } else {
        $homeMsg = "Je gebruikersnaam of wachtwoord is incorrect. <br>";
      }

    } else {
      $homeMsg = "Je gebruikersnaam of wachtwoord is incorrect. <br>";
    }
    return $homeMsg;
  }

  //Contentbewerking
  function updatePage($p, $c, $s) {
      $c = $s->real_escape_string($c);
      $q = "UPDATE paginas SET content='" . $c . "' WHERE paginanaam='" . $p . "'";
      $s->query($q);
      $r = "Pagina is succesvol bijgewerkt!";
      return $r;
  }

  //Slider aanpassen
  function updateSlider($input, $slide, $connect) {
      $sql = "SELECT * FROM fotogallerij WHERE imgtitel='" . $input . "'";
      $r = $connect->query($sql)->fetch_array(MYSQLI_ASSOC)["imgurl"];
      $q = "UPDATE slider SET imgurl='" . $r . "' WHERE imgtitel='" . $slide . "'";
      $connect->query($q);
      $result = $slide . " is succesvol bijgewerkt!";
      return $result;
  }

  //Content ophalen
  function fetchPage($p, $s) {
    $q = "SELECT * FROM paginas WHERE paginanaam='" . $p .  "'";
    $r = $s->query($q)->fetch_array(MYSQLI_ASSOC)["content"];

    return $r;
  }

  function fetchSlide($slide, $connect) {
    $q = "SELECT * FROM slider WHERE imgtitel='" . $slide .  "'";
    $r = $connect->query($q)->fetch_array(MYSQLI_ASSOC)["imgurl"];
    return $r;
  }
    //Uploadsysteem
  function fileUpload($connect) {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename( $_FILES["imageFile"]["name"] );
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = exif_imagetype($_FILES["imageFile"]["tmp_name"]);
    $errorMsg = "<b>De volgende fout(en) zijn opgetreden:</b><br>";
    $succesMsg = "";

    if ( $check === FALSE ) {
      $errorMsg .= "Het bestand is geen afbeelding, controleer of het klopt.<br>";
      $uploadOk = 0;

    } else {
      $uploadOk = 1;
    }

    if (file_exists($target_file)) {
     $errorMsg .= "Sorry, deze foto bestaat al. <br>";
     $uploadOk = 0;
    }

    if ( $_FILES["imageFile"]["size"] > 2000000 ) {
       $errorMsg .= "De afbeelding is groter dan 5MB! Maak hem kleiner zodat hij sneller
       laadt. Een kleinere resolutie kan helpen. <br>";
       $uploadOk = 0;
    }

   if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif"  ) {
     $errorMsg .= "Alleen .JPG, .JPEG, .PNG of .GIF foto's is ondersteund. <br>";
     $uploadOk = 0;
   }

   if ( $uploadOk == 0 ) {
     $errorMsg .= "Sorry, de afbeelding is niet geüpload. <br>";
     return $errorMsg;

   } else {
     if ( move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file) ) {
       $imgName = $connect->real_escape_string($_POST['imgName']);
       $imgText = $connect->real_escape_string($_POST['imgText']);
       $imgURL = basename($_FILES["imageFile"]["name"]);

       $sql = "INSERT INTO fotogallerij (imgtitel, imgurl, imgtext) VALUES
       (" . "'" . $imgName . "'," . "'" . $imgURL . "'," . "'" . $imgText . "'" . ")";

       $connect->query($sql);
       $succesMsg = "Het uploaden van " . $imgURL . " is geslaagd!";

       return $succesMsg;
     }
   }
  }

  //Fotogallerij
  function gallery($connect) {
    $sql = "SELECT * FROM fotogallerij";
    $rows = $connect->query($sql)->num_rows;
    $c = 0;
    $classNum = 1;
      while ($c < $rows) {
        $sql = "SELECT * FROM fotogallerij LIMIT " . $c . ", 1 ";
        $r = $connect->query($sql)->fetch_array(MYSQLI_ASSOC);

        if ($c == 0) {
          $value = 1 / 9;
        } else {
          $value = $c /9;
        }

        if ( strpos( $value, "." ) !== false ) {
          echo "<figure class=\"" . $classNum . "\"> <div class=\"imgwrap\"> <img src=\"" . "./uploads/" . $r["imgurl"] . "\" alt=\"" . $r["imgtitel"] . "\"></div></figure>";
        } else {

          $classNum++;
          echo "<figure class=\"" . $classNum . "\"> <div class=\"imgwrap\"> <img src=\"" . "./uploads/" . $r["imgurl"] . "\" alt=\"" . $r["imgtitel"] . "\"></div></figure>";
        }
        $c++;
      }
    }

    function gallery2($connect) {
      $sql = "SELECT * FROM fotogallerij";
      $rows = $connect->query($sql)->num_rows;
      $c = 0;
      $classNum = 1;

        while ($c < $rows) {
          $sql = "SELECT * FROM fotogallerij LIMIT " . $c . ", 1 ";
          $r = $connect->query($sql)->fetch_array(MYSQLI_ASSOC);

          echo "<b>" . $r["imgtitel"] . "</b> - " . $r["imgtext"] . "<br></br>";
          $c++;
        }
      }

    function deleteImg($t, $connect) {
      $sql = "SELECT * FROM fotogallerij WHERE imgtitel='" . $t . "'";
      $c = $connect->query($sql)->fetch_array(MYSQLI_ASSOC);
      $url = "../uploads/" .$c["imgurl"];
      $id = $c["id"];

      if (unlink($url) == TRUE) {
        $sql = "DELETE FROM fotogallerij WHERE id='" . $id . "'";
        $connect->query($sql);
        $r = $t . " succesvol verwijderd, 2 seconden geduld.";
        header("Refresh:2");
      } else {
        $r = $t . " is niet verwijderd, controleer de spelling.";
        echo $url;
      }
      return $r;
    }
