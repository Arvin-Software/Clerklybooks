<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/logo.png" />
    <title>Tick - Home</title>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/0d58c98fc8.js" crossorigin="anonymous"></script>

    <style>
        html, body {
            
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
            padding-right: 5px;
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
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <nav class="navbar navbar-light navbar-expand-lg px-0 flex-row">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                 <div class="navbar-collapse collapse" id="navbarWEX">
                    <div class="nav flex-md-column flex-column" style="overflow: auto; padding-left: 20px; padding-right: 20px; padding-top: 20px; width: 100%;">
                        <?php
                            include 'classes/khatral.php';
                            $res = khatral::khquery('SELECT * FROM inst WHERE instnm=:nm', array(
                                ':nm'=>$_SESSION['instnm']
                            ));
                            $refid = 0;
                            foreach($res as $p){
                                $refid = $p['instid'];
                                $_SESSION['ref_id'] = $refid;
                                $comp_nm = $p['instnm'];
                            }
                            $logo = '';
                            
                            $ret = khatral::khquery('SELECT * FROM comp_info WHERE ref_id=:refid', array(
                                ':refid'=>$refid,
                            ));
                            foreach($ret as $p){
                                $logo = $p['logo'];
                            }

                        ?>
                        <img src="images/d/<?php echo $logo; ?>" class="mx-auto d-block" style="width: 68px; height: 68px;  margin-top: 5%;"><?php echo '<h5 class="text-center" style="margin-bottom: 10%;">' . $comp_nm . '</h5>'; ?>  
                        <!-- <div class="border bor-ten" style=" padding-left: 30px; padding-right: 30px; padding-top: 20px; background-color:#F2F2F2; height: 60vh;"> -->
                            <h5>Masters</h5>
                            <a class="nav-item nav-link btn bor-ten text-left" id="comp" name="comp" href="#"><i class="fas fa-book"></i>&nbsp;&nbsp;Ledgers</a>
                            <a href="app/ledgergroups.php" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="far fa-object-group"></i>&nbsp;&nbsp;Ledger groups</a>
                            <a href="#" class="nav-item nav-link btn text-left bor-ten" id="modul" name="modul"><i class="fas fa-dolly-flatbed"></i>&nbsp;&nbsp;Inventory</a>
                            <h5>Vouchers</h5>
                            <a href="users.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="fas fa-receipt"></i>&nbsp;&nbsp;Accounting & Inventory</a>
                            <!-- <a href="users.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="fas fa-file-invoice"></i>&nbsp;&nbsp;Inventory</a> -->
                            <h5>Reports</h5>
                            <a href="users.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="fas fa-file-invoice-dollar"></i>&nbsp;&nbsp;Profit & Loss A/C</a>
                            <a href="users.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="fas fa-balance-scale"></i>&nbsp;&nbsp;Balance Sheet</a>
                            <a href="app/dash.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="fas fa-sitemap"></i>&nbsp;&nbsp;Other Reports</a>
                            
                        <!-- </div> -->
                        <!-- <div class="border bor-ten" style=" padding: 20px 30px 30px 20px; background-color:#F2F2F2; margin-top: 5%;"> -->
                            <h5>Others</h5>
                            
                            <a href="app/dash.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i style="color: #e66c6c;" class="fas fa-brain"></i>&nbsp;&nbsp;Red brain</a>
                            <a href="switcher.php" class="nav-item nav-link btn text-left bor-ten"  ><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
                        <!-- </div> -->
                    </div>
                </div>
            </nav>
        </div>
        <div class="col py-2">
        <label for="dtandtm" class="border bor-ten" id="navg" name="navg" style="padding-left: 15px; padding-right: 15px; background-color: #F2F2F2;"><img src="images/xxx1.svg" style="width: 20px;">&nbsp;&nbsp;<a href="switcher.php" class="navigator">Tick</a> / <a href="#" class="navigator">Accounting</a></label>
            <!-- <label for="copyright" class="float-right bor-ten border-left-0 border" style="padding-right: 15px; background-color: #F2F2F2;">&nbsp;&nbsp;|&nbsp;&nbsp;&copy;2010 - 2020 Arvin Soft R & D.</label> -->
            <label for="dtandtm" class="float-right bor-ten border" style="padding-left: 15px; padding-right: 15px;  background-color: #F2F2F2;" id="dt" name="dt">Time : 00:00:00</label>
            <iframe src="app/dash.php" class="border bor-ten" id="tar" name="tar" style="width: 100%; height: 93vh;  background-color: #F2F2F2;"></iframe>
        </div>
    </div>
</div>
<script>     
     function startTime() {
        // var d = new Date("2015-03-25");
         var today = new Date();
         var h = today.getHours();
         var m = today.getMinutes();
         var day = today.getDate();
         var mon = today.getMonth() + 1;
         var year = today.getFullYear();
         var datebuild = day + "/" + mon + "/" + year
         var s = today.getSeconds();
         h = checkTime(h);
         m = checkTime(m);
         s = checkTime(s);
         $('#dt').html("Time : " + h + ":" + m + ":" + s + "  |  Date : " + datebuild);
         var t = setTimeout(startTime, 500);
     }
     function checkTime(i) {
         if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
         return i;
     }
     $(document).ready(function(){
         startTime();
     });
    $(document).ready(function(){
        // document.getElementById('id01').style.display='block';
        $('#comp').click(function(){
            
            $('#comp').addClass("btn-primary");
            $('#users').removeClass("btn-primary");
            $('#modul').removeClass("btn-primary");
            $("#navbarWEX").removeClass("show");
            
        })
        $('#users').click(function(){
            
            $('#users').addClass("btn-primary");
            $('#comp').removeClass("btn-primary");
            $('#modul').removeClass("btn-primary");
            $("#navbarWEX").removeClass("show");
        })
        $('#modul').click(function(){
            
            $('#modul').addClass("btn-primary");
            $('#users').removeClass("btn-primary");
            $('#comp').removeClass("btn-primary");
            $("#navbarWEX").removeClass("show");
        })
    })
</script>
</body>
</html>
<!-- <a href="loginhandle/logout.php">Logout</a> -->