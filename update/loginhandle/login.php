<?php

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo.svg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Login - ClerklyBooks</title>
  </head>
  <body class="bg-light">
    <div class="container-fluid " style="margin-top: 7%;">
        <div class="row" style="">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 my-auto">
                <div class="container bg-white shadow border" style="margin-bottom: 0%;">
                    <div class="row">
                        <div class="col-lg-6 ">
                            <img src="../images/login1.svg" class="" style="width: 100%; height: 100%; margin-top: 7%;" alt="">
                        </div>
                        <div class="col-lg-6" style=" padding: 8% 5% 5% 5%;">
                            
                            <div class=""  > 
                                <img src="../images/logo.svg" class="mx-auto d-block" style="width: 20%; margin-bottom: 15%;">
                                <!-- <h4 style="margin-bottom: 10%;">Your account details</h4> -->
                                <!-- <h6>your details</h6> -->
                            </div>
                            <?php
                                session_start();
                                include '../classes/khatral.php';
                                if(isset($_POST['submit'])){
                                    if($_POST['unme'] == "admin" && $_POST['pass'] == "Asinsurya1"){
                                        $_SESSION['unme'] = $_POST['unme'];
                                        $_SESSION['pass'] = $_POST['pass'];
                                        $_SESSION['typ'] = "admin";
                                        header("Location: ../../admin/admin.php");
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
                                        $res = khatral::khquery('SELECT * FROM inst WHERE instnm=:inst', array(':inst'=>$_SESSION['instnm']));
                                        foreach($res as $p){
                                            if($p['firstrun'] == "0"){
                                                header("Location: ../firstrun.php");
                                            }else{
                                                header("Location: ../switcher.php");
                                            }
                                        }
                                    }else{
                                        echo '<div class="alert alert-danger alert-dismissible fade show text-center">
                                    
                                    <strong>Username or password wrong</strong> 
                                </div>';
                                        // echo 'username or password wrong';
                                    }
                                }
                            ?>
                            <h4 class="" style="padding-top: 3%; margin-bottom: 2%; ">Your info</h4>
                            <form action="login.php" style="height: 100px;" method="post" autocomplete="off">
                                
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="unme" name="unme" required="" placeholder="name@example.com">
                                    <label for="unme">Username</label>
                                </div>
                                <div class="form-floating" style="margin-bottom: 12%;">
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required="">
                                    <label for="pass">Password</label>
                                </div>
                                <button type="submit" id="submit" name="submit" style="" class="btn btn-primary float-end">Login&nbsp;&nbsp;<i class="bi bi-box-arrow-in-right"></i></button>
                            </form>
                            
                        </div>
                        <hr style="margin-top: 2%;">
                        <h6 class="text-center" style="">
                                <?php include '../classes/clerkly.php'; echo clerklybooks::cbVersion(); ?><br />Using Bootstrap v5.0 <br><br>
                            </h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>  
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>