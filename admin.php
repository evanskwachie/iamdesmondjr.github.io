<?php
include 'includes/head.php';

require_once 'core/functions.php';

if (isset($_SESSION['tny_admin'])) {
  # code...
  redirect('administrator');
}

$connected = connectDB();

if (!empty($_POST['codename']) && !empty($_POST['passcode'])) {
  # code...
   $codename = check_data($_POST['codename']);
   $passcode = check_data($_POST['passcode']);

   //hash password
   $passcode = hash_value('md5', $password, SECRET_KEY);

    $admin_log = login_admin($codename, $passcode);
    if (!$admin_log) {
      # code...
      $_SESSION['error'] = true;
        $_SESSION['errorMessage'] = "Wrong Codename or Passcode";
    }
}

?>
  <body style="background-color: #222;">
        <div class="row" style="margin-top: 150px;">
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
       <form class="form-group col-md-offset-4 col-md-4" action="admin" method="POST">
        <div style="background-color:#13c183; color:#fff; padding: 5px;">
          <h3 align="center" style="font-weight: bold;"><span class="glyphicon glyphicon-log-in"></span> Login as Admin</h3>
        </div>
        <div style="background-color:#fff; color: #000;padding: 16px; border:1px solid #13c183;">
          <label>Codename</label><br>
          <input type="text" name="codename" class="form-control" style="border:1px solid #13c183;" required><br><br>
          <label>Passcode</label><br>
          <input type="password" name="passcode" class="form-control" style="border:1px solid #13c183;" required><br><br>
          <button class="btn btn-block" style="background-color: #13c183;color: #fff;">Sign me in</button>
        </div>
        <a href="index">Click here to go back to homepage if you are here by mistake</a>
       </form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo BASE_URL_STYLE ?>js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo BASE_URL_STYLE ?>js/bootstrap.min.js"></script>
  </body>
</html>