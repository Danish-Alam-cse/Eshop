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
                 
                 <div class="card">
                     <div class="card-body">
                         <h2 class="lead">Insert Product here</h2>
                         <form action="product_insert.php" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label class="m-0 p-0 text-muted small">Name</label>
                                <input type="text" class="form-control" name="pro_name">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-0 text-muted small">brand</label>
                                <input type="text" class="form-control" name="pro_brand">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-0 text-muted small">price</label>
                                <input type="text" class="form-control" name="pro_price">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-0 text-muted small">discount</label>
                                <input type="text" class="form-control" name="pro_discount">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-0 text-muted small">mrp</label>
                                <input type="text" class="form-control" name="pro_mrp">
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-0 text-muted small">category</label>
                                <select class="form-control" name="pro_category">
                                    <?php 
                                    $calling_cat = mysqli_query($connect,"SELECT * FROM categories");
                                    while($cat = mysqli_fetch_array($calling_cat)):
                                    ?>
                                    <option value="<?= $cat['cat_id'];?>"><?= $cat['cat_title'];?></option>
                                    <?php endwhile;?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label class="m-0 p-0 text-muted small">image1</label>
                                    <input type="file" class="form-control" name="pro_image1">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="m-0 p-0 text-muted small">image2</label>
                                    <input type="file" class="form-control" name="pro_image2">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="m-0 p-0 text-muted small">image3</label>
                                    <input type="file" class="form-control" name="pro_image3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-0 text-muted small">description</label>
                                <textarea rows="5" class="form-control" name="pro_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="m-0 p-0 text-muted small">qty</label>
                                <input type="number" class="form-control" name="pro_qty">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block" name="send" value="Insert Products">
                            </div>
                         </form>
                     </div>
                 </div>
            
            </div>
        </div>
    </div>
    
    <?php
    if(isset($_POST['send'])):
        $pro_name = $_POST['pro_name'];
        $pro_brand = $_POST['pro_brand'];
        $pro_price = $_POST['pro_price'];
        $pro_mrp = $_POST['pro_mrp'];
        $pro_discount = $_POST['pro_discount'];
        $pro_category = $_POST['pro_category'];
        $pro_description = $_POST['pro_description'];
        $pro_qty = $_POST['pro_qty'];
        $pro_status = 1;
    
        //image work
        $pro_image1 = $_FILES['pro_image1']['name'];
        $pro_image2 = $_FILES['pro_image2']['name'];
        $pro_image3 = $_FILES['pro_image3']['name'];
    
        $tmp_image1 = $_FILES['pro_image1']['tmp_name'];
        $tmp_image2 = $_FILES['pro_image2']['tmp_name'];
        $tmp_image3 = $_FILES['pro_image3']['tmp_name'];
    
        move_uploaded_file($tmp_image1,"image/$pro_image1");    
        move_uploaded_file($tmp_image2,"image/$pro_image2");    
        move_uploaded_file($tmp_image3,"image/$pro_image3");    
    
    $query = mysqli_query($connect,"INSERT INTO products (pro_name,pro_brand,pro_price,pro_mrp,pro_discount,pro_category,pro_description,pro_status,pro_qty,pro_img1,pro_img2,pro_img3) value ('$pro_name','$pro_brand','$pro_price','$pro_mrp','$pro_discount','$pro_category','$pro_description','$pro_status','$pro_qty','$pro_image1','$pro_image2','$pro_image3')");
    
        if($query):
            echo "success";
        else:
            echo "Fail";
        endif;
    
    endif;
    ?>
    
    <?php include_once("include/admin_footer.php");?>
    
</body>
</html>