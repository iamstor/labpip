<!DOCTYPE html
       >
<?php
    session_start();
    //global vars
    $_SESSION['arr'] = array();
?>

<html>

<head>
    <meta charset="utf-8">
    <title>PIP_Lab_1</title>
    <link rel="stylesheet" type="text/css" href="css/answer.css">
    <link rel="stylesheet" type="text/css" href="css/container.css">
    <link rel="stylesheet" type="text/css" href="css/input.css">
    <link rel="stylesheet" type="text/css" href="css/left.css">
    <link rel="stylesheet" type="text/css" href="css/body.css">
    <link rel="stylesheet" type="text/css" href="css/right.css">
    <link rel="stylesheet" type="text/css" href="css/submit.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/task.css">


    <script type="text/javascript">

    var timeout;


    function validate(_form){

        var fail = false;
        var X = _form.X.value;
        var Y = _form.Y.value;
        var R = _form.R.value;


        function isNumber(n) {
            return /^-?[\d.]$/.test(n);
        }


        if (!isNumber(X)){
            fail="Некорректно задано значение X (не является целым) \n"
        }

        if (Y <= -3 || Y >= 3 || isNaN(Y) || Y == "" || Y.length > 10){
          fail = "Некорректно задано значение Y\n";
        }
        if (R <1 || R >4 || isNaN(R) || R == "" || R.length > 10){
          if (!fail) fail = "";
          fail += "Некорректно задано значение R \n";
        }


        if (fail){
         // alert(fail);
         document.getElementById("q").innerHTML=fail;
          return false;
        }
        else{
          makeFrame('result_frame');
          createCanvas('canvas',X, Y, R);
          return true;
        }

    }

    function makeFrame(id){
        var iframe = document.getElementById(id);
        iframe.style.display="block";
        frameFitting(id);
        for (var i=0; i<iframe.length; i++) {
            iframe[i].onclick = function() {
              clearInterval(timeout);
              timeout = setInterval("frameFitting(id)",100);
            }
        }
    }

    function frameFitting(id) {
        document.getElementById(id).width = '100%';
        document.getElementById(id).height = document.getElementById(id).contentWindow.
                                  document.body.scrollHeight+35+'px';
    }

    </script>

</head>

<body >
  <center>

      <div class="container header">
          <span class="left">Гр. P3202</span>
          <span class="center">Сторожева Дарья</span>
          <span class="right">Вариант 202019</span>
      </div>

      <div class="container task">
        <a rel="nofollow" target="_blank" href="img/task_text.png">
          <img class="task_text" src="img/task_text.png" alt="task_text">
        </a>
        <img class="task_image" src="img/task.png" alt="task_picture">
      </div>

      <div class="container form">
          <form class="form" action="checkPoints.php" method="get"
            onsubmit="return validate(this);">

              <table class="radio_btn">
                  <tr>
                      <td></td>
                      <td><input type="radio" id="-4" name="X" value="-4">-4</td>
                      <td><input type="radio" id="-3" name="X" value="-3">-3</td>
                      <td><input type="radio" id="-2" name="X" value="-2">-2</td>
                  </tr>
                  <tr>
                      <td> X = </td>
                      <td><input type="radio" id="-1" name="X" value="-1">-1</td>
                      <td><input type="radio" id="0" name="X" value="0" checked>0</td>
                      <td><input type="radio" id="1" name="X" value="1">1</td>
                  </tr>
                  <tr>
                      <td></td>
                      <td><input type="radio" id="2" name="X" value="2">2</td>
                      <td><input type="radio" id="3" name="X" value="3">3</td>
                      <td><input type="radio" id="4" name="X" value="4">4</td>
                  </tr>
              </table>

        <label for="Y"> Y = </label>
        <input class="input_Y" id="Y" type="text" name="Y" placeholder="(-3 .. 3)"><br>

        <label for="R"> R = </label>
        <input class="input_R" id="R" type="text" name="R" placeholder="[1 .. 4]"><br>

        <input class="submit" type="submit" name="submit" value=" ПРОВЕРИТЬ ">
      </form>
          <div id="q"> </div>


          <canvas id="canvas" style="background-color:#ffffff; border-radius: 20px;"
        width="300" height="300"></canvas>
      <script type="text/javascript">
          function createCanvas(id, x, y, r){
                  var canvas = document.getElementById(id),
                      context = canvas.getContext("2d");
                  //очистка
                  context.clearRect(0, 0, canvas.width, canvas.height);

                  //прямоугольник
                  context.beginPath();
                  context.rect(150,150, 130, 130);
                  context.closePath();
                  context.strokeStyle = "CornflowerBlue";
                  context.fillStyle = "CornflowerBlue";
                  context.fill();
                  context.stroke();

                  // сектор
                  context.beginPath();
                  context.moveTo(150, 150);
                  context.arc(150, 150, 130, Math.PI, 3*Math.PI/2, false);
                  context.closePath();
                  context.strokeStyle = "CornflowerBlue";
                  context.fillStyle = "CornflowerBlue";
                  context.fill();
                  context.stroke();

                  //треугольник
                  context.beginPath();
                  context.moveTo(150, 150);
                  context.lineTo(150, 280);
                  context.lineTo(20, 150);
                  context.lineTo(150, 150);
                  context.closePath();
                  context.strokeStyle = "CornflowerBlue";
                  context.fillStyle = "CornflowerBlue";
                  context.fill();
                  context.stroke();

                  //отрисовка осей
                  context.beginPath();
                  context.font = "10px Verdana";
                  context.moveTo(150, 0); context.lineTo(150, 300);
                  context.moveTo(150, 0); context.lineTo(145, 15);
                  context.moveTo(150, 0); context.lineTo(155, 15);
                  context.fillText("Y", 160, 10);
                  context.moveTo(0, 150); context.lineTo(300, 150);
                  context.moveTo(300, 150); context.lineTo(285, 145);
                  context.moveTo(300, 150); context.lineTo(285, 155);
                  context.fillText("X", 290, 135);

                  // деления X
                  context.moveTo(145, 20); context.lineTo(155, 20); context.fillText(r, 160, 20);
                  context.moveTo(145, 85); context.lineTo(155, 85); context.fillText((r / 2), 160, 78);
                  context.moveTo(145, 215); context.lineTo(155, 215); context.fillText(-(r / 2), 160, 215);
                  context.moveTo(145, 280); context.lineTo(155, 280); context.fillText(-r, 160, 280);
                  // деления Y
                  context.moveTo(20, 145); context.lineTo(20, 155); context.fillText(-r, 20, 170);
                  context.moveTo(85, 145); context.lineTo(85, 155); context.fillText(-(r / 2), 70, 170);
                  context.moveTo(215, 145); context.lineTo(215, 155); context.fillText((r / 2), 215, 170);
                  context.moveTo(280, 145); context.lineTo(280, 155); context.fillText(r, 280, 170);

                  context.closePath();
                  context.strokeStyle = "black";
                  context.fillStyle = "black";
                  context.stroke();


                  //отмечаем точку
                  context.beginPath();
                  context.rect(Math.round(150 + ((x / r) * 130))-2, Math.round(150 - ((y / r) * 130))-2, 4, 4);
                  context.closePath();
                  context.strokeStyle = "HotPink";
                  context.fillStyle = "HotPink";
                  context.fill();
                  context.stroke();

          }
      </script>

    </div>



    <div >
        <iframe name="result_frame" height="120" width="700" id="result_frame"
          allowtransparenc frameborder="no" scrolling="no" seamless style="display:none"></iframe>
    </div>

    <div class="container footer">
        <span class="center">2019 г.</span>

    </div>
</html>
