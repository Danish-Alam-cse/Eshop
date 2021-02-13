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
                     <?php 
                    $log = $_SESSION['user_login'];
                    $calling_user = mysqli_query($connect,"SELECT  * FROM user where user_email='$log'");
                    $u = mysqli_fetch_array($calling_user);
                    ?>
                    <h3 class="lead float-left">Your Profile Details</h3>
                 
                    <a href="edit_profile.php" class="btn btn-success float-right ">Edit Your Profile</a>
                       <hr class="mt-5 mb-0 border border-secondary">
                     <table class="table mt-0">
                         <tr>
                             <th>Name</th>
                             <td><?= $u['user_name'];?></td>
                         </tr>
                         <tr>
                             <th>Contact</th>
                             <td><?= $u['user_contact'];?></td>
                         </tr>
                         <tr>
                             <th>Email</th>
                             <td><?= $u['user_email'];?></td>
                         </tr>
                         <tr>
                             <th>Address</th>
                             <td><?= $u['user_address'];?></td>
                         </tr>
                         <tr>
                             <th>City</th>
                             <td><?= $u['user_city'];?></td>
                         </tr>
                         <tr>
                             <th>State</th>
                             <td><?= $u['user_state'];?></td>
                         </tr>
                         <tr>
                             <th>Pin</th>
                             <td><?= $u['user_pin'];?></td>
                         </tr>
                         <tr>
                             <th>Gender</th>
                             <td><?= $u['user_gender'];?></td>
                         </tr>
                         <tr>
                             <th>Status</th>
                             <td><?= $u['user_status'];?></td>
                         </tr>
                     </table>
               
                 
              </div>
            </div>
        </div>
    
    
    
    
    <?php include "../include/footer.php";?>
</body>
</html>