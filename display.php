


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display User Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 100%;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        
        th {
            background-color: #333;
            color: white;
        }
        
        
        tr:hover {
            background-color: #ddd;
        }
        .update{
            background-color: #333;
            color: white;
            border: none;
            padding: 10px;
            font-size: 15px;
            border-radius: 10px;
        }
        .update:hover{
            background-color: #f2f2f2;
            color: black;
            cursor: pointer;
        }
        
    </style>
</head>
<body>

<div class="container">
    <h1>User Data</h1>

    <?php
        include("./connect.php");
        error_reporting(0);

        $query = "SELECT * FROM testData";
        $data = mysqli_query($conn, $query);

        $total = mysqli_num_rows($data);

        if ($total != 0) {
    ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Code</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Password</th>
                    <th>Operations</th>
                </tr>

                <?php
                    while ($result = mysqli_fetch_assoc($data)) {
                        echo "
                        <tr>
                            <td>" . $result['id'] . "</td>
                            <td>" . $result['fname'] . "</td>
                            <td>" . $result['lname'] . "</td>
                            <td>" . $result['email'] . "</td>
                            <td>" . $result['code'] . "</td>
                            <td>" . $result['phone'] . "</td>
                            <td>" . $result['gender'] . "</td>
                            <td>" . $result['pass'] . "</td>
                            <td><a href='update_details.php?id=$result[id]'><input type='submit' value='Update' class='update'/></a>
                            <a href='delete_details.php?id=$result[id]'><input type='submit' value='Delete' class='update' onClick='return checkDelete()'/></a></td>
                           
                            
                        </tr>
                        ";
                    }
                ?>
            </table>
            <?php
        } else {
            echo "No records found";
        }
    ?>

</div>
<script>
    function checkDelete(){
        return confirm('Are You shure to delete the Record')
    }
</script>
</body>
</html>
