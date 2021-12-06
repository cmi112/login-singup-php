<!-- Hero Section Start -->

<div class="hero-section text-center">
<h1>Even Odd Checker</h1>
</div>

<!-- Hero Section End -->
<div class="container d-flex justify-content-center">
    <form action="welcome.php?name=evenOdd" method="post">
            <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Check the Number</label>
                    <input type="number" class="form-control" name="number">
            </div>
            <input type="submit" class="form-control btn btn-primary"  name="submit" placeholder="Username">  
    </form>
</div>



<div class="container d-flex justify-content-center ">
    <?php
// PHP code to check whether the number 
// is Even or Odd in Normal way
$number=$_POST["number"];
function check($number){
    if($number % 2 == 0){
        echo $number." is Even"; 
    }
    else{
        echo $number." is Odd";
    }
}
  
// Driver Code
// $number = 39;
check($number)
?>

</div>