
<?php //Session Message 
    if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">


    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
        </div>
        <?php endif?>
<div class="container posts-list">
<div class="row g-4 ">
    <?php // Fetching data from DB
        $id=$_GET['id'];
        $mysqli=new mysqli('localhost','root','root','posts') or die(mysqli_error($mysqli));
        $result=$mysqli->query("SELECT * FROM post WHERE id=$id") or die($mysqli->error);
        ?>
        <?php
        while($row=$result->fetch_assoc()):
        ?>
           
                <div class="col col-lg-4 col-md-6 col-sm-12 g-5 d-flex justify-content-center">
                   <div class="card g-2" style="width: 18rem;"> 
                   <img src="https://media.sproutsocial.com/uploads/2020/08/best-times-to-post-2021-feature-image.png" class="card-img-top" alt="...">
                      <div class="card-body">
                      <h5 class="card-title"><?php echo $row['title'];?></h5>
                        <p  class="card-text"><?php echo $row['content'];?></p>
                        <p class="card-text">Author : <?php echo $row['author']?? 'Unknown' ;?></p>
                        <span>Published : <?php echo $row['register_date'];?></span>
                      
                        </div>
                     
                    </div>
                </div>
            
    <?php endwhile;?>
    </div>
</div>