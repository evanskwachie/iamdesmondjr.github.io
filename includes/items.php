<?php 
@session_start();

class Items{
	public function qry($from, $to){
		require_once '../core/functions.php';
		$connected = connectDB();

		$query = "SELECT * FROM item WHERE item_id > $from AND item_id < $to AND item_status = 1";

		$result = $connected->query($query);
		$count = mysqli_num_rows($result);
		$data = '';

		if ($count > 0) {
			# code...

			while ($item_row = mysqli_fetch_assoc($result)) {
				# code...
				 $item_id = $item_row['item_id'];
		          $item_name =  $item_row['item_name'];
		          $item_price = $item_row['item_price'];
		          $item_desc = $item_row['item_desc'];
		          $item_image = BASE_URL_ITEM_IMG.$item_row['item_img'];
		          
		          if ($item_id % 2 == 0) {
		            # code...
		            $color = '#13c183';
		            $css = 'btn-htm';
		          }else {
		            $color = '#f4b902';
		            $css = 'btn-js';
		          }
		

		$data .='
			
			<div class="col-md-4 col-sm-6" style="margin-bottom: 20px;">
    <div class="thumbnail" style="border: 2px solid '.$color.' ;">
     <a href="" data-toggle="modal" data-target=".register'.$item_id.'" class="pull-right"><span data-toggle="tooltip" data-placement="bottom" title="View describtion" class="glyphicon glyphicon-exclamation-sign" style="font-size: 30px; color: #56a2f3;"></span></a>

    <img src="'.$item_image.'" class="img img-responsive">
     <h3 align="center" style="color: #de499d;">Gh₵ '.$item_price.'</h3>
   <!--  <summary><span style="font-weight: bold;">Description: </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</summary><br> -->
      <a href="order?img='.$item_image.'&&price='.$item_price.'"><button class="btn '.$css.' col-md-offset-3 col-md-6">PLACE ORDER NOW!</button></a>
    </div>

      <!-- //describtion modal -->
      <div class="modal fade w3-animate-opacity register'.$item_id.'" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
        <div style="background-color:#13c183;padding: 0.5px; color: #fff;">
          <h3 align="center"><span class="glyphicon glyphicon-exclamation-sign"></span> Item describtion</h3>
        </div>
          <div style="background-color: #f9f9f9; padding: 16px;">
            <summary><span style="font-weight: bold;">Item name: </span>'.$item_name.'</summary><br>
            <summary><span style="font-weight: bold;">Description: </span>'.$item_desc.'</summary><br>
          </div>
        </div>
      </div>

    </div>

		';
	}

	$data .='
		<div class="final" val="'.$item_id.'"></div><br>
	';
	return $data;
		}else {
			 echo "0";
		}
	}
    

	public function main(){
    if (isset($_POST['from'])) {
      # code...
      $from = $_POST['from'];
      $to = $from + 13;
      $data = $this->qry($from,$to);
       return $data;
    }else {
      $data = $this->qry(0,13);
      return $data;
    }
    
  }

}
// require_once '../core/functions.php';

// 	$default_from = ' ';

// 	$connected = connectDB();
//     $item_select = 'SELECT * FROM item';
//     $item_select_result = $connected->query($item_select);

//     $me = mysqli_num_rows($item_select_result);

//     while ($row = mysqli_fetch_array($item_select_result)) {
//     	# code...
//     	$id = $row['item_id'] - $me;
//     }

//     echo $id;
//     die();

	$obj = new Items();
  $data = $obj->main();
  echo $data;


 ?>
