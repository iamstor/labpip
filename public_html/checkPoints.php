<?php
    @session_start();
    $start = microtime(true);
    $x = $_GET["X"];
    $y = $_GET["Y"];
    $r = $_GET["R"];
    $currentTime = date("H:i:s",strtotime('+3 hour'));


    echo "<!DOCTYPE HTML> <html> <head> <meta charset='UTF-8'> <title>Points</title>
           <link rel='stylesheet' type='text/css' href='css/main.css'>
          </head> <body style='background-image: none'> <center>";
    echo "<div class='container' style='padding:20px 0px;'> <br> <table class='points'>
            <tr>  <td>X</td> <td>Y</td> <td>R</td> <td>Проверка</td> <td>Время</td> <td>Время работы</td>  </tr> ";


    if (!(is_numeric($x) && is_numeric($y) && is_numeric($r)&&$x>=-4 && $x<=4 && $y>-3 && $y<3 && $r>=1 && $r<=4)) {
        array_push ($_SESSION['arr'],"<tr> <td colspan='6'><b>Аргументы некоректны!</b></td> </tr>");
    } else
    { if (
          ($x >= 0 && $y <= 0 && $y <= $r && $x <= $r) ||
          ($x <= 0 && $y >= 0 && ($x * $x + $y * $y) <= ($r ) * ($r)) ||
          ($x <= 0 && $y <= 0 && $y >= - $x - $r)
    )
          $check = "попадение";
      else
          $check = "промах";

      $time = microtime(true) - $start;
      array_push ($_SESSION['arr'],"<tr> <td>$x</td> <td>$y</td> <td>$r</td>
                    <td><b>$check</b></td> <td>$currentTime</td> <td>$time</td> </tr>");
    }

        foreach ($_SESSION['arr'] as $item) {
          	echo $item;
        }
      echo "</table> <br> </center> </body> </html>";
echo "<form action=\"./index.html\">
  <input type=\"submit\" value=\"BACK\">
  </form>"

?>
