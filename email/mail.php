<?php 
if(isset($_POST['submit'])){
    $to = "cmisomtech@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
  
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    //mail($to,$subject,$message,$headers);
    //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<!-- Hero Section Start -->

<div class="hero-section text-center">
<h1>Email !</h1>
</div>

<!-- Hero Section End -->



<div class="container d-flex justify-content-center ">
    <form action="welcome.php/?name=mail" method="post" class="w-50">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name">          
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea class="form-control" name="message" id="floatingTextarea"></textarea>
        </div>
        <div class="row justify-content-center">
            <input type="submit" class="form-control btn btn-primary w-50 "  name="submit">
         </div>
    </form>
</div>