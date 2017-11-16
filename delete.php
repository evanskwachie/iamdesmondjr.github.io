<?php 

require_once 'core/functions.php';

	$connected = connectDB();

	$_GET['item_id'];

	$item_id = $_GET['item_id'];

	$query = "DELETE FROM item WHERE item_id = {$item_id}";
    $result = $connected->query($query);

    if ($result) {
    	# code...
    	$_SESSION['success'] = true;
    	$_SESSION['successMessage'] = "Item deleted successfully";

    	redirect('administrator');
    }else {
    	$_SESSION['error'] = true;
    	$_SESSION['errorMessage'] = "Could not delete item";
    }
	

?>