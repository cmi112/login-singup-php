<?php
require_once 'connection.php';
require_once './headers/header.php';
session_start();
if(!isset($_SESSION['user'])){
    header("location:index.php");
}

?>

	<!-- <div class="container">

    <h1>You are login <?php echo $_SESSION['user']['name']?> </h1>
    <?php 
    echo "<h1>Welcome User :".$_SESSION['user']['name']." </h1>";
    print_r($_SESSION);
    ?>
    <a class="btn btn-primary" href="logout.php">Logout</a>
	</div> -->
    

    <?php
if($_GET["name"]=="contactForm"){
     include("./contact/contactform.php");
   

}
if($_GET["name"]=="calculator"){
    include("./calculator/calculator.php");
    

}
if($_GET["name"]=="evenOdd"){
    include("./evenOdd/evenOdd.php");
   

}
if($_GET["name"]=="mail"){
    include("./email/mail.php");
   

}
if($_GET["name"]=="todo"){
    include("./todolist/todo.php");
   

}
if($_GET["name"]=="location"){
    include("./phpcrud/index.php");
   

}
if($_GET["name"]=="posts"){
    include("./posts/posts.php");
   

}
if($_GET["name"]=="recipes"){
    include("./recipes/recipes.php");
  

}
if($_GET["name"]=="data"){
    include("./data/index.php");
  

}
?>



<div class="container">
<?php
include("footer.php")

?>

</div>
