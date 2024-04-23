<?php
include('./connect.php');

$id = $_GET['id'] ?? ''; // Get the ID parameter from the URL

$query = "SELECT * FROM testData WHERE id = '$id'";
$data = mysqli_query($conn, $query);

$result = mysqli_fetch_assoc($data); // Fetch the row data
// echo $result['pass'] . "<br>";
// echo md5($result['pass']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./update_details.css">
    <title>Document</title>

</head>

<body>
    <nav class="nav-bar">
        <img src="./assets/new_logo.png" alt="">
        <!-- <a href="./admin.html"><button>Admin</button></a> -->
        <!-- <button class="admin"><a href="./admin.html">Admin</a> </button> -->
    </nav>

    <div class="login-container">
        <div class="form">
            <h1>Update the details</h1>
            <form class="register-form" method="post">
                <input type="text" placeholder="First Name" id="firstName" name="firstName" value="<?php echo $result['fname'] ?? ''; ?>" required>
                <input type="text" placeholder="Last Name" id="secName" name="secName" value="<?php echo $result['lname'] ?? ''; ?>" required>
                <input type="email" placeholder="Email" id="email" name="email" value="<?php echo $result['email'] ?? ''; ?>" required>

                <div class="phone-input">
                    <select id="countryCode" name="countryCode" required>
                        <!-- Sample country codes, you can add more as needed -->
                        <option value="+1" <?php echo ($result['code'] === '+1') ? 'selected' : ''; ?>>USA (+1)</option>
                        <option value="+91" <?php echo ($result['code'] === '+91') ? 'selected' : ''; ?>>India (+91)</option>
                        <!-- Add more country options here -->
                    </select>
                    <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" value="<?php echo $result['phone'] ?? ''; ?>" required>
                </div>

                <!-- Remove profile picture input for now -->
                <!-- <input type="file" id="profile" name="profile"> -->

                <div class="radio-btn">
                    <input id="male" type="radio" name="gender" value="male" <?php echo ($result['gender'] === 'male') ? 'checked' : ''; ?> required>
                    <label for="male">Male</label>
                    <input id="female" type="radio" name="gender" value="female" <?php echo ($result['gender'] === 'female') ? 'checked' : ''; ?> required>
                    <label for="female">Female</label>
                </div>

                <input type="password" id="password" name="password" placeholder="Password (at least 8 characters)" value="<?php echo md5($result['pass']) ?? ''; ?>" required>

                <button type="submit" name="update" value="submit">Update</button>

                <!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Pass the ID as a hidden input -->
                <!-- <p class="message">Already Registered <a href="#" id="login-link">Login Here</a></p> -->
            </form>
        </div>
    </div>


</body>

</html>

<?php
include './connect.php';

if (isset($_POST['update'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['secName'];
    $email = $_POST['email'];
    $countryCode = $_POST['countryCode'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $password = md5($password);
    // $profile = 

    // Assuming $id is properly set elsewhere in your code
    // $id = $_POST['id'];
    $id = $_GET['id'] ?? '';

    $query = "UPDATE testData SET  fname= '$firstName', lname='$lastName', email='$email', code='$countryCode', phone='$phoneNumber', gender='$gender', pass='$password' WHERE id='$id' ";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Record is updated')</script>";
        ?>
  			<meta http-equiv="refresh" content="0; URL=http://localhost/Assignment/display.php/" />
        <?php
    } else {
        echo "failed to update: " . mysqli_error($conn); // Display MySQL error message
    }
}
?>