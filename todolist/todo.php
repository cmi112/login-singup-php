<?php require_once 'process.php';?>
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
<h1>Simple To Do List !</h1>
</div>

<!-- Hero Section End -->
    <div class="container d-flex justify-content-center">
        <form action="welcome.php?name=todo" method="POST" class="w-50 align-items-center">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Add to do</label>
                <input type="text"class="form-control" name="task">
            </div>
            <input type="submit" class=" btn btn-primary">
        </form>

    </div>