<?php
require_once 'connection.php';
require_once './headers/front-header.php';

session_start();


if(isset($_SESSION['user'])){
    header("location: welcome.php");
}
if(isset($_REQUEST['register_btn'])){

    // echo"<pre>";
    // print_r($_REQUEST);
    // "</pre>";
    
    $name=filter_var($_REQUEST['name'],FILTER_SANITIZE_STRING);
    $email=filter_var(strtolower($_REQUEST['email']),FILTER_SANITIZE_EMAIL);
    $password=strip_tags($_REQUEST['password']);
 
    if(empty($name)){
        $errorMsg[0][]='Name required';
    }
    if(empty($email)){
        $errorMsg[1][]='Email required';
    }
    if(empty($password)){
        $errorMsg[2][]='Password  required';
    }
    if(strlen($password)<6){
        $errorMsg[2][]='Password Must be at least 6 characters';
    }
    // if the user exist save to db and hash the password
    if(empty($errorMsg)){
        try{
            // Check if the row exist
            $select_stmt=$db->prepare("SELECT name,email FROM users WHERE email= :email");
            $select_stmt->execute([':email'=>$email]);
            $row =  $select_stmt->fetch(PDO::FETCH_ASSOC);

            if(isset($row['email'])==$email){
                $errorMsg[1][]="Email address already exists, Please choose another or login instead";
            }else{
                $hashed_password=password_hash($password,PASSWORD_DEFAULT);
                $created=new DateTime();
                $created=$created->format('Y-m-d H:i:s');
                // Inserting data
                $insert_stmt=$db->prepare("INSERT INTO users(name,email,password,created) VALUES (:name,:email,:password,:created)");

                if(
                    $insert_stmt->execute(
                        [
                            ':name'=>$name,
                            ':email'=>$email,
                            ':password'=>$hashed_password,
                            ':created'=>$created
                        ]
                    )
                )
                {
                    header("location:index.php?msg=".urlencode('Click the verification email'));
                }
            }


        }catch(PDOExecption $e){
            $pdoError = $e->getMessage();

        }
    }

}
?>
   
   <div class="hero-section text-center">
<h1>Register</h1>
</div>
	<div class="container">
		
		<form action="./register.php" method="post">
			<div class="mb-3">
                <?php
                if(isset($errorMsg[0])){
                    foreach($errorMsg[0] as $nameErrors){
                        echo "<p class='small text-danger'> .$nameErrors.</p>";

                    }
                }
                
                ?>
				<label for="name" class="form-label">Name</label>
				<input type="text" name="name" class="form-control" placeholder="Jane Doe">
			</div>
			<div class="mb-3">
            <?php
                if(isset($errorMsg[1])){
                    foreach($errorMsg[1] as $emailErrors){
                        echo "<p class='small text-danger'> .$emailErrors.</p>";

                    }
                }
                
                ?>
				<label for="email" class="form-label">Email address</label>
				<input type="email" name="email" class="form-control" placeholder="jane@doe.com">
			</div>
			<div class="mb-3">
            <?php
                if(isset($errorMsg[2])){
                    foreach($errorMsg[2] as $passwordErrors){
                        echo "<p class='small text-danger'> .$passwordErrors.</p>";

                    }
                }
                
                ?>
				<label for="password" class="form-label">Password</label>
				<input type="password" name="password" class="form-control" placeholder="">
				
			</div>
			<button type="submit" name="register_btn" class="btn btn-primary">Register Account</button>
		</form>
		Already Have an Account? <a class="register" href="index.php">Login Instead</a>
	</div>

    <?php require_once './footer.php';?>