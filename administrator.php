<?php
include 'includes/head.php';

require_once 'core/functions.php';

if (!isset($_SESSION['tny_admin'])) {
  # code...
  redirect('admin.php');
}

$connected = connectDB();

// adding items
   if (isset($_POST['item_btn'])) {
     # code...
    $item_name = check_data($_POST['item_name']);
     $item_price = check_data($_POST['item_price']);
     $item_desc = check_data($_POST['item_desc']);
     $item_cat = check_data($_POST['item_cat']);
      $item_status = check_data($_POST['item_status']);

      if ($item_name != "" && $item_price != "" && $item_desc != "" && $item_cat != "" && $item_status != "") {
        # code...
         $item_image = $_FILES['item_image']['name'];
        $item_image = md5($_FILES['item_image']['name']).time();


         if ($_FILES['item_image']['size'] < (1024*1024)) {
      # code...
      $pathto = "public/img/item_img/".$item_image;

    move_uploaded_file($_FILES['item_image']['tmp_name'], $pathto) or die("Could not copy file");

    $qry = "INSERT INTO item (item_name, item_price, item_desc, item_img, item_cat, item_status) VALUES ('{$item_name}', '{$item_price}', '{$item_desc}','{$item_image}', '{$item_cat}', '{$item_status}') ";
    $result = $connected->query($qry);

    if (!$result) {
      # code...
      echo "<script>alert('something went wrong')</script>";
    }else {
      #success message
      $_SESSION['success'] = true;
      $_SESSION['successMessage'] = "Item added successfully";
    }
    

}else {
    #error message
    $_SESSION['error'] = true;
    $_SESSION['errorMessage'] = "Image should be less than 1M";
  }
}

}

  //out of stock
  $id = $_GET['item_id']; 
   
   // echo $id;
   $out_query = "UPDATE item SET item_status = 0 WHERE item_id = {$id}";
   $out_query_result = $connected->query($out_query);

   if ($out_query_result) {
     # code...
    #success message
      $_SESSION['success'] = true;
      $_SESSION['successMessage'] = "Item updated successfully";
   }

   //editting updated
    $item_n = $_GET['item_name'];
   $item_p = $_GET['item_price'];
   $id  = $_GET['item_id'];
   $item_status = $_GET['item_status'];

   $edit_query = "UPDATE item SET item_name = '{$item_n}', item_price = {$item_p}, item_status = {$item_status} WHERE item_id = {$id}";

   $edit_query_result = $connected->query($edit_query);

   if ($edit_query_result) {
     # code...
    #success message
      $_SESSION['success'] = true;
      $_SESSION['successMessage'] = "Item details updated successfully";
   }else {
    // $_SESSION['error'] = true;
    //   $_SESSION['errorMessage'] = "something went wrong";
   }

     # code...
   if (isset($_POST['admin_btn'])) {
     # code...
    //adding admin
   if (!empty($_POST['codename']) && !empty($_POST['passcode'])) {
     # code...
      $codename = check_data($_POST['codename']);
      $passcode = check_data($_POST['passcode']);
      $confirm_passcode = check_data($_POST['confirm_passcode']);

      if ($passcode === $confirm_passcode) {
        # code...
        $passcode = hash_value('md5', $password, SECRET_KEY);

        $admin_query = add_admin($codename, $passcode);

        if ($admin_query) {
          # code...
          $_SESSION['success'] = true;
        $_SESSION['successMessage'] = "New administrator added successfully";
        }else {
           $_SESSION['error'] = true;
        $_SESSION['errorMessage'] = "Could not add administrator";
        }
      }else {
        $_SESSION['error'] = true;
        $_SESSION['errorMessage'] = "Passcodes do not match";
      }

   }

}
   
   




?>
  <body style="background-color: #f9f9f9;">
       <div class="row" style="color:#fff; background-color:#313b44; padding: 10px;">
       <div class="pull-right" style="margin-right: 16px;">
        <a href="#" data-toggle="modal" data-target=".add_item"><button class="btn btn-js"  data-toggle="tooltip" data-placement="bottom" title="Like us on facebook"><span class="glyphicon glyphicon-facebook"></span> Add items</button></a>
        <a href="#"><button class="btn btn-def" data-toggle="tooltip" data-placement="bottom" title="follow us on twitter"><span class="glyphicon glyphicon-facebook"></span> Add Ads</button></a>
        <a href="#" data-toggle="modal" data-target=".add_admin"><button class="btn btn-def" data-toggle="tooltip" data-placement="bottom" title="follow us on twitter"><span class="glyphicon glyphicon-facebook"></span> Add Admin</button></a>
        <a href="#"><button class="btn btn-htm" data-toggle="tooltip" data-placement="bottom" title="visit our main website"><span class="glyphicon glyphicon-facebook"></span> Welcome! <?php echo $_SESSION['tny_admin'] ?></button></a>
        <a href="#" data-toggle="modal" data-target=".logout"><button class="btn btn-css" data-toggle="tooltip" data-placement="bottom" title="Checkout our store"><span class="glyphicon glyphicon-facebook"></span>Logout</button></button></a>
      </div>
    </div>

    <!-- //register modal -->
<div class="modal fade w3-animate-opacity add_admin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
  <div style="background-color:#13c183;padding: 0.5px; color: #fff;">
    <h3 align="center"><span class="glyphicon glyphicon-log-in"></span> Sign admin up</h3>
  </div>
    <div style="background-color: #f9f9f9; padding: 16px;">
      <form class="form-group" action="administrator" method="POST">
        <label>Codename</label><br>
        <input type="text" name="codename" id="codename" class="form-control" maxlength="16" placeholder="Enter Codename" required>
        <span id="codename_status" style="color: red;"></span><br>
        <label>Passcode</label><br>
        <input type="password" name="passcode" id="passcode" class="form-control" placeholder="Enter Passcode" required><br>
        <label>Confirm Passcode</label><br>
        <input type="password" name="confirm_passcode" id="confirm_passcode" class="form-control" placeholder="Enter Confirm Passcode" required><br>
        <!-- <label>Email</label><br>
        <input type="email" name="" class="form-control" placeholder="me@example.com"><br>
        <label>Contact</label><br>
        <input type="number" name="" class="form-control" placeholder="+233xxxxxxxxx"><br>
 -->
        <button class="btn btn-block" name="admin_btn" style="background-color:#13c183;color: #fff;"> Sign up</button>
      </form>
    </div>
  </div>
</div>
<!-- //register modal -->
<div class="modal fade w3-animate-opacity logout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
  <div style="background-color:#13c183;padding: 0.5px; color: #fff;">
    <h3 align="center"><span class="glyphicon glyphicon-log-out"></span> Log me out</h3>
  </div>
    <div style="background-color: #f9f9f9; padding: 16px;">
    <h5>Are you sure you want to logout?</h5>
      <button type="button" class="btn btn-default w3-btn" data-dismiss="modal" style="background-color:#ff0000; color:#fff;"><span class="glyphicon glyphicon-remove">Cancel</span></button>
        <a href="logout.php" type="button" class="btn w3-btn" style="background-color:#13c183;"><span class="glyphicon glyphicon-ok">Yes</span></a>
      </form>
    </div>
  </div>
</div>
 <!-- //logout -->
  <div class="modal fade logout1" role="dialog" aria-labelledby="gridSystemModalLabel" style="color:#00A63F;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Thanks for the visit, <?php echo $_SESSION['tny_admin'] ?></h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">     
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- //add items modal -->
      <div class="modal fade w3-animate-opacity add_item" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
        <div style="background-color:#13c183;padding: 0.5px; color: #fff;">
          <h3 align="center"><span class="glyphicon glyphicon-exclamation-sign"></span> Add Item</h3>
        </div>
          <div style="background-color: #f9f9f9; padding: 16px;">
            <form class="form-group" action="administrator" method="POST" enctype="multipart/form-data">
              <label>Item name</label>
              <input type="text" name="item_name" class="form-control" required>
              <label>Price Gh₵</label>
              <input type="number" name="item_price" class="form-control" min="0" step="any" required>
              <label>Item describtion</label>
              <textarea type="text" class="form-control" name="item_desc" required></textarea>
              <label>Item image</label>
             <a href="#" class="thumbnail hidden-xs" style="background:transparent;border:none;">
              <img  src="" id="item_image" alt="item image" class="img img-responsive">
            </a>
            <input type='file' id="image" name="item_image" style="color:#00A63F; font-family:Comic sans MS;" class="form-control w3-border w3-padding" required><br>
            <label>Item category</label>
            <select class="form-control" name="item_cat" required>
              <option value="1">Shirts</option>
              <option value="2">Jeans</option>
              <option value="3">Footwear</option>
              <option value="4">Headset</option>
              <option value="5">Bags</option>  
            </select><br>
            <select class="form-control" name="item_status" >
              <option value="1">In stock</option>
              <option value="0">Out of stock</option>
            </select><br>
            <button class="btn btn-htm btn-block" name="item_btn">Submit</button>
            </form>
          </div>
        </div>
      </div>
    <ol class="breadcrumb">
    <li class="active">Items</li>
    <li><a href="#">Courses</a></li>
    <li><a href="#">Ads</a></li>
  </ol>

  <div class="row">
        <div class="row hidden-xs">
          <?php if($_SESSION['error'] === true){ ?>
          <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">
              <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $_SESSION['errorMessage'] ?>
              </div>
          </div>
          <?php }elseif (!empty($_SESSION['success'])) { ?>
          <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">
              <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $_SESSION['successMessage'] ?>
              </div>
          </div>
          <?php } ?>
        </div>
        </div> 
  <!-- // items display -->
<section class="container">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <form class="form-group has-feedback">
        <input type="text" name="" class="form-control" placeholder="Search items" style="border: 1px solid #13c183; text-align: center;">
        <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
      </form>
    </div>
  </div><br>

  <div class="container">
   <div id="item_output"></div>
  <button class="btn btn-htm btn-block loadmore">LOAD MORE!</button>
</section><br><br>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo BASE_URL_STYLE ?>js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo BASE_URL_STYLE ?>js/bootstrap.min.js"></script>
    <script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#item_image').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#image").change(function(){
        readURL(this);
    }); 

     function fetch_data(){
          //goto slest.php to get data
          $.ajax({
            url:"includes/all-items",
            method:"POST",
            success:function(data){
              $('#item_output').html(data);
            }
          });
        }

        fetch_data();


   $(function(){
          $('.loadmore').click(function(){
            var val = $('.final').attr('val');
            
            $.post('includes/all-items', {'from':val}, function(data){
              if (!isFinite(data)) {

             $('.final').remove();
              $(data).insertBefore('.loadmore');
                }else {
                  $('.loadmore').remove();
                
                }
               });
          });
       });

   //checking if nickname is taken
    $('#codename').keyup(function(){
       var codename = $(this).val();
       
       $('#codename_status').text('checking if it exist...');

       if (codename != '') {
         
         //return data(nickname) to the variable nickname.  create a call back function
        $.post('core/codename_check', {codename: codename}, function(data){
          $('#codename_status').text(data);

        });
       }else {
        $('#codename_status').text('');
       }
    });
     //end checking

     //confirm password
     var password = document.getElementById("passcode");
   var confirm_password = document.getElementById("confirm_passcode");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;


    </script>
  </body>
</html>