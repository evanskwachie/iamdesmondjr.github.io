<?php
  /**
   *@author      Evans Kwachie <ekwachie@gmail.com>
   *@copyright   Copyright (C),1st March 2017.MasterMind Ghana Inc.
   *@license     MIT LICENSE (https://opensource.org/licenses/MIT)
   *             Refer to the LICENSE file distributed within the package.


  */
  require_once 'core/functions.php';

  include 'includes/head.php';

  $connected = connectDB();

  $img = $_GET['img'];
  $price = $_GET['price'];

  $_SESSION['store'] = true;
  $_SESSION['storeMessage'] = "{$img}";

    # check if input fields are not empty
    if (!empty($_GET['firstname']) && !empty($_GET['surname']) && !empty($_GET['contact'])) {
      # code...
      $firstname = check_data($_GET['firstname']);
    $surname = check_data($_GET['surname']);
    $contact = check_data($_GET['contact']);
    $price = $_GET['price'];
    $qty = $_GET['qty'];
    $diaspora = check_data($_GET['diaspora']);
    $hall = check_data($_GET['hall']);
    $room_number = check_data($_GET['room_number']);
    $img = $_GET['img'];

    $order_query = "INSERT INTO orders (firstname, surname, contact, price, qty, diaspora, hall, room_number, img) VALUES ('{$firstname}', '{$surname}', {$contact}, {$price}, {$qty}, '{$diaspora}', '{$hall}', '{$room_number}', '{$img}')";

    $order_query_result = $connected->query($order_query);

    if ($order_query_result) {
      # code...
      $_SESSION['success'] = true;
      $_SESSION['successMessage'] = "Thank you for shopping with us...We love you";
    }else {
      $_SESSION['error'] = true;
      $_SESSION['errorMessage'] = "Something went wrong";
    }

  }else{
      $_SESSION['error'] = true;
      $_SESSION['errorMessage'] = "All input";
    }
    

    

?>
  <body style="background-color: #f9f9f9;">
       
    <div class="row" style="color:#fff; background-color:#313b44; padding: 10px;">
      <div class="pull-right" style="margin-right: 16px;">
       <a href="https://facebook.com/mastermindghana" target="_blank"><button class="btn btn-js"  data-toggle="tooltip" data-placement="bottom" title="Like us on facebook"><span class="glyphicon glyphicon-facebook"></span> Facebook</button></a>
        <a href="https://twitter.com/MasterMindGhana" target="_blank"><button class="btn btn-def" data-toggle="tooltip" data-placement="bottom" title="follow us on twitter"><span class="glyphicon glyphicon-facebook"></span> twitter</button></a>
        <a href="http://mastermindghana.com"><button class="btn btn-htm" data-toggle="tooltip" data-placement="bottom" title="visit our main website"><span class="glyphicon glyphicon-facebook"></span> MasterMind Ghana Inc.</button></a>
         <a href="swags"><button class="btn btn-css" data-toggle="tooltip" data-placement="bottom" title="Checkout our store"><span class="glyphicon glyphicon-facebook"></span> Swags on sale</button></button></a>

      </div>
    </div>

    <!-- navbar -->
    <nav class="navbar navbar tny-navbar">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only" style="background-color: #13c183;">Toggle navigation</span>
        <span class="icon-bar" style="background-color: #13c183;"></span>
        <span class="icon-bar" style="background-color: #13c183;"></span>
        <span class="icon-bar" style="background-color: #13c183;"></span>
      </button>
      <a class="navbar-brand" href="index" style="color: #13c183;" data-toggle="tooltip" data-placement="bottom" title="Go to homepage"> <img alt="Brand" src="public/img/tny.png" class="img img-responsive" style="width: 80px; margin-top: -10px;"></a>
    </div>
      
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse  pull-right" id="bs-example-navbar-collapse-1">
      <!-- <div class="navbar-form navbar-left" role="sign-in">
        <button type="submit" class="btn btn-def" data-toggle="modal" data-target=".login">Sign me in</button>
      </div> -->
      <ul class="nav navbar-nav navbar-right">
        <!-- <div class="navbar-form navbar-left" role="sign-in">
        <button type="submit" class="btn btn-def" data-toggle="modal" data-target=".register">Sign me up</button>
      </div>
      <li><a href="#">Not Signed in</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View items by category<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">T-shirts</a></li>
            <li><a href="#">Jeans</a></li>
            <li><a href="#">Sneakers / foot wears</a></li>
             <li><a href="#">Headset / Earbug</a></li>
              <li><a href="#">Bags</a></li>
            <li role="separator" class="divider"></li>
            <!-- <li><a href="#">Log me out</a></li> -->
               <li><a href="#">All items</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- // placing orders -->
<section class="container">
<div class="row">
        <div class="row hidden-xs">
          <?php if($_SESSION['success'] === true){ ?>
          <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">
              <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $_SESSION['successMessage'] ?>
                  <a href="swags">Click here to continue shopping</a>
              </div>
          </div>
          <?php die()?>
          <? }elseif ($_SESSION['error'] === true) {?>
            <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">
              <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $_SESSION['errorMessage'] ?>
              </div>
          </div>
          <?php }  ?>
        </div>
        </div> 
  <div class="col-md-9">
  <div style="background-color:#13c183;padding: 5px;">
    <h4 align="center" style="color: #fff;">Thanks for shopping with us ! <span class="glyphicon glyphicon-shopping-cart"></span></h4>
  </div><br>
  <form class="form-group" action="order" method="GET">
  <div class="col-md-4">
    <div class="thumbnail" style="border: 2px solid  #f4b902;">
    <img src="<?php echo $img?>" class="img img-responsive">
     <h3 align="center" style="color: #de499d;">GH₵ <?php echo $price?></h3>
     <summary align="center" style="color: #13c183;">+1 GH₵ on Delivery <span class="glyphicon glyphicon-shopping-cart"></span></summary>
     <h3 align="center" style="color: #de499d;">Total = GH₵ <?php echo $price + 1?></h3>
   <br>
    </div>
    </div>
    <div class="col-md-8">
    <label class="hidden">Item</label>
    <input type="text" name="img" class="form-control hidden" readonly value="<?php echo $img ?>">
    <label class="hidden">Price GH₵</label>
    <input type="number" name="price" class="form-control hidden" readonly value="<?php echo $price + 1?>">
      <label>Firstname</label><br>
      <input type="text" name="firstname" class="form-control" placeholder="enter firstname" style="border: 1px solid  #13c183;" required><br>
       <label>Surname</label><br>
      <input type="text" name="surname" class="form-control" placeholder="enter surname" style="border: 1px solid  #13c183;" required><br>
       <label>Contact</label><br>
      <input type="number" name="contact" class="form-control" min="0" maxlength="13" placeholder="+233xxxxxxxxx" style="border: 1px solid  #13c183;" required><br>
         <label>Quantity</label><br>
      <input type="number" name="qty" min="1" max="100" class="form-control" placeholder="enter the quantity" style="border: 1px solid  #13c183;" required><br>
       <label>Diaspora</label>
       <p style="color: red;">Leave empty if you are in a hall, superannuation or src hostel</p>
      <textarea type="text" name="diaspora" class="form-control" placeholder="enter Location, hostel name, homestel, room number if any" style="border: 1px solid  #13c183;"></textarea><br>
       <label>Hall / Hostel </label><br>
        <select class="form-control" name="hall" style="border: 1px solid  #13c183;">
          <option value="none">Select hall / hostel</option>
          <option value="oguaa">Oguaa</option>
          <option value="adehye">Adehye</option>
          <option value="atl">ATL</option>
          <option value="casford">Casford</option>
          <option value="valco">Valco</option>
          <option value="knh">KNH</option>
          <option value="superannuation">Superannuation</option>
          <option value="src">SRC</option>
        </select><br>
         <label>Room number</label>
        <p style="color: red;">Leave empty if your room is not number</p>
      <input type="text" name="room_number" class="form-control" placeholder="enter room number" style="border: 1px solid  #13c183;"><br>
      <button type="submit" name="oder_btn" class="btn btn-htm col-md-offset-3 col-md-6">SUBMIT ORDER NOW!</button>
      </div>
    </form>
  </div>

  <!-- //ads section -->
  <div class="col-md-3">
    <div class="thumbnail">
      <h3>Place Ads here</h3>
      <summary>Do you want to advertise your products or events here? Please contact developers @ +233553535490</summary>
    </div>
    <div class="thumbnail">
      <h3>Place Ads here</h3>
       <summary>Do you want to advertise your products or events here? Please contact developers @ +233553535490</summary>
    </div>
    <div class="thumbnail">
      <h3>Place Ads here</h3>
       <summary>Do you want to advertise your products or events here? Please contact developers @ +233553535490</summary>
    </div>

  </div>

</section><br><br>
<!-- //footer -->
<footer class="row" style="background-color: #313b44;height: 150px;">
  <div class="col-md-4 col-xs-4">
  <h5 align="center" style="color: #13c183;">Our Sponsors</h5>
  <div align="center">
    <hr width="10%">
  </div>
  
  <div align="center" style="list-style: none; color: #fff;">
    <li>UniBank</li>
    <li>MTN Ghana</li>
    <li>WAEC Ghana</li>
    <li>UniLever Ghana</li>
  </div>
  
    
  </div>
  <div class="col-md-4 col-xs-4">
  <h5 align="center" style="color: #13c183;">Our Contacts</h5>
    <div align="center">
    <hr width="10%">
    <div align="center" style="list-style: none; color: #fff;">
    <li>+233553535490</li>
    <li>+233543292714</li>
    <li>+233244583655</li>
    <!-- <li>UniLever Ghana</li> -->
  </div>
  </div>
  </div>
  <div class="col-md-4 col-xs-4">
    <h6 align="center" style="color: #fff;">Copyright &copy; 2017. All rights reserved except where noted. A product of <a href="#" style="color: #13c183;">MasterMind Ghana Inc.</a></h6> 
  </div>
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="public/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });
    </script>
  </body>
</html>