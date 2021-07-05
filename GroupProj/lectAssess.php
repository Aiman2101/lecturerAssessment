<?php
session_start();
if(!isset($_SESSION['assess'])){
  die("Name parameter missing");
}
require_once "Config.php";

/*
if(isset($_POST['sec']) && isset ($_POST['sec2']) && isset($_POST['sec3'])){

  if($_POST['sec']){
    $total = array_sum($_POST['sec']);
    $_SESSION['section1'] = $total;
  }

  if($_POST['sec2']){
    $total1 = array_sum($_POST['sec2']);
    $_SESSION['section2'] = $total1;
  }

  if($_POST['sec3']){
    $total2 = array_sum($_POST['sec3']);
    $_SESSION['section3'] = $total2;
  }
else {
  $_SESSION['error'] = "Please fill up the choice!";
  header("Location: lectAssess.php");
}

}
*/

//}



 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8">
  <meta name = "viewport" contents = "width=device-width,, initial-scale=1.0">
  <title> Lecturer Assessment </title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>

body{
  background-image: url('https://erasmus-encgj.com/wp-content/uploads/2014/07/university-background-04.jpg');
  height: 100%;
  -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}
.container {
  align: center;
    position: absolute;
    height: 1640px;
    align: center;
    margin: 20px;
    max-width: 800px;
    padding: 13px;
    background-color: white;
    margin-left: 20%;



}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color: #04AA6D;
  color: white;
}

.round {
  border-radius: 50%;
}
</style>

</head>
<body>
  <div class="w3-bar w3-amber w3-border-bottom w3-xlarge">
  <a href="#" class="w3-bar-item w3-button w3-text-blue-grey w3-hover-blue-grey"><b><i class="fa fa-map-marker w3-margin-right"></i>Welcome!</b></a>
  <a href="mainpage.php" class="w3-bar-item w3-button w3-right w3-hover-blue-grey w3-text-grey"><i class="fa fa-search"></i>Home </a>
</div>

  <div class="w3-bar w3-black">
    <button  class="w3-bar-item w3-button tablink w3-amber" onclick="openCity(event,'teaching')" id="defaultOpen" > Teaching Method, Strategies and Practices </button>
    <button   class="w3-bar-item w3-button tablink w3-amber" onclick="openCity(event,'course')"> Course Material and Structure </button>
    <button  class="w3-bar-item w3-button tablink" onclick="openCity(event,'personal')"> Personal/Connection - Clarity and Encouragement </button>
  </div>


  <form method = post action = "summary.php">
    <div id="teaching" class="w3-container city" style="display:none">

<?php
if(isset($_SESSION['error'])){
echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
unset($_SESSION['error']);
}

?>

  <div class = "container">
      <h1> Teaching Method, Strategies and Practices </h1>

      <?php
      $counting = 1;
      $stment = $pdo -> query("SELECT questions from question where section_id = 1");
      $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);

      $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting");
      $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

      $question_id = (isset($rows['question_id']));
      if(sizeof($rows)>0){
          foreach ($rows as $row){
        echo ($row['questions']);
        echo "<br><br>";

        foreach ($rates as $rate){

           echo '<input type = "radio" name = "sec['.$counting.']" value= '.$rate['rating'].'/>';

            echo ($rate ['answer']);
          echo "<br>";

      }
      echo "<br><br>";
      $counting++;
      $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting");
      $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

    }
  }
  ?>
<input type = "hidden" name = "section1" value = "1">

  </div>
</div>



    <div id="course" class="w3-container city" style = "display:none">
  <div class = "container">
      <h1> Course Material and Structure </h1>

      <?php
      $counting1 = 8;
      $stment = $pdo -> query("SELECT questions from question where section_id = 2");
      $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);

      $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting1");
      $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

      $question_id = (isset($rows['question_id']));
      if(sizeof($rows)>0){
          foreach ($rows as $row){
        echo ($row['questions']);
        echo "<br><br>";

        foreach ($rates as $rate){

        echo '<input type = "radio" name = "sec2['.$counting1.']" value= '.$rate['rating'].'/>';


            echo ($rate ['answer']);
          echo "<br>";
      }
      echo "<br><br>";
      $counting1++;
      $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting1");
      $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

    }
  }

      ?>
      <input type = "hidden" name = "section2" value = "2">
</div>
</div>

  <div id="personal" class="w3-container city" style="display:none">
      <div class = "container">
    <h1> Personal/Connection - Clarity and Encouragement </h1>

    <?php
    $counting2 = 15;

    $stment = $pdo -> query("SELECT questions from question where section_id = 3");
    $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);
    $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting2");
    $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

  $question_id = (isset($rows['question_id']));
    if(sizeof($rows)>0){
        foreach ($rows as $row){
      echo ($row['questions']);
      echo "<br><br>";

      foreach ($rates as $rate){

          echo '<input type = "radio" name = "sec3['.$counting2.']" value= '.$rate['rating'].'/>';


          echo ($rate ['answer']);
        echo "<br>";
    }
    echo "<br><br>";
    $counting2++;
    $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting2");
    $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

  }
}

    ?>
    <input type = "hidden" name = "section3" value = "3">
    <input type = "submit" name = "submit" value = "Assess your lect"/>
</div>
</div>

</form>



<script>
var currentTab = 0;
function openCity(evt, cityName) {
var i, x, tablinks;
x = document.getElementsByClassName("city");
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";
}
tablinks = document.getElementsByClassName("tablink");
for (i = 0; i < x.length; i++) {
tablinks[i].className = tablinks[i].className.replace(" w3-amber", "");
}
document.getElementById(cityName).style.display = "block";
evt.currentTarget.className += " w3-amber";
}


document.getElementById("defaultOpen").click();
</script>
       </body>
       </html>
