<?php
require_once 'connection.php';
require_once 'header.php';
session_start();
if(!isset($_SESSION['user'])){
    header("location:index.php");
}
?>

	<div class="container">

    <h1>You are login <?php echo $_SESSION['user']['name']?> </h1>
    <?php 
    echo "<h1>Welcome User :".$_SESSION['user']['name']." </h1>";
    print_r($_SESSION);
    ?>
    <a class="btn btn-primary" href="logout.php">Logout</a>
	</div>
</body>
</html>