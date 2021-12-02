<?php
include("./header.php");

$db = mysqli_connect("localhost","root","root","recipes");  // database connection

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>

<?php



if(isset($_POST["submit"]))
{
  $target="recipes/images/".basename($_FILES['image']['name']);
  // Get all the subitted data from the form
  $title=$_POST['title'];
  $content=$_POST['content'];
  $image=$_FILES['image']['name'];
  $author=$_POST['author'];
 
  

$sql ="INSERT INTO recipe (title,content,image,author) VALUES ('$title','$content','$image','$author')";
  
  mysqli_query($db,$sql);//stored the submited data in to the db table :images

  // Move the uploaded image into the folder: images
  if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
    $msg="Image uploaded successfully";
  }else{
    $msg ="Failed";
  }
  
}
?>
 


<!-- Hero Section Start -->

<div class="hero-section">
<h1>Welcome to Recipes World !</h1>
</div>

<!-- Hero Section End -->
<!-- Add Recipes Section start -->
<div class="container">
<form action="index.php?name=recipes" method="post" enctype="multipart/form-data">
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Add Recipes: </label>
<input type="text" class="form-control" name="title" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label">Content</label>
<textarea class="form-control"  name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="input-group mb-3">
<label class="input-group-text" for="inputGroupFile01">Upload</label>
<input type="file" class="form-control"  name="image" id="inputGroupFile01">
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Recipes Name: </label>
<input type="text" class="form-control" id="exampleFormControlInput1"  name="author">
</div>
<input type="submit" class="btn btn-primary" name="submit" value="Post Your Recipe" >
</form>
</div>
<!-- Add Recipes Section end -->
 



 <!-- Recipes liste -->
<div class="container  recipes">
    <div class="row">
        <?php 
        $records = mysqli_query($db,"select * from recipe"); // fetch data from database
        while($data = mysqli_fetch_array($records))
        {
        ?>

                <div class="col col-6 col-md-4 py-md-5">
                    <div class="card" style="width: 18rem;">
                        <img src="recipes/images/<?php echo $data['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Recipe Name : <?php echo $data['title']; ?></h5>
                            <p class="card-text"><?php echo $data['content']; ?></p>
                            <span>Author : <?php echo $data['author']; ?></span>
                        </div>
                    </div>
                </div>

         
       
        <?php
        }
        ?>
    </div>
</div>
<?php mysqli_close($db);  // close connection ?>