<?php
include "./connect.php";

$id = $_GET['id'] ?? '';

$query = "DELETE FROM testData WHERE id = '$id' ";

$data = mysqli_query($conn,$query);

if($data){
    echo "<script>alert('Record is deleted')</script>";
    ?>
  	    <meta http-equiv="refresh" content="0; URL=http://localhost/Assignment/display.php/" />
    <?php
}else{
    echo "<script>alert('Failed to Delete')</script>";
}

?>