<?php
session_start();

    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role'])) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Student Profile</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="uitm-logo.png">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="dashboardstyle.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: #64C5B1;">
    <button class="btn btn-link" id="menu-toggle"><i class="fa fa-chevron-down"></i></button>
    <a href="#" class="d-flex align-items-center text-decoration-none ">
        <a href="studentdashboard.php" style="width:100px;"><img class="logo" src="uitmlogo.png" alt="logo"></a>
      
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">    <ion-icon name="person-outline"></ion-icon>
          <span class="company_name mr-1 d-none d-lg-inline text-gray-600 big"> &nbsp;<span class="company_role mr-1 d-none d-lg-inline text-gray-600 small">Student</span>

          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="editprofilestudent.php">Profile</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
        <li class="nav-item">
        <button class="btn btn-link" id="logout-toggle">
            <a href="logout.php" style="text-decoration: none; color: #000; font-size: 16px;">Logout</a></button>
        </li>
      </ul>
    </div>
  </nav>
  <div class="d-flex" id="wrapper">
    <div class="border-right" id="sidebar-wrapper" style="background-color: transparent;">
      <div class="sidebar-heading">Student Dashboard</div>
      <div class="list-group list-group-flush">
        <a href="joblist.php" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt fa-fw mr-2"></i> List of Internship job </a>
        <a href="applyinternship.php" class="list-group-item list-group-item-action"><i class="fas fa-chart-bar fa-fw mr-2"></i> Apply Internship </a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-users fa-fw mr-2"></i> Application </a>
        <a href="editprofilestudent.php" class="list-group-item list-group-item-action"><i class="fas fa-cog fa-fw mr-2"></i> Profile </a>
      </div>
    </div>
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-lg-9">
            <!-- Main content goes here -->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $studentname = $_POST['studentname'];
    $email = $_POST ['email'];
    $studentphone = $_POST['studentphone'];
    $studentcourse = $_POST['studentcourse'];
    $studentcgpa = $_POST['studentcgpa'];

    $sql = "INSERT INTO students (studentname, email, studentphone, studentcourse, studentcgpa) 
    VALUES ('$studentname', '$email', '$studentphone', '$studentcourse', '$studentcgpa')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type= 'text/javascript'>alert('New record created
        successfully');</script>";
    } else {
        echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

    <form action="#" method="post">
        <h2>Edit Student Profile</h2>

        <label for="studentname">Student Name:</label>
        <input type="text" id="studentname" name="studentname" value="" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value=" " required>

        <label for="studentphone">Telephone Number:</label>
        <input type="tel" id="studentphone" name="studentphone" value="" required>

        <label for="studentcourse">Course:</label>
        <input type="text" id="studentcourse" name="studentcourse" value="" required>

        <label for="studentcgpa">CGPA:</label>
        <input type="decimal" id="studentcgpa" name="studentcgpa" value="" required>

        <button type="submit">Save Changes</button>
    </form>

            </div>
        </div>
      </div>
    </div>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="dashboardscript.js"></script>
  <footer>
    &copy; 2023 Internship Management System
</footer>
</body>
</html>