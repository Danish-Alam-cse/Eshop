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
                   <div class="jumbotron">
                       <h2 class="display-4">Welcome, Guest</h2>
                       <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque laborum ipsa eligendi saepe natus ex, possimus expedita beatae quia animi porro. Ad commodi iure obcaecati dicta a, pariatur fugit. Repellat?</p>
                       <a href="../index.php" class="btn btn-primary">Start Shopping</a>
                       <a href="my_order.php" class="btn btn-danger">Track Our Order</a>
                   </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h2>Manage Order</h2>
                                    <a href="" class="btn btn-danger">My Order</a>
                                    <a href="" class="btn btn-info">New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    
    
    <?php include "../include/footer.php";?>
</body>
</html>