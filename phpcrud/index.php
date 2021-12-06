<?php require_once './phpcrud/process.php';
    require_once './header.php';
   
    ?>

    <?php
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
  <h1>To Go Places !</h1>
</div>
<!-- Hero Section End -->
    <div class="container">

    <?php
    $mysqli=new mysqli('localhost','root','root','crud') or die(mysqli_error($mysqli));
    $result=$mysqli->query("SELECT * FROM data") or die($mysqli->error);
    ?>
    <div class="row justify-content-center"> 
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Place</th>
            <th>Location</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <?php
        while($row=$result->fetch_assoc()):?>
        <tr>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['location'];?></td>
          <td>
            <a href="welcome.php?edit=<?php echo $row['id'];?>" class="btn btn-info"> Edit</a>
            <a href="welcome.php?delete=<?php echo $row['id'];?>" class="btn btn-danger"> Delete</a>
          </td>
        </tr>
       <?php endwhile;?>
      </table>
    </div>

<?php
    // Array log the result
    //pre_r($result); //array
  // pre_r( $result->fetch_assoc());  //Human readable result in log
    function pre_r($array){  //it shows the results
      echo '<pre>';
      print_r($array);
      echo '<pre>';
    }
    ?>
    <div class="row justify-content-center">
    


    <form action="welcome.php?name=location" method="POST">
      <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="form-group">
        <label>Name </label>
        <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
        </div>
      <div class="form-group">
      <label>Location </label>
        <input type="text"  class="form-control" name="location" value="<?php echo $location;?>">
      </div>
      <div class="form-group">
        <?php 
        if($update==true):
        ?>
          <button type="submit" class="btn btn-info" name="update">Update</button>
          <?php else:?>
      <button type="submit" class="btn btn-primary" name="save">Save</button>
      <a href="/phptest" class="btn btn-secondary">Back</a>
      <?php endif;?>
      </div>
    </form>
    </div>
    </div>