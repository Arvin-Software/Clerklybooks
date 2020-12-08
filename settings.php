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
    <title>Tick - Inventor</title>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/all.css">
    
    <style>
      .bor-twen{
    border-radius: 20px 20px 20px 20px;
}
.bor-ten{
    border-radius: 8px 8px 8px 8px;
}
a{
    margin-top: 2%;
    margin-bottom: 2%;
    color: #FFFFFF;
}
a:hover{
    background-color: #8a008a;
}
a:active{
    background-color: #8a008a;
}
.btn-col{
    background-color: #0062CC;
    color: #FFFFFF;
}
.btn-col-pink{
    background-color: #8a008a;
    color: #FFFFFF;
}
.navigator{
    padding: 1% 1% 1% 1%;
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
                border-radius: 20px 20px 20px 20px;
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
                border-radius: 20px 20px 20px 20px;
            }
        }
    </style>
</head>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2  text-white" style=" margin-top: 1%; border-radius: 0px 20px 20px 0px; background-color: #a300a3;">
            <nav class="navbar navbar-light navbar-expand-lg px-0 flex-row">
                <button class="navbar-toggler  bg-white" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                 <div class="navbar-collapse collapse " id="navbarWEX" style="border-radius: 20px 20px 20px 20px; background-color: #a300a3;">
                    <div class="nav flex-md-column flex-column" style="overflow: auto;  width: 100%; background-color: #a300a3;">
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
                        <img src="images/d/<?php echo $logo; ?>" class="mx-auto d-block bg-white rounded-circle" style="width: 68px; height: 68px;  margin-top: 15%;"><?php echo '<h5 class="text-center" style="margin-bottom: 10%;">' . $comp_nm . '</h5>'; ?>  
                        <!-- <div class="border bor-ten" style=" padding-left: 30px; padding-right: 30px; padding-top: 20px; background-color:#F2F2F2; height: 60vh;"> -->
                            <h5>Accounts</h5>
                            <a href="dept.php" target="tar" class="nav-item nav-link btn text-left bor-ten text-white btn-col-pink"  id="users" name="users"><i class="fas fa-boxes"></i>&nbsp;&nbsp;Departments</a>
                            <!-- <a class="nav-item nav-link btn bor-ten text-left text-white" target="tar" id="comp" name="comp" href="inventorapp/pages/mtrl.php"><i class="fas fa-dolly-flatbed"></i>&nbsp;&nbsp;Users</a> -->
                            <!-- <h5>Entry</h5>
                            <a href="inventorapp/entry/invoice.php" target="tar" class="nav-item nav-link btn text-left bor-ten text-white"  id="invoi" name="invoi"><i class="fas fa-file-invoice"></i>&nbsp;&nbsp;Invoice</a>
                            <a href="inventorapp/entry/deliverychalan.php" target="tar" class="nav-item nav-link btn text-left bor-ten text-white" id="modul" name="modul"><i class="fas fa-truck-moving"></i>&nbsp;&nbsp;Delivery challan</a>
                            <h5>Books</h5>
                            <a href="inventorapp/grn/entrydash.php" class="nav-item nav-link btn text-left bor-ten text-white"  id="users" name="users"><i class="fas fa-book"></i>&nbsp;&nbsp;Goods received note</a> -->
                            <!-- <a href="users.php" target="tar" class="nav-item nav-link btn text-left bor-ten"  id="users" name="users"><i class="fas fa-file-invoice"></i>&nbsp;&nbsp;Inventory</a> -->
                            <!-- <h5>Reports</h5> -->
                            <!-- <a href="inventorapp/pages/srb.php" target="tar" class="nav-item nav-link btn text-left bor-ten text-white"  id="srb" name="srb"><i class="fas fa-pallet"></i>&nbsp;&nbsp;Stock register book</a>
                            <a href="users.php" target="tar" class="nav-item nav-link btn text-left bor-ten text-white"  id="users" name="users"><i class="fas fa-truck-loading"></i>&nbsp;&nbsp;Issue register</a> -->
                            
                            
                        <!-- </div> -->
                        <!-- <div class="border bor-ten" style=" padding: 20px 30px 30px 20px; background-color:#F2F2F2; margin-top: 5%;"> -->
                            <h5>Others</h5>
                            
                            <!-- <a href="app/dash.php" target="tar" class="nav-item nav-link btn text-left bor-ten text-white"  id="users" name="users"><i style="color: #e66c6c;" class="fas fa-brain"></i>&nbsp;&nbsp;Red brain</a> -->
                            <a href="switcher.php" class="nav-item nav-link btn text-left bor-ten text-white"  ><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
                        <!-- </div> -->
                    </div>
                </div>
            </nav>
        </div>
        <div class="col py-4">
        <label for="dtandtm" class="border bor-ten" id="navg" name="navg" style="padding-left: 15px; padding-right: 15px; background-color: #FFFFFF;"><img src="images/logo.svg" style="width: 20px;">&nbsp;&nbsp;<a href="switcher.php" class="navigator">Austerity books</a> / <a href="#" class="navigator">Settings</a> / Department</label>
            <!-- <label for="copyright" class="float-right bor-ten border-left-0 border" style="padding-right: 15px; background-color: #FFFFFF;">&nbsp;&nbsp;|&nbsp;&nbsp;&copy;2010 - 2020 Arvin Soft R & D.</label> -->
            <label for="dtandtm" class="float-right bor-ten border" style="padding-left: 15px; padding-right: 15px;  background-color: #FFFFFF;" id="dt" name="dt">Time : 00:00:00</label>
            <iframe src="dept.php" class="border-0" id="tar" name="tar" style="width: 100%; height: 89vh;  background-color: #FFFFFF;"></iframe>
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
            
            $('#comp').addClass("btn-col-pink");
            $('#users').removeClass("btn-col-pink");
            $('#modul').removeClass("btn-col-pink");
            $('#invoi').removeClass("btn-col-pink");
            $('#srb').removeClass("btn-col-pink");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("<img src=\"images/logo.svg\" style=\"width: 20px;\">&nbsp;&nbsp;<a href=\"switcher.php\" class=\"navigator\">Tick</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Inventory");
        })
        $('#users').click(function(){
            
            $('#users').addClass("btn-col-pink");
            $('#comp').removeClass("btn-col-pink");
            $('#modul').removeClass("btn-col-pink");
            $('#invoi').removeClass("btn-col-pink");
            $('#srb').removeClass("btn-col-pink");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("<img src=\"images/logo.svg\" style=\"width: 20px;\">&nbsp;&nbsp;<a href=\"switcher.php\" class=\"navigator\">Austerity books</a> / <a href=\"settings.php\" class=\"navigator\">Settings</a> /  Department");
        })
        $('#modul').click(function(){
            
            $('#modul').addClass("btn-col-pink");
            $('#users').removeClass("btn-col-pink");
            $('#comp').removeClass("btn-col-pink");
            $('#invoi').removeClass("btn-col-pink");
            $('#srb').removeClass("btn-col-pink");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("<img src=\"images/logo.svg\" style=\"width: 20px;\">&nbsp;&nbsp;<a href=\"switcher.php\" class=\"navigator\">Tick</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Delivery Challan Entry");
        })
        $('#invoi').click(function(){
            $('#invoi').addClass("btn-col-pink");
            $('#users').removeClass("btn-col-pink");
            $('#comp').removeClass("btn-col-pink");
            $('#modul').removeClass("btn-col-pink");
            $('#srb').removeClass("btn-col-pink");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("<img src=\"images/logo.svg\" style=\"width: 20px;\">&nbsp;&nbsp;<a href=\"switcher.php\" class=\"navigator\">Tick</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Invoice Entry");
        })
        $('#srb').click(function(){
            $('#srb').addClass("btn-col-pink");
            $('#users').removeClass("btn-col-pink");
            $('#comp').removeClass("btn-col-pink");
            $('#modul').removeClass("btn-col-pink");
            $('#invoi').removeClass("btn-col-pink");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("<img src=\"images/logo.svg\" style=\"width: 20px;\">&nbsp;&nbsp;<a href=\"switcher.php\" class=\"navigator\">Tick</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Stock register book");
        })
    })
</script>
</body>
</html>