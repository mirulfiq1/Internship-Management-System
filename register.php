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

    $userType = $_POST['userType'];
    $username = $_POST ['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmpass'];


    $sql = "INSERT INTO users (userType, username, email, password, confirmpass)
    VALUES ('$userType', '$username', '$email', '$password', '$confirmpass')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type= 'text/javascript'>alert('New record created
        successfully');</script>";
        header("Location: login.php");
    } else {
        echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="register.css">
    <link rel="icon" type="image/x-icon" href="uitm-logo.png">
</head>
<body>

    <header>
        <img src="uitmlogo.png" alt="logo">
        <h1>Internship Management System</h1>
    </header>

    <section class="form-section">
        <h2>Create Your Account</h2>
        <form action="" method="post">
            <label for="userType">User Type:</label>
            <select id="userType" name="userType" required>
                <option value="" disabled selected>Select an option</option>
                <option value="student">Student</option>
                <option value="company">Company</option>
                <option value="supervisor">Supervisor</option>
                <option value="admin">Admin</option>
            </select>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmpass">Confirm Password:</label>
            <input type="password" id="confirmpass" name="confirmpass" required>

            <button type="submit">Register</button>
        </form>
    </section>

    <footer>
        &copy; 2023 Internship Management System
    </footer>

</body>
</html>
