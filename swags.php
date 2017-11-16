<?php
  /**
   *@author      Evans Kwachie <ekwachie@gmail.com>
   *@copyright   Copyright (C),1st March 2017.MasterMind Ghana Inc.
   *@license     MIT LICENSE (https://opensource.org/licenses/MIT)
   *             Refer to the LICENSE file distributed within the package.


  */
  include 'includes/head.php';
?>
  <body style="background-color: #f9f9f9;">
       
    <div class="row" style="color:#fff; background-color:#313b44; padding: 10px;">
      <div class="pull-right" style="margin-right: 16px;">
       <a href="https://facebook.com/mastermindghana" target="_blank"><button class="btn btn-js"  data-toggle="tooltip" data-placement="bottom" title="Like us on facebook"><span class="glyphicon glyphicon-facebook"></span> Facebook</button></a>
        <a href="https://twitter.com/MasterMindGhana" target="_blank"><button class="btn btn-def" data-toggle="tooltip" data-placement="bottom" title="follow us on twitter"><span class="glyphicon glyphicon-facebook"></span> twitter</button></a>
        <a href="http://mastermindghana.com"><button class="btn btn-htm" data-toggle="tooltip" data-placement="bottom" title="visit our main website"><span class="glyphicon glyphicon-facebook"></span> MasterMind Ghana Inc.</button></a>
        <a href="index"><button class="btn btn-css" data-toggle="tooltip" data-placement="bottom" title="Checkout our programming hub"><span class="glyphicon glyphicon-facebook"></span> Tech Needs You</button></button></a>

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
  </div><br>
  <button class="btn btn-htm btn-block loadmore" id="myButton" data-loading-text="Loading...">LOAD MORE!</button>
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

       function fetch_data(){
          //goto slest.php to get data
          $.ajax({
            url:"includes/items",
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
            
            $.post('includes/items', {'from':val}, function(data){
              if (!isFinite(data)) {

             $('.final').remove();
              $(data).insertBefore('.loadmore');
                }else {
                  $('.loadmore').remove();
                
                }
               });
          });
       });

   $('#myButton').on('click', function () {
    var $btn = $(this).button('loading')
    // business logic...
    $btn.button('reset')
  })
    </script>
  </body>
</html>