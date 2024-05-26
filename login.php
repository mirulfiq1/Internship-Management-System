<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "test";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['usertype'] === 'admin') {
            // User is an admin
            $_SESSION['user_id'] = $user['username'];
            $_SESSION['user_role'] = 'admin';
            header("Location: admindashboard.php");
            exit();
        } else {
        
        $_SESSION['user_id'] = $user['username'];
        $_SESSION['user_role'] = $user['usertype'];

        switch ($_SESSION['user_role']) {
            case 'student':
                header("Location: studentdashboard.php");
                break;
            case 'supervisor':
                header("Location: supervisordashboard.php");
                break;
            case 'company':
                header("Location: companydashboard.php");
                break;
            default:
                echo "Invalid user";
                break;
        }
        exit();
        }
    } else {
        echo "Invalid username or password";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="uitm-logo.png">
</head>
<body>

    <header>
        <img src="uitmlogo.png" alt="logo">
        <h1>Internship Management System</h1>
    </header>

    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="username" required>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-open-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember me <a href="link">Forget Password</a></label>
                    </div>
                    <button type="submit">Log in</button>
                    <div class="register">
                        <p>Don't have an account <a href="register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <footer>
        &copy; 2023 Internship Management System
    </footer>

</body>
</html>
