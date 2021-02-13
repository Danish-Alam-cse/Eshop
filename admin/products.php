<?php require_once("../include/config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= SITE_NAME; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <?php include_once("include/admin_nav.php");?>
    
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <?php include_once("include/admin_side.php");?>
            </div>
            <div class="col-lg-9">
               <a href="product_insert.php" class="btn btn-success float-right mb-2">Insert Products</a>
               <table class="table">
                   <tr>
                       <th>#id</th>
                       <th>name</th>
                       <th>Brand</th>
                       <th>Amount</th>
                       <th>MRP</th>
                       <th>Category</th>
                       <th>Qty</th>
                       <th>Status</th>
                       <th>Action</th>
            
                   </tr>
                   
                   <?php
                   $pro_calling = mysqli_query($connect,"select * from products ORDER BY pro_id DESC");
                   while($row = mysqli_fetch_array($pro_calling)):
                   ?>
                   <tr>
                       <td><?= $row['pro_id'];?></td>
                       <td><?= $row['pro_name'];?></td>
                       <td><?= $row['pro_brand'];?></td>
                       <td><?= $row['pro_price'];?></td>
                       <td><?= $row['pro_mrp'];?></td>
                       <td><?= $row['pro_category'];?></td>
                       <td><?= $row['pro_qty'];?></td>
                       <td><?= $row['pro_status'];?></td>
                       
                       <td>
                           <a href="product_delete.php?pro_del=<?= $row['pro_id'];?>" class="btn btn-danger btn-sm">X</a>
                           <a href="product_edit.php?pro_edit=<?= $row['pro_id'];?>" class="btn btn-info btn-sm">edit</a>
                           <a href="../item.php?item_code=<?= $row['pro_id'];?>" class="btn btn-success btn-sm">view</a>
                       </td>
                   </tr>
                   <?php endwhile; ?>
               </table>
           
            </div>
        </div>
    </div>
    
    
    
    
    
    <?php include_once("include/admin_footer.php");?>
</body>
</html>