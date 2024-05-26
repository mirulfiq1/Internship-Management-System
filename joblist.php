<!DOCTYPE html>
<html lang="en">
<head>
  <title>Internship Job List</title>
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
            <h2>List of Internship Job</h2>

    <?php
    session_start();

    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role'])) {
        header("Location: login.php");
        exit();
    }

    {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $dbc = new mysqli($servername, $username, $password, $dbname);
    // Check connection

    $query = "SELECT jobID, companyID, jobtitle, description, requirements, location, duration  FROM internship_jobs"; $response = @mysqli_query($dbc, $query);

    if ($response) { 
    while($row = mysqli_fetch_array($response)){?>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th class="text-center">Job ID</th>
            <th class="text-center">Company ID</th>
            <th class="text-center">Job Title</th>
            <th class="text-center">Description</th>
            <th class="text-center">Requirement</th>
            <th class="text-center">Location</th>
            <th class="text-center">Duration</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($response as $row) { ?>
            <tr>
                <td class="text-center"><?php echo ($row["jobID"]); ?></td>
                <td class="text-center"><?php echo ($row["companyID"]); ?></td>
                <td class="text-center"><?php echo ($row["jobtitle"]); ?></td>
                <td class="text-center"><?php echo ($row["description"]); ?></td>
                <td class="text-center"><?php echo ($row["requirements"]); ?></td>
                <td class="text-center"><?php echo ($row["location"]); ?></td>
                <td class="text-center"><?php echo ($row["duration"]); ?></td>
                <td class="text-center">
                    <form action="applyinternship.php" method="post">
                        <input type="hidden" name="job_id" value="<?php echo $row["jobID"]; ?>">
                        <button type="submit" class="btn btn-primary">Apply Job</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table><?php } }

        $dbc->close(); }
        ?>

    <a href="studentdashboard.php" class="btn btn-primary">Back to Dashboard</a>

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