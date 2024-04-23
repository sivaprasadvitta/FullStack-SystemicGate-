<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPage</title>
    <!-- <link rel="stylesheet" href="./admin.css"> -->
    <!-- <link rel="stylesheet" href="./style.css"> -->
</head>
<body>
    <div class="admin">
        <form action="" class="login-form" method="post">
            <input type="text" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            <button name="login" type="submit">Login</button>

            <!-- Display error message if set -->
            <?php if(!empty($error_message)): ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>

        </form>
    </div>
</body>
</html>
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "PojectDetails";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        // echo "connection ok";
    }

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM AdminDetails WHERE email = '$email' ";
        $data = mysqli_query($conn, $query);

        $total = mysqli_num_rows($data);
        $result = mysqli_fetch_assoc($data);

        if ($total == 1 && $result['pass'] === $password) {
            header("Location: display.php");
            exit();
        } else {
            $error_message = "Incorrect email or password. Please try again.";
        }
    }
?>


