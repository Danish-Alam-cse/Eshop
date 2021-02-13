<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
       <a href="index.php" class="navbar-brand"><?= SITE_NAME; ?></a>
       
       
       
       
       <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#rock">
           <span class="navbar-toggler-icon"></span>
       </button>
       
       
       
       <div id="rock" class="collapse navbar-collapse">
          
          <form action="index.php" method="get" class="form-inline mx-auto">
              <input type="search" name="search" class="form-control form-control-sm" size="70" placeholder="Search here (e.g lava, Apple, funiture etc) ">
              <input type="submit" name="find" class="btn btn-dark btn-sm">
          </form>
          
          
           <ul class="navbar-nav ml-auto">
               <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
               <?php if(isset($_SESSION['user_login'])):
                $log = $_SESSION['user_login'];
                    $calling_user = mysqli_query($connect,"SELECT  * FROM user where user_email='$log'");
                    $u = mysqli_fetch_array($calling_user);
               
               ?>
                   <li class="nav-item"><a href="user/index.php" class="nav-link">hi, <?= $u['user_name'];?></a></li>
                   <li class="nav-item"><a href="logout.php" class="btn btn-danger btn-sm mt-1">Logout</a></li>
               <?php else: ?>
                    <li class="nav-item"><a href="login.php" class="nav-link">Sign In</a></li>
                   <li class="nav-item"><a href="signup.php" class="nav-link">Sign Up</a></li>
               <?php endif; ?>
           </ul>
       </div>
       
       
   </nav>