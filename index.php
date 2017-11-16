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
       <div class="pull-right" style="margin-right: 16px;height: 30px;">
        <a href="#!"><button class="btn btn-js"  data-toggle="tooltip" data-placement="bottom" title="Like us on facebook"><span class="glyphicon glyphicon-facebook"></span> Facebook</button></a>
        <a href="#!"><button class="btn btn-def" data-toggle="tooltip" data-placement="bottom" title="follow us on twitter"><span class="glyphicon glyphicon-facebook"></span> twitter</button></a>
        <!-- <a href="http://mastermindghana.com"><button class="btn btn-htm" data-toggle="tooltip" data-placement="bottom" title="visit our main website"><span class="glyphicon glyphicon-facebook"></span> MasterMind Ghana Inc.</button></a>
        <a href="swags.php"><button class="btn btn-css" data-toggle="tooltip" data-placement="bottom" title="Checkout our store"><span class="glyphicon glyphicon-facebook"></span> Swags on sale</button></button></a> -->

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
      <a class="navbar-brand" href="index" style="color: #13c183;"> <img alt="Brand" src="public/img/tny.png" class="img img-responsive" style="width: 80px; margin-top: -10px;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse  pull-right" id="bs-example-navbar-collapse-1">
      <div class="navbar-form navbar-left" role="sign-in">
        <button type="submit" class="btn btn-def" data-toggle="modal" data-target=".login">Sign me in</button>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <div class="navbar-form navbar-left" role="sign-in">
        <button type="submit" class="btn btn-def" data-toggle="modal" data-target=".register">Sign me up</button>
      </div>
      <li><a href="#">Not Signed in</a></li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Signed in as Mark Otto <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Log me out</a></li>
          </ul>
        </li> -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- //login modal -->
<div class="modal fade w3-animate-top login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
  <div style="background-color:#13c183;padding: 0.5px; color: #fff;">
    <h3 align="center"><span class="glyphicon glyphicon-log-in"></span> Sign me in</h3>
  </div>
    <div style="background-color: #f9f9f9; padding: 16px;">
      <form class="form-group">
        <label>Codename</label><br>
        <input type="text" name="" class="form-control" placeholder="Enter Codename" required><br>
        <label>Passcode</label><br>
        <input type="password" name="" class="form-control" placeholder="Enter Passcode" required><br>
        <!-- <h5>Don't have an account. <span class="glyphicon glyphicon-user"></span><a href="" data-toggle="modal" data-target=".login"> Register</a></h5> -->
        <button class="btn btn-block" style="background-color:#13c183;color: #fff;"> Sign me in</button>
      </form>
    </div>
  </div>
</div>

<!-- //register modal -->
<div class="modal fade w3-animate-top register" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
  <div style="background-color:#13c183;padding: 0.5px; color: #fff;">
    <h3 align="center"><span class="glyphicon glyphicon-log-in"></span> Sign me up</h3>
  </div>
    <div style="background-color: #f9f9f9; padding: 16px;">
      <form class="form-group">
        <label>Codename</label><br>
        <input type="text" name="" class="form-control" maxlength="16" placeholder="Enter Codename" required><br>
        <label>Passcode</label><br>
        <input type="password" name="" class="form-control" placeholder="Enter Passcode" required><br>
        <label>Confirm Passcode</label><br>
        <input type="password" name="" class="form-control" placeholder="Enter Confirm Passcode" required><br>
        <label>Email</label><br>
        <input type="email" name="" class="form-control" placeholder="me@example.com"><br>
        <label>Contact</label><br>
        <input type="number" name="" class="form-control" placeholder="+233xxxxxxxxx"><br>

        <button class="btn btn-block" style="background-color:#13c183;color: #fff;"> Sign me up</button>
      </form>
    </div>
  </div>
</div>
<!-- //welcome row -->
<div class="row" style="background-color: #f9f9f9;">
  <h3 align="center" class="col-xs-offset-1 col-xs-10 w3-animate-right" style="color: #313b44;">WELCOME TO TECH CodeIT </h3>
  <summary  align="center" style="color: #f4b902; text-align: center;" class="col-xs-offset-1 col-xs-10 w3-animate-opacity">...the wiZards of 2morrow</summary>
  <img src="<?php echo BASE_URL_IMG ?>peeps.png" class="img img-responsive col-md-offset-2 col-md-8">
</div><br><br>

<!-- //courses -->
<div class="container"">
  <div class="col-md-4 col-sm-6">
   <div class="thumbnail" style="border: 2px solid #13c183;">
    <img src="<?php echo BASE_URL_IMG ?>html.png" alt="html" class="img img-responsive" style="width: 100px; height: 100px;">
    <h3 align="center" style="color: #13c183;">HTML5</h3>
    <summary>HTML5 is one of the most integral and evolving web technologies that enables a user to structure content and present it on the web. Learn How You Can Create Awesome Websites Using HTML5. Sign Up Now!</summary><br>
    <button class="btn btn-htm col-md-offset-3 col-md-6">TAKE COURSE</button>
  </div>
  </div>
  <div class="col-md-4 col-sm-6">
   <div class="thumbnail" style="border: 2px solid red;">
    <img src="<?php echo BASE_URL_IMG ?>css.png" alt="css" class="img img-responsive" style="width: 100px; height: 100px;">
     <h3 align="center" style="color: red;">CSS3</h3>
    <summary>CSS3 is the latest evolution of Cascading Stylesheets Language. It brings a lot long-awaited novelties like rounded corners, gradients, transitions or animations. Learn How You Can Style Awesome Websites Using CSS3.</summary><br>
    <button class="btn btn-css col-md-offset-3 col-md-6">TAKE COURSE</button>
  </div>
  </div>
  <div class="col-md-4 col-sm-6">
   <div class="thumbnail" style="border: 2px solid #f4b902;">
    <img src="<?php echo BASE_URL_IMG ?>js.png" alt="js" class="img img-responsive" style="width: 100px; height: 100px;">
     <h3 align="center" style="color: #f4b902;">JS</h3>
    <summary>JavaScript is a high-level, dynamic, untyped, and interpreted programming language of HTML and the web. JavaScript is easy to learn and programme. Learn How You Can Build Awesome Websites Using JavaScript </summary><br>
    <button class="btn btn-js col-md-offset-3 col-md-6">TAKE COURSE</button>
  </div>
  </div>

  <!-- </div> -->
<div style="margin-top: 16px;color: #f9f9f9;">nn</div>
  <div class="col-md-4 col-sm-6">
  <div class="thumbnail" style="border: 2px solid #56a2f3;">
    <img src="<?php echo BASE_URL_IMG ?>icon-php.svg" alt="php" class="img img-responsive img-circle" style="width: 100px; height: 100px;">
     <h3 align="center" style="color: #56a2f3;">PHP</h3>
    <summary>PHP is a widely-used open source general-purpose scripting language. By the end of this course, you will have gained familiarity with a very convenient, flexible server-side programming language: PHP. Let's start learning now!</summary><br>
    <button class="btn btn-def col-md-offset-3 col-md-6">TAKE COURSE</button>
  </div>
  </div>

  <div class="col-md-4 col-sm-6">
   <div class="thumbnail" style="border: 2px solid #de499d;">
    <img src="<?php echo BASE_URL_IMG ?>mysql.png" alt="mysql" class="img img-responsive img-circle" style="width: 100px; height: 100px;">
     <h3 align="center" style="color: #de499d;">MySQL</h3>
    <summary>MySQL is an open-source relational database management system (RDBMS). With PHP, you can connect to manipulate databases. MySQL is the most popular database system used with PHP. Let's Learn now!</summary><br>
    <button class="btn btn-sql col-md-offset-3 col-md-6">TAKE COURSE</button>
  </div>
  </div>

  <div class="col-md-4 col-sm-6">
  <div class="thumbnail" style="border: 2px solid #313b44;">
    <img src="<?php echo BASE_URL_IMG ?>C++.png" alt="c++" class="img img-responsive img-circle" style="width: 100px; height: 100px;">
     <h3 align="center" style="color: #313b44;">C++</h3>
    <summary>C++ is a general purpose programming language. It as imperative, object-oriented and generic programming feautures. This course explains the C++ language from its basics up to the newest features.</summary><br>
    <button class="btn btn-cplus col-md-offset-3 col-md-6">TAKE COURSE</button>
  </div>
  </div>

  <!-- //end of courses -->
</div><br><br>

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
    <script src="<?php echo BASE_URL_STYLE ?>js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo BASE_URL_STYLE ?>js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });
    </script>
  </body>
</html>
