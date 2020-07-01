<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPLE. CHOOSE A RANDOM NUMBER</title>

    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="head">
        <h1>SIMPLE. <span>choose a random number</span></h1>
        <p>Fill in the values ​​between which you want to extract a number (random).</p>
      </div>
      <?php
        $min_default_value = 0; // min value for html input atr.
        $max_default_value = 100; // max value for html input atr.
        $number_result = "&infin;"; // default value for number_result before submit.
        $error = "";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
          $number_is_ok = 1;
          $number_min = $min_default_value = $_POST["min"];
          $number_max = $max_default_value = $_POST["max"];

          if($number_min === $number_max) {
            $error = "The numbers entered are equal..";
            $number_is_ok = 0;
          }

          if($number_min > $number_max) {
            $error = "'MAX' must be greater than 'MIN'.";
            $number_is_ok = 0;
          }

          if($number_min == "" || $number_max == "") {
            $error = "You forgot to something!";
            $number_is_ok = 0;
          }

          if($number_is_ok == 1) {
            $number_result = rand($number_min, $number_max);
          }
        }
      ?>
      <div class="body">
        <?php if(!$error == "") { echo "<div class='error'><span>$error</span></div>"; } ?>
        <div class="number">
          <div class="content">
            <h2>Number is</h2>
            <h1><?php sleep(1); /* wait 1s after */ echo $number_result; ?></h1>
          </div>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="numbers">
            <div class="number-min">
              <div class="content">
                <h1>Min</h1>
                <input type="number" name="min" value="<?php echo $min_default_value; ?>" min="0" max="10000">
              </div>
            </div>
            <div class="number-max">
              <div class="content">
                <h1>Max</h1>
                <input type="number" name="max" value="<?php echo $max_default_value; ?>" min="2" max="10000">
              </div>
            </div>
          </div>
          <input type="submit" value="Choose number">
        </form>
      </div>
      <div class="footer">
        <p>See the project on</p>
        <a href="https://github.com/andrei-bancos/Simple-Choose-A-Random-Number" target="_blank" title="Go this project!"><img src="img/github.png" alt=""></a>
        <p>andrei-bancos</p>
      </div>
    </div>
  </body>
</html>
