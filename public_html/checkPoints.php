<?php
    @session_start();
    $start = microtime(true);
    $x = $_GET["X"];
    $y = $_GET["Y"];
    $r = $_GET["R"];
    $currentTime = date("H:i:s", strtotime('-1 hour'));


    echo "<!DOCTYPE HTML> <html> <head> <meta charset='UTF-8'> <title>Points</title>
            <link rel='shortcut icon' href='img/favicon.ico'>
            <link rel='stylesheet' type='text/css' href='css/main.css'>
          </head> <body style='background-image: none'> <center>";
    echo "<div class='container' style='padding:20px 0px;'> <br> <table class='points'>
            <tr>  <td>X</td> <td>Y</td> <td>R</td> <td>CHECK</td> <td>TIME</td> <td>SCRIPT TIME</td>  </tr> ";


    if (!(is_numeric($x) && is_numeric($y) && is_numeric($r))) {
        array_push ($_SESSION['arr'],"<tr> <td colspan='6'><b>ARGUMENTS ARE INCORRECT!</b></td> </tr>");
    } else
    { if (
          ($x >= 0 && $y <= 0 && $y <= $r && $x <= $r) ||
          ($x <= 0 && $y >= 0 && ($x * $x + $y * $y) <= ($r ) * ($r)) ||
          ($x <= 0 && $y <= 0 && $y >= (-$r ) * $x - $r)
         )
          $check = "TRUE!";
      else
          $check = "FALSE!";

      $time = microtime(true) - $start;
      array_push ($_SESSION['arr'],"<tr> <td>$x</td> <td>$y</td> <td>$r</td>
                    <td><b>$check</b></td> <td>$currentTime</td> <td>$time</td> </tr>");
    }

        foreach ($_SESSION['arr'] as $item) {
          	echo $item;
        }
      echo "</table> <br> </center> </body> </html>";

?>
