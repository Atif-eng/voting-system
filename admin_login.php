<?php
    // first check if user has filled the form by using isset and $_POST variables

    // if user has entered username and pass then perform the db connection and the query

    // right a query that will select the username and password from new_my where user name and password
    // is same as what user entered in the form.

    // Note: to get what user entered in the form we can use the $_POST variable

    // query = 'SELECT user_name, user_password from new_my where user_name=$_POST['user_name'] and user_password=$_POST['user_pass']

    // Check if the form has been submitted
if (isset($_POST['submit']) && isset($_POST['user_name']) && isset($_POST['user_pass']) ) {

    // Write the SQL query
    $input_username = $_POST['user_name'];
    $input_password = $_POST['user_pass'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mynew";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT user_name, user_password FROM new_my WHERE user_name = '$input_username' AND user_password = '$input_password'";

    // Execute the query
    $result = $conn->query($sql);


    // Check if the query was successful
    if ( $result->num_rows > 0 ) {
        header("location:admin_panel.php");
        // Free the result set
        $result->free();
    } else {
        // Query failed
        echo "Username or Password not correct";
    }

}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>voting system</title>
    <link rel="stylesheet" href="index.css">

</head>
<body style="background-color:powderblue;">


    <div class="container">     
    <div class="admin1"> 
    <h1>Admin Login</h1>
    </div>
    <hr>
    <form action="admin_login.php" method="post">
        <b>User Name:</b><input type="text" name="user_name"/><br>
        <b>User Pass:</b><input type="password" name="user_pass"/><br>
        <input type="submit" name="submit" value="submit">
        </form>
    </div>
    </body>
</html>














































