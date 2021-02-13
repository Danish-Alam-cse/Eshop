<?php include_once("../include/config.php");?>
<?php
$pro_edit=$_GET['pro_edit'];
$call=mysqli_query($connect,"SELECT * from products WHERE pro_id='$pro_edit'");
$row=mysqli_fetch_array($call);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=SITE_NAME;?></title>
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
                <div class="card">
                    <div class="card-body">
                        <h2 class="lead">update Product here</h2>
                        <form action="products.php" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label class="m-0 p-o text-muted small">Name</label>
                                <input type="text" class="form-control" name="pro_name" value="<?php echo $row['pro_name'];?>">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-o text-muted small">brand</label>
                                <input type="text" class="form-control" name="pro_brand" value="<?php echo $row['pro_brand'];?>">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-o text-muted small">price</label>
                                <input type="text" class="form-control" name="pro_price" value="<?php echo $row['pro_price'];?>">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-o text-muted small">discount</label>
                                <input type="text" class="form-control" name="pro_discount" value="<?php echo $row['pro_discount'];?>">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-o text-muted small">mrp</label>
                                <input type="text" class="form-control" name="pro_mrp" value="<?php echo $row['pro_mrp'];?>">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-o text-muted small">category</label>
                                <select class="form-control" name="pro_category">
                                    <?php
                                    $calling_cat=mysqli_query($connect,"SELECT * FROM category");
                                    while($cat=mysqli_fetch_array($calling_cat)):
                                    ?>
                                    <option value="<?= $cat['cat_id'];?>"><?=$cat['cat_title'];?></option>
                                    
                                    <?php endwhile;?>
                                    
                                </select>
                                
                             </div>
                             <div class="row">
                             <div class="col-lg-4">
                             <div class="form-group">
                                <label class="m-0 p-o text-muted small">image1</label>
                                <input type="file" class="form-control" name="pro_img1">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-o text-muted small">image2</label>
                                <input type="file" class="form-control" name="pro_img2">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-o text-muted small">image3</label>
                                <input type="file" class="form-control" name="pro_img3">
                            </div>
                             </div>
                             </div>
                             
                              <div class="form-group">
                                <label class="m-0 p-o text-muted small">description</label>
                                  <textarea rows="5" class="form-control" name="pro_description" value="<?php echo $row['pro_description'];?>"></textarea>
                            </div>
                             <div class="form-group">
                                <label class="m-0 p-o text-muted small">qty</label>
                                <input type="number" class="form-control" name="pro_qty" value="<?php echo $row['pro_qty'];?>">
                            </div>
                            <div class="form-group">
                                 
                                <input type="submit" name="pro_update" class="btn btn-success btn-block" name="send">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
<?php
if(isset($_POST['pro_update'])){
        
 
    $pro_name=$_POST['pro_name'];
    $pro_brand=$_POST['pro_brand'];
    $pro_price=$_POST['pro_price'];
    $pro_discount=$_POST['pro_discount'];
    $pro_mrp=$_POST['pro_mrp'];
    $pro_category=$_POST['pro_category'];
    $pro_description=$_POST['pro_description'];
    $pro_qty=$_POST['pro_qty'];
    $pro_status=1;
    $pro_edit=$_GET['pro_edit'];
    
    
    //image work
    
    $pro_img1=$_FILES['pro_img1']['name'];
    $pro_img2=$_FILES['pro_img2']['name'];
    $pro_img3=$_FILES['pro_img3']['name'];
    
    $tmp_img1=$_FILES['pro_img1']['tmp_name'];
    $tmp_img2=$_FILES['pro_img2']['tmp_name'];
    $tmp_img3=$_FILES['pro_img3']['tmp_name'];
    
    move_uploaded_file($tmp_img1,"image/$pro_img1");
    move_uploaded_file($tmp_img2,"image/$pro_img2");
    move_uploaded_file($tmp_img3,"image/$pro_img3");
    
    $query=mysqli_query($connect,"UPDATE products SET pro_name='$pro_name',pro_brand='$pro_brand',pro_price='$pro_price',pro_discount='$pro_discount',pro_mrp='$pro_mrp',pro_category='$pro_category',pro_description='$pro_description',pro_qty='$pro_qty',pro_status='$pro_status',pro_img1='$pro_img1',pro_img2='$pro_img2,pro_img3='$pro_img3' WHERE pro_id='$pro_edit'");
    
    
}
    
    ?>
