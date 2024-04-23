<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <nav class="nav-bar">
        <img src="./assets/new_logo.png" alt="">
        <a href="./admin.php"><button>Admin</button></a>
        <!-- <button class="admin"><a href="./admin.html">Admin</a> </button> -->
    </nav>

    <div class="login-container">
        <div class="form">
            <form class="register-form" action="./register.php" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="First Name" id="firstName" name="firstName" required>
                <input type="text" placeholder="Last Name" id="secName" name="secName" required>
                <input type="email" placeholder="Email" id="email" name="email" required>

                <div class="phone-input">
                    <select id="countryCode" name="countryCode" required>
                        <!-- Sample country codes, you can add more as needed -->
                        <option value="+1">USA (+1)</option>
                        <option value="+91">India (+91)</option>
                        <!-- Add more country options here -->
                    </select>
                    <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required>
                </div>

                <input type="file" id="profile" name="profile">

                <div class="radio-btn">
                    <input id="male" type="radio" name="gender" value="male" required>
                    <label for="male">Male</label>
                    <input id="female" type="radio" name="gender" value="female" required>
                    <label for="female">Female</label>
                </div>

                <input type="password" id="password" name="password" placeholder="Password (at least 8 characters)" required>
                <button type="submit" name="submit" value="submit">Create</button>
                <p class="message">Already Registered <a href="#" id="login-link">Login Here</a></p>
            </form>

            <!-- login -->
            <div class="display-login">
                <form action="./register.php" class="login-form" method="post">
                    <input type="text" placeholder="Email" name="email" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <button name="login" value="login" type="submit">Login</button>
                    <!-- Display error message if set -->
                    <?php if (!empty($error_message)) : ?>
                        <p class="error"><?php echo $error_message; ?></p>
                    <?php endif; ?>

                    <p class="message">Not Registered <a href="#" id="register-link">Create an account</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="./script.js" rel="text/javasript"></script>
</body>

</html>