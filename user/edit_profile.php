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
                    
                     <form action="edit_profile.php" method="post">
                                <div class="form-group">
                                    <label class="m-0 p-0">user_name</label>
                                    <input type="text" name="user_name" class="form-control" value="<?= $u['user_name'];?>">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_contact</label>
                                    <input type="text" name="user_contact" class="form-control" value="<?= $u['user_contact'];?>">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_email</label>
                                    <input type="text" name="user_email" class="form-control" value="<?= $u['user_email'];?>">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_address</label>
                                    <input type="text" name="user_address" class="form-control" value="<?= $u['user_address'];?>">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_pin</label>
                                    <input type="text" name="user_pin" class="form-control" value="<?= $u['user_pin'];?>">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_city</label>
                                    <input type="text" name="user_city" class="form-control" value="<?= $u['user_city'];?>">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_state</label>
                                    <input type="text" name="user_state" class="form-control" value="<?= $u['user_state'];?>">
                                </div>
                               
                                <div class="form-group">
                                    <label class="m-0 p-0">user_gender</label>
                                    <select name="user_gender" class="form-control">
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="O">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update" class="btn btn-primary btn-block">
                                </div>
                            </form>
                
            </div>
        </div>
    </div>
    
    <?php 
    if(isset($_POST['update'])){
         $user_name  = $_POST['user_name'];
    $user_contact  = $_POST['user_contact'];
    $user_email  = $_POST['user_email'];
    $user_address  = $_POST['user_address'];
    $user_pin  = $_POST['user_pin'];
    $user_city  = $_POST['user_city'];
    $user_state  = $_POST['user_state'];
    $user_gender  = $_POST['user_gender'];
    
$query = mysqli_query($connect,"update user set user_name='$user_name',user_contact='$user_contact',user_email='$user_email',user_address='$user_address',user_pin='$user_pin',user_city='$user_city',user_state='$user_state',user_gender='$user_gender' where user_email ='".$_SESSION['user_login']."'");
        if($query){
    redirect('profile');
}
else{
    alert('not created');
}
    
    }
    ?>
    
    
    <?php include "../include/footer.php";?>
</body>
</html>