
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>Leave Application</title>
  <style>
    h1 {
      text-align: center;
      font-size: 2.5em;
      font-weight: bold;
      padding-top: 1em;
      margin-bottom: -0.5em;
    }

    form {
      padding: 40px;
    }

    input,
    textarea {
      margin: 5px;
      font-size: 1.1em !important;
      outline: none;
    }

    label {
      margin-top: 2em;
      font-size: 1.1em !important;
    }

    label.form-check-label {
      margin-top: 0px;
    }

    #err {
      display: none;
      padding: 1.5em;
      padding-left: 4em;
      font-size: 1.2em;
      font-weight: bold;
      margin-top: 1em;
    }

    table{
      width: 90% !important;
      margin: 1.5rem auto !important;
      font-size: 1.1em !important;
    }

    .error{
      color: #FF0000;
    }
  </style>


</head>

<body>
  <!--Navbar-->
  <nav class="navbar header-nav navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      


      
    </div>
  </nav>


  <h1>My Application History</h1>

  <div class="container">
  
    <div class="table-responsive">
    
      <table class="table table-bordered table-hover table-striped">
          <thead>
              <th>#</th>
              <th>Application Date</th>
              <th>Student CV</th>
              <th>Status</th>
          </thead>
          <tbody>
            <!-- loading all leave applications of the user -->
            <?php
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "test";
                  
                  $conn = new mysqli($servername, $username, $password, $dbname);
                  
                  if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                  }
                  
                  $query = mysqli_query($conn,"SELECT status FROM jobapplications WHERE status IN ('Pending', 'Accepted', 'Rejected')");

                  if($query){
                    $numrow = mysqli_num_rows($query);

                    if($numrow!=0){
                      $cnt=1;

                      while($row = mysqli_fetch_assoc($query)){
                        $datetime1 = new DateTime();
                        echo "<tr>
                                <td>$cnt</td>
                                <td>{$datetime1->format('Y/m/d')}</td>
                                <td><a href='path/to/files/" . htmlspecialchars($row['CVfile']) . "' download='" . htmlspecialchars($row['CVfile']) . "'>" . htmlspecialchars($row['CVfile']) . "</a></td>
                                <td><b>{$row['status']}</b></td>
                              </tr>";
                     $cnt++; }
                    } else {
                      echo"<tr class='text-center'><td colspan='12'><b>YOU DON'T HAVE ANY APPLICATION HISTORY! PLEASE APPLY TO VIEW YOUR STATUS HERE!</b></td></tr>";
                    }
                  }
                  else{
                    echo "Query Error : " . "SELECT status FROM jobapplications WHERE status IN ('Pending', 'Accepted', 'Rejected')" . "<br>" . mysqli_error($conn);;
                  }
              ?>
          </tbody>
      </table>
  </div>
  </div>

  

</body>

</html>

<?php


ini_set('display_errors', true);
error_reporting(E_ALL);
?>