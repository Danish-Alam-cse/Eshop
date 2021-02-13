<?php include_once("../include/config.php");
if(!isset($_SESSION['user_login'])){
    redirect('../login');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Panel | <?= SITE_NAME; ?></title>
    <link href='../css/bootstrap.css' rel="stylesheet">
</head>
<body>
    <?php include "../include/nav.php";?>
    
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3">
                    <div class="list-group">
                        <a href="index.php" class="list-group-item list-group-item-action">Dashboard</a>
                        <a href="profile.php" class="list-group-item list-group-item-action">Profile</a>
                        <a href="my_order.php" class="list-group-item list-group-item-action">My Order</a>
                        <a href="" class="list-group-item list-group-item-action">Setting</a>
                        <a href="logout.php" class="list-group-item list-group-item-action">Logout</a>
                    </div>
                </div>
                <div class="col-lg-9">
                  <table class="table">
                      <tr>
                          <th>Order id</th>
                          <th>Product</th>
                          <th>Status</th>
                          <th>Datetime</th>
                          <th>Qty</th>
                          <th>Action</th>
                      </tr>
                      <?php
                      $log = $_SESSION['user_login'];
                      
                      $calling = mysqli_query($connect,"select * from orders 
                                                        INNER JOIN user ON orders.user_id = user.user_id 
                                                        INNER JOIN products ON orders.pro_id = products.pro_id
                                                        where user_email='$log'");
                      while($row = mysqli_fetch_array($calling)):
                      ?>
                      <tr>
                          <th><?= $row['order_id'];?></th>
                          <th><?= $row['pro_name'];?></th>
                          <th><?= $row['order_status'];?></th>
                          <th><?= $row['order_timestamp'];?></th>
                          <th><?= $row['qty'];?></th>
                          <th>
                              
                          </th>
                      </tr>
                      <?php endwhile;?>
                  </table>
            </div>
        </div>
    
    
    
    </div>
    <?php include "../include/footer.php";?>
</body>
</html>