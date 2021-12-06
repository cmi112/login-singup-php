<!-- Hero Section Start -->
<div class="calculator text-center" id="calculator">
    <h1>Calculator!</h1>
</div>
<!-- Hero Section End -->
<div class="container d-flex justify-content-center">
    <form action="welcome.php?name=calculator" class="w-50 align-items-center" method="POST">
        <div class="input-group mb-3">
            <input type="number" class="form-control" step="0.0001" name="num1" placeholder="Number One" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <input type="number" class="form-control" step="0.0001" name="num2" placeholder="Number Two" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="operation" placeholder=" + , -, *,/, %" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="row justify-content-center">
            <input type="submit" class="form-control btn btn-primary w-50 "  name="submit">
        </div>
    </form>
</div>
<?php
$num1 = $_GET['num1'];
$num2= $_GET['num2'];
$operation= $_GET['operation'];
if($operation=="+"){
    echo "The Answer is :". $num1 +$num2;
}
else if($operation=="-"){
    echo "The Answer is :". $num1 -$num2;

}
else if($operation=="*"){
    echo "The Answer is :". $num1 * $num2;

}
else if($operation=="/"){
    echo "The Answer is :". $num1 / $num2;

}
else if($operation=="%"){
    echo "The Answer is :". $num1 % $num2;

}
?>