<?php require_once 'process.php';?>
<?php //Session Message 
    if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">


    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
        </div>
        <?php endif?>

        <?php

$db = mysqli_connect("localhost","root","root","crud");  // database connection

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>

        <!-- Hero Section Start -->

<div class="hero-section text-center">
<h1>Simple To Do List !</h1>
</div>

<!-- Hero Section End -->
    <div class="container d-flex justify-content-center">
        <form action="welcome.php?name=todo" method="POST" class="w-50 align-items-center" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Add to do</label>
                <input type="text"class="form-control" name="task">
            </div>
            <input type="submit" class=" btn btn-primary" name="submit">
        </form>

    </div>


<div class="container">


<div class="row justify-content-center"> 
  <table class="table table-hover">
    <thead>
      <tr >
        <th>ID</th>
        <th>Todo List</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php



$records = mysqli_query($db,"select * from todo"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
    <tr>
      <td><?php echo $data['id'];?></td>
      <td><?php echo $data['task'];?></td>
      <td>
            <a href="welcome.php?edit=<?php echo $row['id'];?>" class="btn btn-info"> Edit</a>
            <a href="welcome.php?delete=<?php echo $row['id'];?>" class="btn btn-danger"> Delete</a>
     </td>
    </tr>
 <?php }?>
  
  </table>
</div>