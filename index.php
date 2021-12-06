<?php
require_once 'connection.php';
include("./headers/front-header.php");
session_start();
if(isset($_SESSION['user'])){
    header("location: welcome.php");
}
// if form is submitted
if(isset($_REQUEST['login_btn'])){
    $email=filter_var(strtolower($_REQUEST['email']),FILTER_SANITIZE_EMAIL);
    $password=strip_tags($_REQUEST['password']);

    if(empty($email)){
        $errorMsg[]='Must enter Email';
    }else if(empty($password)){
        $errorMsg[]='Must enter Password';
    }

    // Test db check if this user already exist
    else{
        try{
            $select_stmt=$db->prepare("SELECT * FROM users WHERE email= :email LIMIT 1");
            $select_stmt->execute(
                [
                    ':email'=>$email
                ]
                );
                $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
                // check if we have a row
                if($select_stmt->rowCount()>0){
                    if(password_verify($password,$row["password"])){
                        $_SESSION['user']['name']=$row['name'];
                        $_SESSION['user']['email']=$row['email'];
                        $_SESSION['user']['id']=$row['id'];
                        header("location: welcome.php");
                    }else{
                        $errorMsg[]='Wrong email or password';
                    }
    
                }else{
                    $errorMsg[]='Wrong email or password';
                }

        }catch(PDOException $e){
            echo $e->getMessage();

        }
    }
}
?>

<div class="hero-section text-center">
<h1>Welcome to my PHP Mini Projects</h1>
</div>
	<div class="container">

 
    <?php
    if( isset($_REQUEST['msg']) ){
        echo "<p class='alert alert-warning'>".$_REQUEST['msg']."</p>";
    }
    if( isset($errorMsg) ){
        foreach($errorMsg as $loginError){

            echo "<p class='alert alert-danger'>".$loginError."</p>";
        }
    }
    ?>
		<form action="index.php" method="post">
      <div class="mb-3">

          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" placeholder="jane@doe.com">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="">
        </div>
			<button type="submit" name="login_btn" class="btn btn-primary">Login</button>
		</form>
    No Account? <a class="register" href="register.php">Register Instead</a>
	</div>


    <div class="container">

</div>


<?php
include("footer.php")

?>





