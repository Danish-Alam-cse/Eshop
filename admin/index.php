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
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card border border-primary">
                            <div class="card-body">
                                <h2><?php echo $count = mysqli_num_rows(mysqli_query($connect,"select * from products"));?></h2>
                            </div>
                            <div class="card-footer bg-primary text-white">
                                Total Products
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-3">
                        <div class="card border border-success">
                            <div class="card-body">
                                <h2><?php echo $count = mysqli_num_rows(mysqli_query($connect,"select * from orders"));?></h2>
                            </div>
                            <div class="card-footer bg-success text-white">
                                Total Orders
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-3">
                        <div class="card border border-danger">
                            <div class="card-body">
                                <h2><?php echo $count = mysqli_num_rows(mysqli_query($connect,"select * from user"));?></h2>
                            </div>
                            <div class="card-footer bg-danger text-white">
                                Total Users
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-3">
                        <div class="card border border-dark">
                            <div class="card-body">
                                <h2><?php echo $count = mysqli_num_rows(mysqli_query($connect,"select * from category"));?></h2>
                            </div>
                            <div class="card-footer bg-dark text-white">
                                Total Categories
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    <?php include_once("include/admin_footer.php");?>
</body>
</html>