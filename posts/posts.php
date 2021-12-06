<?php
// Adding session message
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$database = "posts";
// DB Connection
$conn=mysqli_connect($servername,$username, $password, $database);
if(isset($_POST['submit']))

{   
     $title = $_POST['title'];
     $content = $_POST['content'];
     $author = $_POST['author'];
    if(empty($_POST['author'])){//Default value for the author
        $author = 'Unknown';
      }else{
        $author = $_POST['author'];
      }
     $sql = "INSERT INTO `post` (title,content,author) VALUES ('$title', '$content','$author')";

   // Form Validation 
if (empty($title) || empty($content)) {
    $_SESSION['message']="Fill the Form!";
    $_SESSION['msg_type']="warning";
    header("location:welcome.php?name=posts"); // Redirection after the submit
    return false;
}



     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !"; //success Message
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn); //Failed
     }
     mysqli_close($conn);
     
}

?>


<!-- Hero Section Start -->

<div class="hero-section text-center">
<h1>Blog Posts </h1>
</div>

<!-- Hero Section End -->
<div class="container d-flex justify-content-center">
    <form action="welcome.php?name=posts" method="post" class="w-50 align-items-center  m-5">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
            <textarea name="content"  class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Author</label>
            <input type="text" class="form-control" name="author">
        </div>

        <input type="submit" name="submit" class="btn btn-primary">
    </form>
</div>

<?php //Session Message 
    if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">


    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
        </div>
        <?php endif?>
<div class="container posts-list">
<div class="row g-4 ">
    <?php // Fetching data from DB
        $mysqli=new mysqli('localhost','root','root','posts') or die(mysqli_error($mysqli));
        $result=$mysqli->query("SELECT * FROM post") or die($mysqli->error);
        ?>
        <?php
        while($row=$result->fetch_assoc()):
        ?>
           
                <div class="col col-lg-4 col-md-6 col-sm-12 g-5 d-flex justify-content-center">
                   <div class="card g-2" style="width: 18rem;"> 
                   <img src="https://media.sproutsocial.com/uploads/2020/08/best-times-to-post-2021-feature-image.png" class="card-img-top" alt="...">
                      <div class="card-body">
                      <h5 class="card-title"><?php echo $row['title'];?></h5>
                        <p  class="card-text"><?php $string=strip_tags($row['content']);
                        if(strlen($string)>100):
                            $stringCut=substr($string,0,100);
                            $endPoint=strrpos($stringCut,'');
                            $string=$endPoint?substr($stringCut,0,$endPoint):substr($stringCut,0);
                            $string.='...<a href="./posts/post.php?id=' . $row["id"] . '">Read more</a>';
                        endif;
                        echo $string;
                        
                        ?></p>
                        <p class="card-text">Author : <?php echo $row['author']?? 'Unknown' ;?></p>
                        <span>Published : <?php echo $row['register_date'];?></span>
                      
                        </div>
                     
                    </div>
                </div>
            
    <?php endwhile;?>
    </div>
</div>