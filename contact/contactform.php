<?php
// Adding session message
session_start();
$servername = "localhost";
$database = "contactform";
$username = "root";
$password = "root";
$conn=mysqli_connect($servername,$username, $password, $database);
if(isset($_POST['submit']))
{    
     $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
     $email = $_POST['email'];    
     $msg = $_POST['msg'];
        //   Form Validation
if (empty($firstname) || empty($lastname)) {
    $_SESSION['message']="Fill the Form";
    $_SESSION['msg_type']="warning";
    header("location:welcome.php?name=contactForm"); // Redirection after the submit
    return false;
}

     $sql = "INSERT INTO `users_info` (firstname,lastname,email,msg) VALUES ('$firstname', '$lastname', '$email', '$msg')";
     if (mysqli_query($conn, $sql)) {
        echo "Your Message has been sent successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}

?>

<?php //Session Message 
    if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">


    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
        </div>
        <?php endif?>
<!-- Hero Section Start -->

<div class="hero-section text-center">
<h1 class="text-center">Contact us !</h1>
</div>

<!-- Hero Section End -->
<div class="container d-flex justify-content-center align-items-center">

        <form action="welcome.php?name=contactForm" method="post" class="w-50 align-items-center">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstname" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastname" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control" name="msg"  id="floatingTextarea"></textarea>
                </div>
                <div class="row justify-content-center">
                <input type="submit" class="form-control btn btn-primary btn-lg w-50 "  name="submit">
                </div>
            
               
        </form>

 </div>
