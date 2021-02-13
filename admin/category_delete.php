<?php 

include "../include/config.php";

 if(isset($_GET['cat_del'])){
        $cat_del = $_GET['cat_del'];
        
        $query = mysqli_query($connect,"delete from categories where cat_id = '$cat_del'");
        
        if(query){
            redirect('category');
        }
        else{
            alert("sorry hum bach gaye");
        }
        
    }

?>