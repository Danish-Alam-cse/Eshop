<?php require_once("include/config.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= SITE_NAME; ?></title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
   <?php include "include/nav.php";?>
    <!--- banner -->
   
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="list-group">
                   <?php 
                    $calling = mysqli_query($connect,"select * from category");
                    while($row = mysqli_fetch_array($calling)):
                    ?>
                    <a href="cat.php?cat=<?= $row['cat_id'];?>" class="list-group-item list-group-item-action"><?= $row['cat_title'];?> <span class="float-right font-weight-bold">&raquo;</span></a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-lg-9">
               <div class="row">
                <?php 
                   if(isset($_GET['cat'])){
                       $cat = $_GET['cat'];
                     $calling_product = mysqli_query($connect,"SELECT * FROM products where pro_category='$cat'");    
                    $count = mysqli_num_rows($calling_product);
                       if($count < 1):
                       ?>
                           <h2 class="lead text-danger font-weight-bold">Not Found Any products in this Category</h2>
                   
                           <?php else:                          
                    while($row = mysqli_fetch_array($calling_product)):
                ?>
                
                <div class="col-lg-3 mb-3">
                   
                    <div class="card shadow">
                       <img src="admin/image/<?= $row['pro_img1'];?>" alt="" width="100%" height="180px">
                        <div class="card-body">
                            <h2 class="lead text-truncate mb-0"><?= $row['pro_name'];?></h2>
                            <p class="small p-0 m-0 mb-1">Rs. <?= $row['pro_price'];?>/-</p>
                            <a href="item.php?item_code=<?= $row['pro_id']?>" class="btn btn-success btn-sm">Buy Now</a>
                        </div>
                    </div>
                </div>
                
                <?php endwhile;  
                   endif;
                   } 
                   
                   ?>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("include/footer.php");?>
</body>
</html>