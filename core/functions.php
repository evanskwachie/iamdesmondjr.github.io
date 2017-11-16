<?php 

  require_once 'config.php';
  @session_start();
  $_SESSION['error'] = false;
  $_SESSION['errorMessage'] = "";
  $_SESSION['success'] = false;
  $_SESSION['successMessage'] = "";
  $_SESSION['store'] = false;
  $_SESSION['storeMessage'] = "";


  //function to connect to database
  function connectDB(){
  	  $con = mysqli_connect(HOST, USER, PASS, HOST_DB);

  	  if (mysqli_connect_errno()) {
         return false;
       }else {
          return $con;
       }
  }

  // a function for redirecting webpages
  function redirect($url){
    header("Location: {$url}");
    exit(0);
  }
  
 //creating the login function
  function login($codename, $passcode){
    $connected = connectDB();
    $query = "SELECT * FROM users WHERE codename = '{$codename}' AND passcode = '{$passcode}'";
       $run = $connected->query($query);
       $num_rows = $run->num_rows;
       if ($num_rows > 0) {
           $_SESSION['tny_admin']=$codename; // Initializing Session

           redirect("administrator.php"); //redirecting page to dashBoard
       }else{
        return false;
      }
  }

  //creating a registeration function
  function signUp($username, $email, $password, $gender){
    $connected = connectDB();
    $query = "INSERT INTO user (username, email, password, gender)
                      VALUES ('".$username."', '".$email."', '".$password."', '".$gender."')";
            $results = $connected->query($query);
            if(!$results) {
               return false;
            }
            login($username, $password);
            
    }

    //creating a registeration function
  function add_admin($codename, $passcode){
    $connected = connectDB();
    $query = "INSERT INTO admin (codename, passcode)
                      VALUES ('{$codename}', '{$passcode}')";
            $results = $connected->query($query);
            if(!$results) {
               return false;
            }else {
              return true;
            }       
    }
    //creating the login function
  function login_admin($codename, $passcode){
    $connected = connectDB();
    $query = "SELECT * FROM admin WHERE codename = '{$codename}' AND passcode = '{$passcode}'";
       $run = $connected->query($query);
       $num_rows = $run->num_rows;
       if ($num_rows > 0) {
           $_SESSION['tny_admin']=$codename; // Initializing Session

           redirect("administrator"); //redirecting page to dashBoard
       }else{
        return false;
      }
  }


//function for password hashing
  function hash_value($algo, $data, $salt = null) {
        if(is_null($salt) === true) {
            $context = hash_init($algo);
            hash_update($context, $data);
            return hash_final($context);
        } else {
            $context = hash_init($algo, HASH_HMAC, $salt);
            hash_update($context, $data);
            return hash_final($context);
        }
    }
    
//function to test inputs
    function check_data($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);

      return $data;

    }


?>