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
            <div class="col-lg-2">
                <div class="list-group">
                    <?php 
                    $calling = mysqli_query($connect,"select * from category");
                    while($row = mysqli_fetch_array($calling)):
                    ?>
                    <a href="" class="list-group-item list-group-item-action"><?= $row['cat_title'];?> <span class="float-right font-weight-bold">&raquo;</span></a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php 
                   $item = $_GET['item_code'];
                    $calling_product = mysqli_query($connect,"SELECT * FROM products JOIN category ON products.pro_category=category.cat_id where pro_id='$item'");
                    $row = mysqli_fetch_array($calling_product);
                ?>
                    <div class="col-lg-4">
                        <img src="admin/image/<?= $row['pro_img1'];?>" alt="" width="100%" height="auto">
                    </div>

                    <div class="col-lg-8">

                        <table class="table table-bordered table-sm">
                            <tr>
                                <th>Item code</th>
                                <td><?= $row['pro_id'];?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?= $row['pro_name'];?></td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td><?= $row['cat_title'];?></td>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <td><?= $row['pro_price'];?></td>
                            </tr>
                            <tr>
                                <th>Discount</th>
                                <td><?= $row['pro_discount'];?></td>
                            </tr>
                            <tr>
                                <th>MRP</th>
                                <td><?= $row['pro_mrp'];?></td>
                            </tr>
                        </table>
                        <?php 
                    if(isset($_SESSION['user_login'])):
                    $log = $_SESSION['user_login'];
                    $get_user = mysqli_query($connect,"SELECT * FROM user where user_email='$log'");
                    $col = mysqli_fetch_array($get_user);
                    
                    ?>

                        <form method="post" class="form-inline mb-2">
                            <input type="text" name="pro_id" value="<?= $row['pro_id'];?>" hidden>
                            <input type="text" name="user_id" value="<?= $col['user_id'];?>" hidden>
                            <label for="" class="mr-1 font-weight-bold">Quantity: </label>
                            <input type="number" name="qty" value="1" class="form-control w-25">
                            <input type="submit" class="btn btn-success ml-2" name="order" value="Order Now">
                        </form>

                        <?php 
                    if(isset($_POST['order'])){
                        $pro_id = $_POST['pro_id'];
                        $user_id = $_POST['user_id'];
                        $qty = $_POST['qty'];
                        $query = mysqli_query($connect,"INSERT INTO orders (pro_id,qty,user_id,order_status) value ('$pro_id','$qty','$user_id','1')");
                        if($query):
                            send_sms($col['user_contact'],"Hi, ".$col['user_name'].", your order placed successfully product name: " . $row['pro_name'] . " Qty: " . $_POST['qty'] . " thanks ");
                            redirect('index');
                        else:
                            alert('fail');
                        endif;
                    }
                    
                   ?>

                        <?php else: ?>
                        <a href="login.php" class=" mb-3 btn btn-danger btn-lg">Login For Order</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-header bg-primary text-white">Description</div>
                    <div class="card-body">
                        <?= $row['pro_description'];?>
                    </div>
                </div>

                <h2 class="lead mt-3">Related Products</h2>
                <div class="row">
                    <?php 
                    $calling_product = mysqli_query($connect,"SELECT * FROM products where pro_id != '$item'");
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

                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("include/footer.php");?>
</body>

</html>
