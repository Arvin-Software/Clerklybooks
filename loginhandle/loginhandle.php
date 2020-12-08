<?php
session_start();
include '../classes/khatral.php';
if(isset($_POST['submit'])){
    if($_POST['unme'] == "admin" && $_POST['pass'] == "Asinsurya1"){
        $_SESSION['unme'] = $_POST['unme'];
        $_SESSION['pass'] = $_POST['pass'];
        $_SESSION['typ'] = "admin";
    }
    $count = 0;
    $ret = khatral::khquery('SELECT  * FROM authen WHERE unme = :usenm AND pass=:pass', array(':usenm'=>$_POST['unme'], ':pass'=>$_POST['pass']));
    foreach($ret as $p){
        $inst = $p['inst'];
        $count = 1;
    }
    if($count >= 1){
        $_SESSION['unme'] = $_POST['unme'];
        $_SESSION['typ'] = "user";
        $_SESSION['instnm'] = $inst;
        $cookie_name = "user";
        $cookie_value = $_POST['unme'];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        $cookie_name1="typ";
        $cookie_value1="user";

        setcookie($cookie_name1, $cookie_value1, time() + (86400 * 30), "/"); // 86400 = 1 day
        $cookie_name1="inst";
        $cookie_value1=$inst;

        setcookie($cookie_name1, $cookie_value1, time() + (86400 * 30), "/"); // 86400 = 1 day
            // echo 'success1';
    }else{
        // echo 'username or password wrong';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Tick Accounting Suite</title>
    <link rel="icon" href="../images/logo.png" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>

    <style>
        .bg-img-nice{
            background-image: url("../images/bitmap.png");
            background-size: cover;
            background-repeat: none;
        }
        .bg-grad{
            background: #56ccf2; /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #56ccf2, #2f80ed); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #56ccf2, #2f80ed); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
        .fnt-cur{
            font: 50px 'Oleo Script', Helvetica, sans-serif;
        }
    </style>
</head>
<body class="" style=" background-color: #F2F2F2;">
<!-- <h4 class="fnt-cur text-center" style="padding-top: 5%;">Welcome to ClerklyBooks</h4> -->
    <div class="container-fluid " style="padding-top: 5%;">
        <div class="row" style="height: 76vh;">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 my-auto">
                                
                    
                        
                        <div class="container bg-white shadow text-center" style="margin-bottom: 0%; border-radius: 10px 10px 10px 10px;">
                            
                                
                                    <?php
                                        if(isset($_GET['id'])){
                                            echo '<div class="alert alert-danger alert-dismissible fade show text-center">
                                            
                                            <strong>Username or password wrong</strong> 
                                        </div>';
                                        }
                                    ?>
                                    <div class=""  >  
                                    

                                        <!-- <img src="../images/user.png" class="mx-auto d-block" style="width: 16%; margin-bottom: 15%;"> -->
                                        <!-- <h4 style="margin-bottom: 10%;">Your account details</h4> -->
                                        <!-- <h6>your details</h6> -->
                                    </div>
                                    <h4 class="" style="padding-top: 5%; margin-bottom: 10%; ">Checking Info...</h4>
                                    <form action="loginhandle" style="height: 100px;" method="post" autocomplete="off">
                                       <div class="spinner-border"></div>
                                    </form>
                                    
                                
                            
                        </div>
                        
                                        
               
            </div>
            <div class="col-lg-4"></div>
        </div>  
        <h6 class="text-center" style="">
            &copy; 2020 ClerklyBooks.
        </h6>
    </div>
   

    <script>
    $( document ).ready(function() {
        setTimeout(function() {
        window.location.href = "loginredirect.php";
        }, 1000);
    })
    </script>
</body>