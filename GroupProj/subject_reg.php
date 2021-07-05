<?php
session_start();
require_once "Config.php";
/*if(!isset($_SESSION['name'])){
  die("Name parameter missing");
}*/
if(isset($_POST['cancel'])){
  header('Location: mainpage.php');
  return;
}



if(isset($_POST['subName']) && isset($_POST['subCode']) && isset($_POST['dateNow']) && isset($_POST['lectName'])){
  if (strlen($_POST['subName']) < 1 || strlen($_POST['subCode']) < 1 || strlen($_POST['dateNow']) < 1 || strlen($_POST['lectName']) < 1){
    $_SESSION['error'] = 'Please fill in all values';
    header ("Location: projectReg.php");
    return;
  }

  $date_input = date('Y-m-d', strtotime($_POST['dateNow']));

  $_SESSION['assess'] = rand(1,100);
  $temp = $_SESSION['assess'];
  {
    $stment = $pdo -> prepare('INSERT INTO subject (subject_ID, subjectName, subjectCode, lectName, dateAssess) VALUES (:subject_ID,:subName, :subCode, :lectName, :dateNow)');
    $stment-> execute(array(
      ':subject_ID' => $temp,
      ':subName' => $_POST['subName'],
      ':subCode'=> $_POST['subCode'],
      ':lectName'=> $_POST['lectName'],
      ':dateNow' => $date_input
    ));
    //$_SESSION['assess'] = $_POST['subName'];
    header ("Location: lectAssess.php");
    return;

  }
}
?>


<!DOCTYPE html>
  <html>
  <head>
    <meta charset = "UTF-8">
    <meta name = "viewport" contents = "width=device-width,, initial-scale=1.0">
    <title> Project Registration </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<style>
body, html {
  height: 100%;
  margin:0;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("https://erasmus-encgj.com/wp-content/uploads/2014/07/university-background-04.jpg");

  /* Control the height of the image */
height: 100%;
-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

  /* Center and scale the image nicely */
  /*background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;*/
}

h3 {
   font-family: cursive;
}


/* Add styles to the form container */
.container {
  position: absolute;
  height: 600px;
  text-align: center;
  margin: 20px;
  max-width: 450px;
  padding: 13px;
  background-color: white;
  margin-left: 30%;
}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 2px 0 15px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #FFBF00;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn1 {
  background-color: #f7663e;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn, .bt1:hover {
  opacity: 1;
}
</style>


  </head>
  <body>

<div class = "bg-img">

<form method = post class = "container">
  <h3> Subject Assessment Register </h3>
  <span style="font-family: cursive">  Subject Name: </span> <input type="text" size ="10" name = "subName" placeholder ="Subject Name"/><br><br>
  <span style="font-family: cursive">  Subject Code: </span><input type = "text" size = "10" name = "subCode" placeholder = "Subject Code"/><br><br>
    <span style="font-family: cursive">  Lecturer Name: </span><input type = "text" size = "10" name = "lectName" placeholder = "Lecturer Name"/><br><br>
    <span style="font-family: cursive">  Date: </span><input type = "date" name = "dateNow" value = "DD/MM/YYYY"/>
<br><br>
        <button class = "btn1" type = "submit" name = "cancel" value = "cancel"> &#171; Cancel </button><br>
        <button class = "btn" type = "submit" name = "submit" value = "submit"> Submit &#10003; </button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js%22%3E"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js%22%3E"></script>

</body>
  </html>
