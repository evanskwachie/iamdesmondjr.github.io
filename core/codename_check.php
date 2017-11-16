<?php 
   require_once 'functions.php';
   $connected = connectDB();

   if (isset($_POST['codename'])) {
     $codename = htmlspecialchars($_POST['codename']);

     //checking if not empty && query return a number to check if nickname exist.
     if (!empty($codename)) {
     	    $select = "SELECT * FROM admin WHERE codename = '$codename'";
        	$username_query = mysqli_query($connected, $select);
            $username_result = mysqli_num_rows($username_query);

            if ($username_result > 0) {
            	echo "sorry someone has already taken that username";
            } else {
            	 //echo "Username available!";
            }
        	
        }else {
            
        	   }  	   
   }else {

   }

 $connected->close();

?>