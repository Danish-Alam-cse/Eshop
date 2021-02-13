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
               <table class="table table-sm">
                   <tr>
                       <th>#id</th>
                       <th>name</th>
                       <th>Email</th>
                       <th>Contact</th>
                       <th>Address</th>
                       <th>Gender</th>
                     
                       <th>Action</th>
            
                   </tr>
                   
                   <?php
                   $pro_calling = mysqli_query($connect,"select * from user");
                   while($row = mysqli_fetch_array($pro_calling)):
                   ?>
                   <tr>
                       <td><?= $row['user_id'];?></td>
                       <td><?= $row['user_name'];?></td>
                       <td><?= $row['user_email'];?></td>
                       <td><?= $row['user_contact'];?></td>
                       <td><?= $row['user_address'];?>, <?= $row['user_city'];?></td>
                      
                       <td><?= $row['user_gender'];?></td>
                       
                       <td>
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