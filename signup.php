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
    <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="lead">Login Here</h2>
                            <hr>
                            <form action="signup.php" method="post">
                                <div class="form-group">
                                    <label class="m-0 p-0">user_name</label>
                                    <input type="text" name="user_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_contact</label>
                                    <input type="text" name="user_contact" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_email</label>
                                    <input type="text" name="user_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_address</label>
                                    <input type="text" name="user_address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_pin</label>
                                    <input type="text" name="user_pin" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_city</label>
                                    <input type="text" name="user_city" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_state</label>
                                    <input type="text" name="user_state" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">user_password</label>
                                    <input type="password" name="user_password" class="form-control">
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
                                    <input type="submit" name="create" class="btn btn-primary btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
       </div>
        
    <?php include_once("include/footer.php");?>
</body>
</html>
<?php
if(isset($_POST['create'])):
    $user_name  = $_POST['user_name'];
    $user_contact  = $_POST['user_contact'];
    $user_email  = $_POST['user_email'];
    $user_address  = $_POST['user_address'];
    $user_pin  = $_POST['user_pin'];
    $user_city  = $_POST['user_city'];
    $user_state  = $_POST['user_state'];
    $user_password  = $_POST['user_password'];
    $user_gender  = $_POST['user_gender'];
    

$query = mysqli_query($connect,"INSERT INTO user (user_name,user_contact,user_email,user_address,user_pin,user_city,user_state,user_password,user_gender) value ('$user_name','$user_contact','$user_email','$user_address','$user_pin','$user_city','$user_state','$user_password','$user_gender')");

if($query){
    redirect('signup');
}
else{
    alert('not created');
}
endif;