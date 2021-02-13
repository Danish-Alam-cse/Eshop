<?php 

include "../include/config.php";

 if(isset($_GET['pro_del'])){
        $cat_del = $_GET['pro_del'];
        
        $query = mysqli_query($connect,"delete from products where pro_id = '$cat_del'");
        
        if(query){
            redirect('products');
        }
        else{
            alert("sorry hum bach gaye");
        }
        
    }

?>