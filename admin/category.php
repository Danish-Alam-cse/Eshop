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
                     <div class="col-lg-5">
                         <table class="table table-hover table-bordered">
                             <tr>
                                 <th>cat_id</th>
                                 <th>cat_title</th>
                                 <th>cat_description</th>
                                 <th>status</th>
                                 <th>action</th>
                             </tr>
                             
                             <?php 
                             $cat_calling = mysqli_query($connect,"select * from category");
                             while($row = mysqli_fetch_array($cat_calling)):
                             ?>
                             
                                 <tr>
                                     <td><?= $row['cat_id'];?></td>
                                     <td><?= $row['cat_title'];?></td>
                                     <td><?= $row['cat_description'];?></td>
                                     <td><?= $row['cat_status'];?></td>
                                     <td>
                                         <a href="category_delete.php?cat_del=<?= $row['cat_id'];?>" class="btn btn-danger btn-sm">x</a>
                                         <a href="" class="btn btn-info btn-sm">edit</a>
                                     </td>
                                 </tr>
                             <?php endwhile; ?>
                         </table>
                     </div>
                     
                     <div class="col-lg-4 ml-auto">
                         <div class="card">
                             <div class="card-body">
                                 <h2 class="lead">Insert Categories</h2>
                                 <form method="post">
                                     <div class="form-group">
                                         <label class="m-0 p-0 small text-muted">Cat title</label>
                                         <input type="text" name="cat_title" class="form-control">
                                     </div>
                                     <div class="form-group">
                                         <label class="m-0 p-0 small text-muted">Cat description</label>
                                         <textarea type="text" name="cat_description" class="form-control"></textarea>
                                     </div>
                                     <div class="form-group">
                                         <input type="submit" class="btn btn-success btn-block" name="send_cat">
                                     </div>
                                 </form>
                                 
                                 <?php 
                                 if(isset($_POST['send_cat'])){
                                   $cat_title  = $_POST['cat_title'];
                                   $cat_description  = $_POST['cat_description'];
                                   $cat_status  = 1;
                                $query = mysqli_query($connect,"insert into categories (cat_title,cat_description,cat_status) value ('$cat_title','$cat_description','$cat_status')");
                                     
                                     
                                    if($query){
                                        redirect('category');
                                    }
                                     else{
                                         alert("fail");
                                     }
                                 }
                                 ?>
                             </div>
                         </div>
                     </div>
                 </div> 
            
           </div>
        </div>
    </div>
    
    
    <?php include_once("include/admin_footer.php");
    
   
    
    
    ?>
</body>
</html>