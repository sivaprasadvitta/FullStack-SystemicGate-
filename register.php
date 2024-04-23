<?php
include './connect.php';

if(isset($_POST['submit'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['secName'];
    $email = $_POST['email'];
    $countryCode = $_POST['countryCode'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $password = md5($password);
    // $profile = 

    $query = "INSERT INTO testData  (fname,lname,email,code,phone,gender,pass) VALUES('$firstName','$lastName','$email','$countryCode','$phoneNumber','$gender','$password')"; 

    $data = mysqli_query($conn,$query);

    if($data){
        echo "data is inserted ";
    } else {
        echo "failed: " . mysqli_error($conn); // Display MySQL error message
    }
}
?>
