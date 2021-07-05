<?php
session_start();
require_once "Config.php";


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8">
  <meta name = "viewport" contents = "width=device-width,, initial-scale=1.0">
  <title> Information Page </title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    height: 2000px;
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

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  table-layout: auto;
}

th, td {
  padding: 5px;
  text-align: left;
}

</style>

</head>
<body>
  <div class="w3-bar w3-amber w3-border-bottom w3-xlarge">
  <a href="#" class="w3-bar-item w3-button w3-text-blue-grey w3-hover-blue-grey"><b><i class="fa fa-map-marker w3-margin-right"></i>Welcome!</b></a>
  <a href="mainpage.php" class="w3-bar-item w3-button w3-right w3-hover-blue-grey w3-text-grey"><i class="fa fa-search"></i>Home </a>
</div>


  <div class = "container">
      <h1> Information Page </h1>
      <h3>This page shows all the questions from all sections and description for each section.</h3>

      <table class="table-primary">
        <tr class="table-warning">
          <th>Section No</th>
          <th>Section Name</th>
          <th>Questions</th>
          <th>Description</th>
        </tr>

        <?php

        $stment = $pdo -> query("SELECT questions from question where section_id = 1");
        $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);


        echo "<tr>";
          echo ('<td');
          echo ('">1</td>');
          echo ('<td rowspan = "');
          echo ('">Teaching Method, Strategies and Practices</td>');




          if(sizeof($rows)>0){

            echo "<td>";

              foreach ($rows as $row){

            echo ($row['questions']);
            echo "<br><br>";


          }

          echo "</td>";
          echo "<td>This section is assess on how well the lecturer execute their teaching method during the class.</td>";
          echo "</tr>";

        }



          $stment = $pdo -> query("SELECT questions from question where section_id = 2");
          $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);

          echo "<tr>";
            echo ('<td');
            echo ('">2</td>');
            echo ('<td');
            echo ('">Course Material and Structure</td>');

            if(sizeof($rows)>0){

              echo "<td>";

                foreach ($rows as $row){

              echo ($row['questions']);
              echo "<br><br>";


            }

            echo "</td>";
            echo "<td>This section assess on how well the lecturer convey the course material to the student.</td>";
            echo "</tr>";

          }

            $stment = $pdo -> query("SELECT questions from question where section_id = 3");
            $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);


            echo "<tr>";
              echo ('<td');
              echo ('">3</td>');
              echo ('<td');
              echo ('">Personal/Connection - Clarity and Encouragement/</td>');


              if(sizeof($rows)>0){

                echo "<td>";

                  foreach ($rows as $row){

                echo ($row['questions']);
                echo "<br><br>";

              }

              echo "</td>";
              echo "<td>This section assess how well the lecturer handle and clarify any unclear information during and outside the class time.</td>";
              echo "</tr>";

            }

          ?>

        </table>
    </body>
    </html>
