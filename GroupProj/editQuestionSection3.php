<?php
//index.php
session_start();
include "Config.php";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <title>Teaching Assessment Tool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <style>
  html,body {
      padding: 0;
      background-image: url('https://michiganvirtual.org/wp-content/uploads/2020/02/survey-and-feedback.jpg');
  }

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #EBBE16;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding-top: 10px;
  text-decoration: none;
}

li a:hover {
  background-color: #EBBE16;
  color: white;
}

table, td, th {
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
  margin:auto;
}

td {
  padding: 15px;
  background-color: white;
}

th {
  padding: 15px;
  background-color: #F97304;
  color: white;
}
</style>
 </head>
 <body>
   <ul>
  <li><a href="#home"><?php  echo "<p>&nbsp<i class='fas fa-user-circle' style='font-size:24px'></i> Welcome! Admin";
  echo "</p>\n";?></a></li>
  <li style="float:right"><a style="margin-right:20px;" href="logout.php">Log Out</a></li>
</ul>

         <h2 style="margin-bottom:20px;">&nbspQuestions for Personal/Connection - Clarity and Encouragement</h2>
         <a style="margin-right:20px; float:right;" href="mainpageAdmin.php">Back</a>
         <?php
         if(isset($_SESSION["error"])){
           echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
           unset($_SESSION["error"]);
         }
         if(isset($_SESSION["success"])){
           echo('<p style="color:green">'.$_SESSION["success"]."</p>\n");
           unset($_SESSION["success"]);
         }
         ?>
         <table>
         <?php
         echo "<table>
         <tr>
         <th>Questions</th>
         <th>Remarks</th>
         </tr>";
         $stmt = $pdo->query("SELECT question_id, questions FROM question WHERE section_id=3");
         while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
           echo "<tr>";
           echo "<td>" . $row['questions'] . "</td>";
           echo "<td>" . '<a href="edit.php?question_id='. $row['question_id'].'">Edit</a>' . "</td>";
           echo "</tr>";
         }
         ?>
         </table>
 </body>
</html>
