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
                          <th>Order id</th>
                          <th>Product</th>
                          <th>User</th>
                          <th>Status</th>
                          <th>Datetime</th>
                          <th>Qty</th>
                          <th>Action</th>
                      </tr>
                      <?php                      
                      $calling = mysqli_query($connect,"select * from orders 
                                                        INNER JOIN user ON orders.user_id = user.user_id 
                                                        INNER JOIN products ON orders.pro_id = products.pro_id");
                      while($row = mysqli_fetch_array($calling)):
                      ?>
                      <tr>
                          <td><?= $row['order_id'];?></td>
                          <td><a href="../item.php?item_code=<?= $row['pro_id'];?>"><?= $row['pro_name'];?></a></td>
                          <td><?= $row['user_name'];?></td>
                          <td><?= $row['order_status'];?></td>
                          <td><?= $row['order_timestamp'];?></td>
                          <td><?= $row['qty'];?></td>
                          <td>
                          <?php 
                              if($row['order_status']==1):?>
                            <a href="orders.php?active=<?php echo $row['order_id'];?>" class="btn btn-warning btn-sm">Approve</a>
                         <?php elseif($row['order_status']==2): ?>
                            <a href="orders.php?active=1" class="btn btn-info btn-sm">Placed</a>
                         <?php elseif($row['order_status']==3): ?>
                            <a href="orders.php?active=1" class="btn btn-success btn-sm">Delivered </a>
                            <?php elseif($row['order_status']==0): ?>
                          <a href="orders.php?active=1" class="btn btn-danger btn-sm">Cancel </a>
                        <?php endif;?>
                         
                         <a href="" class="btn btn-dark btn-sm">Cancel</a>
                          </td>
                      </tr>
                      <?php endwhile;?>
                  </table>
           
            </div>
        </div>
    </div>
    
    
    
    <?php 
    
    if(isset($_GET['active'])){
        $id = $_GET['active'];
        $query = mysqli_query($connect,"update orders set order_status='2' where order_id='$id'");
        redirect('orders');
    }
    ?>
    
    <?php include_once("include/admin_footer.php");?>
</body>
</html>