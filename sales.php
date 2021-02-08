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
    <title>Clerkly Books</title>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/softview.css">
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
                
                border-radius: 20px 20px 20px 20px;
            }
            .navbar-collapse.collapsing {
                
                -webkit-transition: left 0.2s ease;
                -o-transition: left 0.2s ease;
                -moz-transition: left 0.2s ease;
                transition: left 0.2s ease;
                left: -100%;
                
                z-index: 1;
                border-radius: 20px 20px 20px 20px;
            }
            .navbar-collapse.show {
                
                
                z-index: 1;
                left: 0;
                -webkit-transition: left 0.2s ease-in;
                -o-transition: left 0.2s ease-in;
                -moz-transition: left 0.2s ease-in;
                transition: left 0.2s ease-in;
                border-radius: 20px 20px 20px 20px;
            }
        }
        .bg-grad{
            background: #56ccf2; /* fallback for old browsers */
            background: -webkit-linear-gradient(to top, #56ccf2, #2f80ed); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to top, #56ccf2, #2f80ed); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

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
      
        .btn{
            padding-top: 5px;
            padding-bottom: 5px;
        }
        
    </style>
</head>
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid">
    <div class="row" style=" height: 100vh;">
        <div class="col-lg-2 fade-in text-black shadow border bg-trdmrk" style="padding: 0px 0px 0px 0px;">
            <nav class="navbar navbar-light navbar-expand-lg px-0 flex-row" style="">
                <button class="navbar-toggler  bg-white" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                 <div class="navbar-collapse collapse" id="navbarWEX" style="border-radius: 20px 20px 20px 20px;">
                    <div class="nav flex-md-column flex-column" style="overflow: auto;  width: 100%;">
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
                        <img src="images/logo.svg" class="mx-auto border-secondary d-block rounded-circle" style="width: 68px; height: 68px;  margin-top: 10%; margin-bottom: 15%;">  
                        <!-- <div class="border bor-ten" style=" padding-left: 30px; padding-right: 30px; padding-top: 20px; background-color:#F2F2F2; height: 60vh;"> -->
                        <a href="app/dash.php" target="tar" class="btn-nav nav-item nav-link btn text-left bor-none btn-col"  id="dash" name="dash">&nbsp;&nbsp;&nbsp;<i class="fas fa-chart-line"></i>&nbsp;&nbsp;Dashboard</a>
                            <h5 style="margin-top: 5%; margin-left: 3%;">Materials</h5>
                            <a href="salesapp/salesorder/po.php" style="" target="tar" class="btn-nav nav-item nav-link btn text-left bor-none"  id="users" name="users">&nbsp;&nbsp;&nbsp;<i class="fas fa-boxes"></i>&nbsp;&nbsp;Sales order</a>
                            <a class="btn-nav nav-item nav-link btn bor-none text-left" target="tar" id="comp" name="comp" href="salesapp/entry/mtrl.php">&nbsp;&nbsp;&nbsp;<i class="fas fa-dolly-flatbed"></i>&nbsp;&nbsp;Sales Inventory</a>
                            <!-- <h5 style=" margin-left: 3%;">Entry</h5>
                            <a href="inventorapp/entry/invoice.php" target="tar" class="btn-nav nav-item nav-link btn text-left bor-none"  id="invoi" name="invoi">&nbsp;&nbsp;&nbsp;<i class="fas fa-file-invoice"></i>&nbsp;&nbsp;Invoice</a>
                            <a href="inventorapp/entry/deliverychalan.php" target="tar" class="btn-nav nav-item nav-link btn text-left bor-none" id="modul" name="modul">&nbsp;&nbsp;&nbsp;<i class="fas fa-truck-moving"></i>&nbsp;&nbsp;EWay Bill / DC</a> -->
                            <h5 style=" margin-left: 3%;">Books</h5>
                            <a href="salesapp/grn/stockentry.php" target="tar" class="btn-nav nav-item nav-link btn text-left bor-none"  id="grn" name="grn">&nbsp;&nbsp;&nbsp;<i class="fas fa-book"></i>&nbsp;&nbsp;Goods received note</a>
                            <!-- <a href="users.php" target="tar" class="btn-nav nav-item nav-link btn text-left bor-none"  id="users" name="users"><i class="fas fa-file-invoice"></i>&nbsp;&nbsp;Inventory</a> -->
                            <!-- <h5>Reports</h5> -->
                            <a href="salesapp/srb/srb.php" target="tar" class="btn-nav nav-item nav-link btn text-left bor-none"  id="srb" name="srb">&nbsp;&nbsp;&nbsp;<i class="fas fa-pallet"></i>&nbsp;&nbsp;Stock register book</a>
                            <!-- <a href="inventorapp/gin/gin.php" target="tar" class="btn-nav nav-item nav-link btn text-left bor-none"  id="gin" name="gin">&nbsp;&nbsp;&nbsp;<i class="fas fa-truck-loading"></i>&nbsp;&nbsp;Goods Issue Note</a> -->
                            
                            
                        <!-- </div> -->
                        <!-- <div class="border bor-none" style=" padding: 20px 30px 30px 20px; background-color:#F2F2F2; margin-top: 5%;"> -->
                            <h5 style=" margin-left: 3%;">Others</h5>
                            <a href="salesapp/customer.php" target="tar" class="btn-nav nav-item nav-link btn text-left bor-none"  id="supp" name="supp">&nbsp;&nbsp;&nbsp;<i class="fas fa-user-friends"></i>&nbsp;&nbsp;Customer</a>
                            <!-- <a href="app/dash.php" target="tar" class="btn-nav nav-item nav-link btn text-left bor-none"  id="users" name="users"><i style="color: #e66c6c;" class="fas fa-brain"></i>&nbsp;&nbsp;Red brain</a> -->
                            <a href="switcher.php" class="btn-nav nav-item nav-link btn text-left bor-none"  >&nbsp;&nbsp;&nbsp;<i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
                        <!-- </div> -->
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-10 bg-light" style="padding-left: 10px; padding-right: 10px;">
            <div class="container-fluid border bg-white d-none d-lg-block" style="margin-bottom: 1%;  margin-top: 1%; padding-bottom: 1%; width: 98%; padding-left: 2%; padding-right: 2%;">
                <label for="dtandtm" class="fade-in" id="navg" name="navg" style="padding-top: 15px; padding-bottom: 0px; padding-left: 2px; padding-right: 15px; background-color: #FFFFFF;"><a href="switcher.php" class="navigator">Clerkly Books</a> / <a href="#" class="navigator">Sales Man</a></label>
                <!-- <label for="copyright" class="float-right bor-ten border-left-0 border" style="padding-right: 15px; background-color: #FFFFFF;">&nbsp;&nbsp;|&nbsp;&nbsp;&copy;2010 - 2020 Arvin Soft R & D.</label> -->
                <img src="images/d/<?php echo $logo; ?>" class="fade-in img-info rounded-circle float-right border dropdown-toggle" data-toggle="dropdown"  style="margin-top: 8px; width: 42px; height: 42px;"><label for="dtandtm" class="float-right fade-in" style="padding-top: 15px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px;  background-color: #FFFFFF;" id="dt" name="dt">Time : 00:00:00</label>
                <div class="dropdown-menu">
                    <h5 class="dropdown-header" href="#"><?php echo $comp_nm; ?></h5>
                    <a class="dropdown-item" href="#"><i class="far fa-user"></i>&nbsp;&nbsp;&nbsp;My profile</a>
                    <a class="dropdown-item" href="switcher.php"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;&nbsp;Back</a>
                </div>
                <!-- <hr>
                Money need to be paid by customers this month
                <div class="progress fade-in" style="height:20px;">
                    
                    <div class="progress-bar bg-success" style="width:40%"></div>
                </div> -->
            </div>
            <!-- <div class="container-fluid bg-white border d-none d-lg-block" style="padding-top: 2%; padding-bottom: 2%; width: 98%;">
               
            </div> -->
            <iframe src="app/dash.php" class="border-0 fade-in" id="tar" name="tar" style="width: 100%; height: 81vh; "></iframe>
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
            $('#invoi').removeClass("btn-col");
            $('#srb').removeClass("btn-col");
            $('#gin').removeClass("btn-col");
            $('#supp').removeClass("btn-col");
            $('#grn').removeClass("btn-col");
            $('#dash').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Sales Man</a> /  Inventory");
        })
        $('#users').click(function(){
            
            $('#users').addClass("btn-col");
            $('#comp').removeClass("btn-col");
            $('#modul').removeClass("btn-col");
            $('#invoi').removeClass("btn-col");
            $('#srb').removeClass("btn-col");
            $('#gin').removeClass("btn-col");
            $('#supp').removeClass("btn-col");
            $('#grn').removeClass("btn-col");
            $('#dash').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Sales Man</a> /  Purchase Order");
        })
        $('#modul').click(function(){
            
            $('#modul').addClass("btn-col");
            $('#users').removeClass("btn-col");
            $('#comp').removeClass("btn-col");
            $('#invoi').removeClass("btn-col");
            $('#srb').removeClass("btn-col");
            $('#gin').removeClass("btn-col");
            $('#supp').removeClass("btn-col");
            $('#grn').removeClass("btn-col");
            $('#dash').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Sales Man</a> /  Delivery Challan Entry");
        })
        $('#invoi').click(function(){
            $('#invoi').addClass("btn-col");
            $('#users').removeClass("btn-col");
            $('#comp').removeClass("btn-col");
            $('#modul').removeClass("btn-col");
            $('#srb').removeClass("btn-col");
            $('#gin').removeClass("btn-col");
            $('#supp').removeClass("btn-col");
            $('#grn').removeClass("btn-col");
            $('#dash').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Sales Man</a> /  Invoice Entry");
        })
        $('#srb').click(function(){
            $('#srb').addClass("btn-col");
            $('#users').removeClass("btn-col");
            $('#comp').removeClass("btn-col");
            $('#modul').removeClass("btn-col");
            $('#invoi').removeClass("btn-col");
            $('#gin').removeClass("btn-col");
            $('#supp').removeClass("btn-col");
            $('#grn').removeClass("btn-col");
            $('#dash').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Sales Man</a> /  Stock register book");
        })
        $('#gin').click(function(){
            $('#gin').addClass("btn-col");
            $('#users').removeClass("btn-col");
            $('#comp').removeClass("btn-col");
            $('#modul').removeClass("btn-col");
            $('#invoi').removeClass("btn-col");
            $('#srb').removeClass("btn-col");
            $('#supp').removeClass("btn-col");
            $('#grn').removeClass("btn-col");
            $('#dash').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Sales Man</a> /  Stock register book");
        })
        $('#supp').click(function(){
            $('#supp').addClass("btn-col");
            $('#users').removeClass("btn-col");
            $('#comp').removeClass("btn-col");
            $('#modul').removeClass("btn-col");
            $('#invoi').removeClass("btn-col");
            $('#srb').removeClass("btn-col");
            $('#gin').removeClass("btn-col");
            $('#grn').removeClass("btn-col");
            $('#dash').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Sales Man</a> /  Supplier");
        })
        $('#grn').click(function(){
            $('#grn').addClass("btn-col");
            $('#users').removeClass("btn-col");
            $('#comp').removeClass("btn-col");
            $('#modul').removeClass("btn-col");
            $('#invoi').removeClass("btn-col");
            $('#srb').removeClass("btn-col");
            $('#gin').removeClass("btn-col");
            $('#supp').removeClass("btn-col");
            $('#dash').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Sales Man</a> /  Goods Received Note");
        })
        $('#dash').click(function(){
            $('#dash').addClass("btn-col");
            $('#users').removeClass("btn-col");
            $('#comp').removeClass("btn-col");
            $('#modul').removeClass("btn-col");
            $('#invoi').removeClass("btn-col");
            $('#srb').removeClass("btn-col");
            $('#gin').removeClass("btn-col");
            $('#supp').removeClass("btn-col");
            $('#grn').removeClass("btn-col");
            $("#navbarWEX").removeClass("show");
            $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Sales Man</a>");
        })
    })
</script>
</body>
</html>
<!-- <a href="loginhandle/logout.php">Logout</a> -->