<?php
// Adding session message
session_start();


// Connecting Database
$mysqli=new mysqli('localhost','root','root','crud') or die(mysqli_error($mysqli));

// Defualt values
$id=0;  //Hidden id initializing that helpt to update functionality
$update=false; // upadate btn in edit btn
$name='';
$location="";
// Send Data to the Database
if(isset($_POST['save'])){
    $name=$_POST['name'];
    $location=$_POST['location'];
// Inserting values
if (empty($name) && empty($location)) {
    $_SESSION['message']="Enter Place name and Location!";
    $_SESSION['msg_type']="warning";
    header("location:index.php?name=location");

    // echo 'Form is empty';
    return false;
}
    $mysqli->query("INSERT INTO data(name,location) VALUES('$name','$location')") or die($mysqli->error);
      // Adding session msg
      $_SESSION['message']="Record has been saved !";
      $_SESSION['msg_type']="success";
      header("location:welcome.php?name=location");
}

// Delete item from db
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
       // Adding session msg
       $_SESSION['message']="Record has been Deleted!";
       $_SESSION['msg_type']="danger";
       header("location:welcome.php?name=location");
}

// Edit button 
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if(count($result)==1){
        $row =$result->fetch_array();
        $name=$row['name'];
        $location=$row['location'];
   

    }
}
// Update btn click
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $mysqli->query("UPDATE data SET name='$name',location='$location' WHERE id=$id") or die($mysqli->error);

     // Adding session msg
     $_SESSION['message']="Record has been Updated!";
     $_SESSION['msg_type']="warning";
     header("location:index.php?name=location");

}

?>