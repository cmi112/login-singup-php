


 <!-- Recipes liste -->
<div class="container  recipes">
    <div class="row">
    
        
            <?php  $id=$_GET['id'];
        $mysqli=new mysqli('localhost','root','root','recipes') or die(mysqli_error($mysqli));
        $result=$mysqli->query("SELECT * FROM recipe WHERE id=$id") or die($mysqli->error);
        ?>
        <?php
        while($data=$result->fetch_assoc()):
        ?>

                <div class="col col-6 col-md-4 py-md-5">
                    <div class="card" style="width: 18rem;">
                        <img src="./recipes/images/<?php echo $data['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Recipe Name : <?php echo $data['title']; ?></h5>
                            <p class="card-text"> <?php echo $data['content']; ?></p>
                            <span>Author : <?php echo $data['author']; ?></span>
                        </div>
                    </div>
                </div>

         
       
        <?php
      endwhile;
        ?>
    </div>
</div>
<?php mysqli_close($db);  // close connection ?>