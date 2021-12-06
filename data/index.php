<?php

$db = mysqli_connect("localhost","root","root","posts");  // database connection

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
<?php



if(isset($_POST["submit"]))
{
  $target="./data/images/".basename($_FILES['image']['name']);
  // Get all the subitted data from the form
  $image=$_FILES['image']['name'];
  $text=$_POST['text'];
  
  $sql ="INSERT INTO images (image,text) VALUES ('$image','$text')";
  mysqli_query($db,$sql);//stored the submited data in to the db table :images

  // Move the uploaded image into the folder: images
  if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
    $msg="Image uploaded successfully";
  }else{
    $msg ="Failed";
  }
  
}
?>


  <style>
  table img{
    width:100px; 
    height:100px;
   
  }
 
  
  </style>
   <!-- Hero Section Start -->

   <div class="hero-section text-center">
<h1>Image Collector !</h1>
</div>

<!-- Hero Section End -->

<div class="container d-flex justify-content-center">
  <form action="welcome.php?name=data" method="post" class="w-50" enctype="multipart/form-data">
      <table border="2">
        <tr>
          <td>Enter Name</td>
          <td><input type="text" name="text" class="form-control" placeholder="Enter Name" Required></td>
        </tr>
        <tr>
          <td>Select Image</td>
          <td><input type="file" name="image" class="form-control" Required></td>
        </tr>
        <tr>
        <div class="row justify-content-center">
          <td colspan="2"><input type="submit" name="submit"  class="form-control btn btn-primary btn-sm m-50" value="Upload"></td>			
        </div>
        </tr>
      </table>
  </form>
</div>


<hr/>







<div class="container">


<div class="row justify-content-center"> 
  <table class="table table-hover">
    <thead>
      <tr >
        <th>ID</th>
        <th>Name</th>
        <th colspan="2">Images</th>
      </tr>
    </thead>
    <?php



$records = mysqli_query($db,"select * from images"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
    <tr>
      <td><?php echo $data['id'];?></td>
      <td><?php echo $data['text'];?></td>
      <td>
      <?php echo "<img class='img-fluid' src='data/images/".$data['image']. "'>";?>
      </td>
    </tr>
 <?php }?>
  
  </table>
</div>