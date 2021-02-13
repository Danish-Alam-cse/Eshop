
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
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <label class="m-0 p-0">email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login" class="btn btn-primary btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
       </div>
    
    
     <?php 
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $check = mysqli_query($connect,"SELECT * from user where user_email ='$email' AND user_password='$password'");
        
        $count = mysqli_num_rows($check);
        
        if($count > 0){
            $_SESSION['user_login'] = $email;
            redirect('user/index');
        }
        else{
            alert('username and password is incorrect please try again');
        }
    }
    
    
    ?>
    
    
    
    
    
    
    <?php include_once("include/footer.php");?>
</body>
</html>