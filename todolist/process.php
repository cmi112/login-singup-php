<?php
// Adding session message
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "crud";

$conn=mysqli_connect($servername,$username, $password, $dbname);
if(isset($_POST['submit']))
{    
     $task = $_POST['task'];
   
        //   Form Validation
if (empty($task)) {
    $_SESSION['message']="Fill the Form";
    $_SESSION['msg_type']="warning";
    header("location:welcome.php?name=todo"); // Redirection after the submit
    return false;
}

     $sql = "INSERT INTO `todo` (task) VALUES ('$task')";
     
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}




?>