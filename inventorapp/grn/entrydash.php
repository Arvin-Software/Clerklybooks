<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../images/logo.png" />
    <title>Tick - Inventor</title>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/all.css">
    <link rel="stylesheet" href="../../css/softview.css">
    <style>
       
        @media (max-width: 768px) {
            .navbar-collapse {
                position: relative;
                top: 1%;
                left: 0;
                /* padding-left: 15px;
                padding-right: 15px; */
                padding-bottom: 15px;
                width: 100%;
                height: 100vh;
                border-radius: 20px 20px 20px 20px;
            }
            .navbar-collapse.collapsing {
                height: 100vh;
                -webkit-transition: left 0.2s ease;
                -o-transition: left 0.2s ease;
                -moz-transition: left 0.2s ease;
                transition: left 0.2s ease;
                left: -100%;
                background-color: #FFFFFF;
                z-index: 1;
            }
            .navbar-collapse.show {
                height: 100vh;
                background-color: #FFFFFF;
                z-index: 1;
                left: 0;
                -webkit-transition: left 0.2s ease-in;
                -o-transition: left 0.2s ease-in;
                -moz-transition: left 0.2s ease-in;
                transition: left 0.2s ease-in;
            }
        }
    </style>
</head>
<body style="" class="bg-light">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 border bg-primary text-white" style=" margin-top: 1%; border-radius: 0px 20px 20px 0px;">
            <nav class="navbar navbar-light navbar-expand-lg px-0 flex-row">
                <button class="navbar-toggler  bg-white" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                 <div class="navbar-collapse collapse bg-primary" id="navbarWEX" style="border-radius: 20px 20px 20px 20px;">
                    <div class="nav flex-md-column flex-column bg-primary" style="overflow: auto;  width: 100%;">
                        <?php
                            include '../../classes/khatral.php';
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
                        <img src="../../images/d/<?php echo $logo; ?>" class="mx-auto d-block bg-white rounded-circle" style="width: 68px; height: 68px;  margin-top: 15%;"><?php echo '<h5 class="text-center" style="margin-bottom: 10%;">' . $comp_nm . '</h5>'; ?>  
                        <!-- <div class="border bor-ten" style=" padding-left: 30px; padding-right: 30px; padding-top: 20px; background-color:#F2F2F2; height: 60vh;"> -->
                            <h5>Entry</h5>
                            <a href="stockentry.php" target="tar" class="nav-item nav-link btn text-left text-white bor-ten btn-col"  id="users" name="users"><i class="fas fa-boxes"></i>&nbsp;&nbsp;Stock</a>
                            <!-- <a class="nav-item nav-link btn bor-ten text-left text-white" target="tar" id="comp" name="comp" href="inventorapp/pages/mtrl.php"><i class="fas fa-dolly-flatbed"></i>&nbsp;&nbsp;Product</a> -->
                            <!-- <h5>Entry</h5> -->
                            <!-- <a href="app/ledgergroups.php" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="fas fa-file-invoice"></i>&nbsp;&nbsp;Invoice</a> -->
                            <!-- <a href="#" class="nav-item nav-link btn text-left bor-ten" id="modul" name="modul"><i class="fas fa-truck-moving"></i>&nbsp;&nbsp;Delivery chellan</a>
                            <h5>Books</h5>
                            <a href="users.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="fas fa-book"></i>&nbsp;&nbsp;Goods received note</a> -->
                            <!-- <a href="users.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="fas fa-file-invoice"></i>&nbsp;&nbsp;Inventory</a> -->
                            <!-- <h5>Reports</h5> -->
                            <!-- <a href="users.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="fas fa-pallet"></i>&nbsp;&nbsp;Stock register book</a>
                            <a href="users.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="fas fa-truck-loading"></i>&nbsp;&nbsp;Issue register</a> -->
                            
                            
                        <!-- </div> -->
                        <!-- <div class="border bor-ten" style=" padding: 20px 30px 30px 20px; background-color:#F2F2F2; margin-top: 5%;"> -->
                            <h5>Others</h5>
                            
                            <!-- <a href="app/dash.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i style="color: #e66c6c;" class="fas fa-brain"></i>&nbsp;&nbsp;Red brain</a> -->
                            <a href="../../inventordash.php" class="nav-item nav-link btn text-left bor-ten text-white"  ><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
                        <!-- </div> -->
                    </div>
                </div>
            </nav>
        </div>
        <div class="col py-4">
        <label for="dtandtm" class="border bor-ten" id="navg" name="navg" style="padding-left: 15px; padding-right: 15px; background-color: #F2F2F2;"><img src="../../images/logo.svg" style="width: 20px;">&nbsp;&nbsp;<a href="../../switcher.php" class="navigator">Austerity books</a> / <a href="../../inventordash.php" class="navigator">Inventor</a> / Goods received note</label>
            <!-- <label for="copyright" class="float-right bor-ten border-left-0 border" style="padding-right: 15px; background-color: #F2F2F2;">&nbsp;&nbsp;|&nbsp;&nbsp;&copy;2010 - 2020 Arvin Soft R & D.</label> -->
            <label for="dtandtm" class="float-right bor-ten border" style="padding-left: 15px; padding-right: 15px;  background-color: #F2F2F2;" id="dt" name="dt">Time : 00:00:00</label>
            <iframe src="stockentry.php" class="border-0" id="tar" name="tar" style="width: 100%; height: 90vh;  background-color: #FFFFFF;"></iframe>
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
            
            $('#comp').addClass("btn-col");
            $('#users').removeClass("btn-col");
            $('#modul').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("<img src=\"../../images/logo.svg\" style=\"width: 20px;\">&nbsp;&nbsp;<a href=\"switcher.php\" class=\"navigator\">Austerity books</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Goods received note / Products entry");
        })
        $('#users').click(function(){
            
            $('#users').addClass("btn-col");
            $('#comp').removeClass("btn-col");
            $('#modul').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("<img src=\"../../images/logo.svg\" style=\"width: 20px;\">&nbsp;&nbsp;<a href=\"switcher.php\" class=\"navigator\">Austerity books</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Goods received note / Stock entry");
        })
        $('#modul').click(function(){
            
            $('#modul').addClass("btn-col");
            $('#users').removeClass("btn-col");
            $('#comp').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
        })
    })
</script>
</body>
</html>
<!-- <a href="loginhandle/logout.php">Logout</a> -->