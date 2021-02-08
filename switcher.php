<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/logo1.png" />
    <title>Clerkly Books - Welcome</title>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <script src="https://kit.fontawesome.com/0d58c98fc8.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="css/all.css">
    <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/softview.css">
    <style>
    
        body{ 
           
        }
        .bor-twen{
            border-radius: 20px 20px 20px 20px;
        }
        .bor-ten{
            border-radius: 10px 10px 10px 10px;
        }
        a{
            margin-top: 2%;
            margin-bottom: 2%;
        }
        a:hover{
            background-color: #E1E1E1;
        }
        a:active{
            background-color: #0062CC;
        }
        .navigator{
            /* padding: 1% 1% 1% 1%; */
            padding-left: 5px;
            padding-right: 5px;☺
            text-decoration: none;
            color: #000000;
            border-radius: 10px 10px 10px 10px;
        }
        .navigator:hover{
            background-color: #007AFF;
            color: #FFFFFF;
            text-decoration: none;
        }
        .navigator:active{
            background-color: #0062CC;
            text-decoration: none;
        }
        .calip{
            background-color: #F1F1F1;
        }
        .calip:hover{
            background-color: #0062CC;
            color: #FFFFFF;
        }
        .bg-grad{
            background: #56ccf2; /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #56ccf2, #2f80ed); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #56ccf2, #2f80ed); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
        .fnt-cur{
            font: 50px 'Oleo Script', Helvetica, sans-serif;
        }
        .img-info{
            background-color: #F2F2F2;
        }
        .img-info:hover{
            background-color: #C2C2C2;
        }
        .img-info:active{
            background-color: #D2D2D2;
        }
        .butn{
            background-color: #FFFFFF;
            cursor: pointer;

        }
        .butn:hover{
            background-color:#F2F2F2;
            cursor: pointer;

        }
    </style>
</head>
<body class=" bg-light" oncontextmenu="return false;">
    <?php
        include 'classes/khatral.php';
        $res = khatral::khquery('SELECT * FROM inst WHERE instnm=:nm', array(
            ':nm'=>$_SESSION['instnm']
        ));
        $refid = 0;
        foreach($res as $p){
            $refid = $p['instid'];
        }
        $logo = '';     
        $ret = khatral::khquery('SELECT * FROM comp_info WHERE ref_id=:refid', array(
            ':refid'=>$refid,
        ));
        foreach($ret as $p){
            // echo 'mmn : ' . $p['logo'];
            if($p['logo'] == ''){
                $logo = 'images/logo.svg';
            }else{
                $logo = 'images/d/' . $p['logo'];
            }
        }
    ?>
<div class="container-fluid text-right bg-white border" style="">
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
            <img src="images/logo.svg" class="mx-auto d-block fade-in" style="width: 72px; margin-top: 2%; margin-bottom: 2%;" alt="logo">
            <!-- <h4 class="text-center" style="padding-top: 5%; margin-bottom: 5%; font-size: 30px;">Welcome to clerklybooks - <?php echo $_SESSION['instnm']; ?></h4> -->
        </div>
        <div class="col-lg-3 fade-in">
            <br />
            <img src="<?php echo $logo; ?>" class="img-info rounded-circle float-right border dropdown-toggle" data-toggle="dropdown"  style="margin-top: 8px; width: 42px; height: 42px; margin-right: 5%; "><label for="dtandtm" class="float-right" style="padding-top: 15px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; margin-top: 5px;  background-color: #FFFFFF;" id="dt" name="dt"><?php echo $_SESSION['instnm']; ?></label>
                <div class="dropdown-menu">
                    <!-- <h5 class="dropdown-header" href="#"><?php echo $_SESSION['instnm']; ?></h5> -->
                    <a class="dropdown-item" href="#"><i class="far fa-user"></i>&nbsp;&nbsp;&nbsp;My profile</a>
                    <a class="dropdown-item" href="loginhandle/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout</a>
                </div>
        </div>
    </div>
    <!-- <hr>
    <div class="row  fade-in" style="padding-left: 5%; padding-right: 5%;">
        <div class="col-lg-6 text-left" style="padding-bottom: 2%; padding-right: 5%; padding-top: 1%;">
                Money need to be paid by customers this month
                <div class="progress" style="height:20px;">
                    
                    <div class="progress-bar bg-success" style="width:40%"></div>
                </div>
                <br />
               <p class="text-left">Total : &#8377; 1000 | Paid : &#8377; 500 | Balance : &#8377; 500 | Total tax : &#8377; 275.99 | Balance : &#8377; 500.99</p> 
              
        </div>
        <div class="col-lg-6 text-left" style="padding-bottom: 2%; padding-left: 5%; padding-top: 1%;">
                Money need to be paid to suppliers this month
                <div class="progress" style="height:20px;">
                    
                    <div class="progress-bar bg-warning" style="width:40%"></div>
                </div>
                <br />
               <p class="text-left">Total : &#8377; 1000 | Paid : &#8377; 500 | Balance : &#8377; 500 | Total tax : &#8377; 380.99 | Balance : &#8377; 500.99</p> 
              
        </div>
    </div> -->
    
    
</div>
<div class="container-fluid  fade-in" style="margin-bottom: 3%; margin-top: 1%; height: 45vh;">

    <div class="row" style="padding: 2% 2% 2% 2%;">
        <!-- <div class="col-lg-3 text-center" style=" padding: 5% 5% 5% 5%;">
            <a href="dash.php" class="btn calip bor-twen" style=" padding: 12% 12% 12% 12%;"><img src="images/accounting.svg" alt="accounting" class="mx-auto d-block" style="width: 30%;">
            <h3 style="margin-top: 5%;">Accounting</h3></a>
        </div> -->
        <div class="col-lg-4  text-center" style="padding: 2% 2% 2% 2%;">
            <div class=" border bor-ten butn" id="invent" name="invent" style="padding: 2% 2% 2% 2%;">
                <img src="images/inventor.svg" alt="accounting" class="mx-auto d-block " style="width: 35%; padding: 5% 5% 5% 5%; margin-bottom: 1%; margin-top: 2%;">
                <!-- <h4>Inventory</h4> -->
                <p style="padding: 0% 20% 0% 20%; margin-bottom: 10%;">
                    <!-- To manage all the inventory <br /> -->
                    <a href="javascript:void(0);" class="btn btn-outline-primary" style="margin-top: 2%; font-size: 18px;">Go to Inventory</a>
                    <br /><small>Purchase order, quotation and more</small>
                </p>
            </div>
        </div>
        <div class="col-lg-4  text-center" style="padding: 2% 2% 2% 2%;">
            <div class=" border butn bor-ten" id="sales" name="sales" style="padding: 2% 2% 2% 2%;">
                <img src="images/sales.svg" alt="accounting" class="mx-auto d-block" style="width: 35%; padding: 5% 5% 5% 5%; margin-bottom: 1%; margin-top: 2%;">
                <!-- <h4>Sales</h4> -->
                <p style="padding: 0% 20% 0% 20%; margin-bottom: 10%;">
                    <!-- To manage all the sales <br /> -->
                    <a href="javascript:void(0);" class="btn btn-outline-primary" style="margin-top: 2%; font-size: 18px;">Go to Sales</a>
                    <br /><small>Sales order, quotation and more</small>
                </p>
            </div>
        </div>
        <div class="col-lg-4  text-center" style="padding: 2% 2% 2% 2%;">
            <div class=" border butn bor-ten" id="settings" name="settings" style="padding: 2% 2% 2% 2%;">
                <img src="images/settings2.svg" alt="accounting" class="mx-auto d-block" style="width: 35%; padding: 5% 5% 5% 5%; margin-bottom: 1%; margin-top: 2%;">
                <!-- <h4>Settings</h4> -->
                <p style="padding: 0% 20% 0% 20%; margin-bottom: 10%;">
                    <!-- Manager users and departments <br /> -->
                    <a href="javascript:void(0);" class="btn btn-outline-primary" style="margin-top: 2%; font-size: 18px;">Go to Settings</a>
                    <br /><small>Users, departments and more</small>
                </p>
            </div>
        </div>
    </div>
    <!-- <h5>Modules</h5>
<a href="modules/newsagency" class="btn btn-primary">News Agency</a> -->
</div>
<div class="container-fluid text-white" style="padding-left: 10%;">

</div>
<script>
    $('#invent').click(function(){
        $(location).attr('href', 'inventordash.php');
    })
    $('#sales').click(function(){
        $(location).attr('href', 'sales.php');
    })
    $('#settings').click(function(){
        $(location).attr('href', 'settings.php');
    })
</script>
</body>
</html>