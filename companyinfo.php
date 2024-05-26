<!DOCTYPE html>
<html lang="en">
<head>
  <title>Company Information</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="uitm-logo.png">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="dashboardstyle.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

  <style>
    .company-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .company-table th, .company-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .company-table th {
        background-color: #f2f2f2;
    }

    .company-table tr:hover {
        background-color: #f5f5f5;
    }
    </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: #64C5B1;">
    <button class="btn btn-link" id="menu-toggle"><i class="fa fa-chevron-down"></i></button>
    <a href="#" class="d-flex align-items-center text-decoration-none ">
        <a href="supervisordashboard.php" style="width:100px;"><img class="logo" src="uitmlogo.png" alt="logo"></a>
      
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">    <ion-icon name="person-outline"></ion-icon>
          <span class="company_name mr-1 d-none d-lg-inline text-gray-600 big"> &nbsp;<span class="company_role mr-1 d-none d-lg-inline text-gray-600 small">Supervisor</span>

          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="editprofilesupervisor.php">Profile</a>
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
      <div class="sidebar-heading">Supervisor Dashboard</div>
      <div class="list-group list-group-flush">
        <a href="viewstudents.php" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt fa-fw mr-2"></i> View Students </a>
        <a href="companyinfo.php" class="list-group-item list-group-item-action"><i class="fas fa-chart-bar fa-fw mr-2"></i> Student's Internship Company Information </a>
        <a href="editprofilesupervisor.php" class="list-group-item list-group-item-action"><i class="fas fa-cog fa-fw mr-2"></i> Profile </a>
      </div>
    </div>
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-lg-9">
            <!-- Main content goes here -->
            <h2>Students Internship Company Information</h2>

    <?php
    session_start();

    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role'])) {
        header("Location: login.php");
        exit();
    }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    // Assuming the logged-in user is a supervisor
    $supervisorID = $_SESSION['user_id'];

    function viewCompanyInformation($supervisorID, $conn) {
        // Query to get company information where students under the supervision of the logged-in supervisor are interning
        $query = "SELECT companies.companyID, companies.companyname, companies.contactperson, companies.email
                FROM companies
                INNER JOIN internship_jobs ON companies.companyID = internship_jobs.companyID
                INNER JOIN jobapplications ON internship_jobs.jobID = jobapplications.jobID
                INNER JOIN supervisorstudent ON jobapplications.studentID = supervisorstudent.studentID
                WHERE supervisorstudent.supervisorID = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $supervisorID);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display the list of companies where students are interning
        if ($result->num_rows > 0) {
            echo "<h2>Companies where Your Students are Interning:</h2>";
            echo "<table class='company-table'>";
            echo "<tr><th>Company ID</th><th>Company Name</th><th>Contact Person</th><th>Contact Email</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['companyID'] . "</td>";
                echo "<td>" . $row['companyname'] . "</td>";
                echo "<td>" . $row['contactperson'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No information available about companies where your students are interning.</p>";
        }

        $stmt->close();
    }

// Call the function
viewCompanyInformation($supervisorID, $conn);

$conn->close();
?>

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