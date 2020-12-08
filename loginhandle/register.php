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
<body class="" style=" background-color: #E2E2E2;">
<h4 class="fnt-cur text-center" style="padding-top: 3%;">Welcome to ClerklyBooks</h4>
    <div class="container-fluid ">
        <div class="row" style="height: 76vh;">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 my-auto">
                                
                    
                        
                        <div class="container bg-white shadow" style="margin-bottom: 0%; border-radius: 10px 10px 10px 10px;">
                            <div class="row">
                                <div class="col-lg-6 " style="width: 100%;">
                                    <img src="../images/login.svg" class="border border-top-0 border-left-0 border-bottom-0" style="width: 100%; height: 100%;" alt="">
                                </div>
                                <div class="col-lg-6" style="width: 100%; padding: 8% 5% 10% 5%;">
                                    <?php
                                        if(isset($_GET['id'])){
                                            echo '<div class="alert alert-danger alert-dismissible fade show text-center">
                                            
                                            <strong>Username or password wrong</strong> 
                                        </div>';
                                        }
                                    ?>
                                    <div class=""  >  
                                    

                                        <img src="../images/user.png" class="mx-auto d-block" style="width: 16%; margin-bottom: 15%;">
                                        <!-- <h4 style="margin-bottom: 10%;">Your account details</h4> -->
                                        <!-- <h6>your details</h6> -->
                                    </div>
                                    <h4 class="" style="padding-top: 3%; margin-bottom: 10%; ">Register info</h4>
                                    <form action="loginhandle" style="height: 100px;" method="post" autocomplete="off">
                                        <div class="form-group">
                                            <!-- <label for="usr">Name:</label> -->
                                            <input type="text" id="unme" name="unme" placeholder="Email or username" class="form-control bg-white" style="border-radius: 0px 0px 0px 0px;" required="">
                                        </div>
                                        <div class="form-group" style="margin-top: 10%; margin-bottom: 10%;">
                                            <!-- <label for="pwd">Password:</label> -->
                                            <input type="password" placeholder="Password" class="form-control bg-white" style="border-radius: 0px 0px 0px 0px;" id="pass" name="pass" required="">
                                        </div>
                                        <div class="form-group" style="margin-top: 10%; margin-bottom: 10%;">
                                            <!-- <label for="pwd">Password:</label> -->
                                            <input type="password" placeholder="Confirm your password" class="form-control bg-white" style="border-radius: 0px 0px 0px 0px;" id="pass" name="pass" required="">
                                        </div>
                                        <a href="login" class="navigator">Already a user ?</a><input type="submit" id="submit" name="submit" value="Register" style="border-radius: 0px 0px 0px 0px;" class="btn btn-primary float-right">
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        
                                        
               
            </div>
            <div class="col-lg-3"></div>
        </div>  
        <h6 class="text-center" style="">
            &copy; 2020 ClerklyBooks.
        </h6>
    </div>
   
</body>
</html>