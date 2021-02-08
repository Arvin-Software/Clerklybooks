<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo.svg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Switcher - ClerklyBooks</title>
  </head>
  <body class="bg-white">
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
    <div class="container-fluid text-right bg-white" style="">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <img src="images/logo.svg" class="mx-auto d-block fade-in" style="width: 72px; margin-top: 2%; margin-bottom: 2%;" alt="logo">
                <!-- <h4 class="text-center" style="padding-top: 5%; margin-bottom: 5%; font-size: 30px;">Welcome to clerklybooks - <?php echo $_SESSION['instnm']; ?></h4> -->
            </div>
            <div class="col-lg-3 fade-in">
                <br />
                <img src="<?php echo $logo; ?>" class="img-info rounded-circle float-end border dropdown-toggle" data-bs-toggle="dropdown"  style="margin-top: 8px; width: 42px; height: 42px; margin-right: 5%; "><label for="dtandtm" class="float-end" style="padding-top: 15px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; margin-top: 5px;  background-color: #FFFFFF;" id="dt" name="dt"><?php echo $_SESSION['instnm']; ?></label>
                    <div class="dropdown-menu">
                        <!-- <h5 class="dropdown-header" href="#"><?php echo $_SESSION['instnm']; ?></h5> -->
                        <a class="dropdown-item" href="#"><i class="far fa-user"></i>&nbsp;&nbsp;&nbsp;My profile</a>
                        <a class="dropdown-item" href="loginhandle/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout</a>
                    </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid  fade-in" style="margin-bottom: 3%; margin-top: 5%; height: 45vh;">

        <div class="row" style="padding: 2% 2% 2% 2%;">
            <!-- <div class="col-lg-3 text-center" style=" padding: 5% 5% 5% 5%;">
                <a href="dash.php" class="btn calip bor-twen" style=" padding: 12% 12% 12% 12%;"><img src="images/accounting.svg" alt="accounting" class="mx-auto d-block" style="width: 30%;">
                <h3 style="margin-top: 5%;">Accounting</h3></a>
            </div> -->
            <div class="col-lg-4  text-center" style="padding: 3% 3% 3% 3%;">
                <div class="bor-ten butn" id="invent" name="invent" style="padding: 2% 2% 2% 2%;">
                    <img src="images/inventor.svg" alt="accounting" class="mx-auto d-block " style="width: 256px; height: 256px;">
                    <!-- <h4>Inventory</h4> -->
                    <p style="padding: 0% 20% 0% 20%; margin-bottom: 10%;">
                        <!-- To manage all the inventory <br /> -->
                        <br>
                        <a href="javascript:void(0);" class="btn btn-danger" style="margin-top: 2%; border-radius: 20px 20px 20px 20px;">Go to Inventory</a>
                        
                    </p>
                </div>
            </div>
            <div class="col-lg-4  text-center" style="padding: 3% 3% 3% 3%;">
                <div class="butn bor-ten" id="sales" name="sales" style="padding: 2% 2% 2% 2%;">
                    <img src="images/sales.svg" alt="accounting" class="mx-auto d-block" style="width: 256px; height: 256px;">
                    <!-- <h4>Sales</h4> -->
                    <p style="padding: 0% 20% 0% 20%; margin-bottom: 10%;">
                        <!-- To manage all the sales <br /> -->
                        <br>
                        <a href="javascript:void(0);" class="btn btn-success" style="margin-top: 2%; border-radius: 20px 20px 20px 20px;">Go to Sales</a>
                        
                    </p>
                </div>
            </div>
            <div class="col-lg-4  text-center" style="padding: 3% 3% 3% 3%;">
                <div class="butn bor-ten" id="settings" name="settings" style="padding: 2% 2% 2% 2%;">
                    <img src="images/settings2.svg" alt="accounting" class="mx-auto d-block" style="width: 256px; height: 256px;">
                    <!-- <h4>Settings</h4> -->
                    <p style="padding: 0% 20% 0% 20%; margin-bottom: 10%;">
                        <!-- Manager users and departments <br /> -->
                        <br>
                        <a href="javascript:void(0);" class="btn btn-primary" style="margin-top: 2%; border-radius: 20px 20px 20px 20px;">Go to Settings</a>
                        
                    </p>
                </div>
            </div>
        </div>
        <!-- <h5>Modules</h5>
    <a href="modules/newsagency" class="btn btn-primary">News Agency</a> -->
    <!-- <div class="position-absolute bottom-0 start-50 translate-middle-x"><?php include 'classes/clerkly.php'; echo clerklybooks::cbVersion(); ?></div> -->
    </div>
    <div class="container-fluid text-white" style="padding-left: 10%;">
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>