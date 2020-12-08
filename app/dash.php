<?php
session_start();
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
    <link rel="stylesheet" href="../css/softview.css">
    <link rel="stylesheet" href="../css/softviewprogress.css">
</head>
<body class="bg-light" style="background-color: #FFFFFF;" oncontextmenu="return false;">
<!-- <img src="../images/backemp.png" class="mx-auto d-block" style="width: 70%; padding-top: 10%;" alt=""> -->
        <?php
            include '../classes/khatral.php';
            $mailnm = '';
            $finyearfrom = '';
            $finyearto = '';
            $gstno = '';
            $addr = '';
            $country = '';
            $stat = '';
            $city = '';
            $pin = '';
            $curr = '';
            $email = '';
            $phno ='';
            $web = '';
            $typofb = '';
            $res =  khatral::khquery('SELECT * FROM comp_info WHERE ref_id=:refid', array(':refid'=>$_SESSION['ref_id']));
            foreach($res as $p){
                $mailnm = $p['mail_nm'];
                $finyearfrom = $p['finyearfrom'];
                $finyearto = $p['finyearto'];
                $gstno = $p['gstno'];
                $addr = $p['addr'];
                $country = $p['country'];
                $stat = $p['stat'];
                $city = $p['city'];
                $pin  = $p['pin'];
                $curr = $p['curr'];
                $email = $p['email'];
                $phno = $p['phno'];
                $web = $p['web'];
                $typofb = $p['typofb'];
            }
        ?>
        <?php                 
            date_default_timezone_set('Asia/Kolkata');
            $date1 = date('Y-m-t', time());
            $date2 = date('Y-m-01', time());
            // echo $date2;
            $d = date_parse_from_format("Y-m-d", $date1);
            $enddate = $d["month"];
            $ret = khatral::khquery('SELECT * FROM grn WHERE inst=:inst AND dt BETWEEN :date1 AND :date2', array(
                ':inst'=>$_SESSION['instnm'],
                ':date1'=>$date2,
                ':date2'=>$date1
            ));
            $tot = 0;
            foreach($ret as $p){
                $res = khatral::khquery('SELECT * FROM grnitems WHERE grnid=:id', array(
                    ':id'=>$p['grn_id']
                ));
                foreach($res as $pi){
                    $tot += $pi['accquant'];
                }
            }
            $ret = khatral::khquery('SELECT * FROM gin WHERE dt BETWEEN :date1 AND :date2', array(
                ':date1'=>$date2,
                ':date2'=>$date1
            ));
            $tot1 = 0;
            foreach($ret as $p){
                $res = khatral::khquery('SELECT * FROM ginitems WHERE ginid=:id', array(
                    ':id'=>$p['gin_id']
                ));
                foreach($res as $pi){
                    $tot1 += $pi['issquant'];
                }
            }
            if($tot != 0){
                $avg = ($tot1 / $tot) * 100;
                $avg = round($avg,0);
                if($avg > 100){
                    $avg = ">100";
                }
            }
            else{
                $avg = "0";
            }
        ?>
        <div class="container-fluid" style="">
            <div class="row">
                <div class="col-lg-4" style="margin-top: 0%;">
                    <div class="bg-white p-5 border " style=" border-radius: 0px 0px 0px 0px;">
                        <h2 class="h6 font-weight-bold text-center mb-4">Stock used this month</h2>

                        <!-- Progress bar 1 -->
                        <div class="progress mx-auto" data-value='<?php echo $avg; ?>'>
                            <span class="progress-left">
                                <span class="progress-bar border-primary"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar border-primary"></span>
                            </span>
                            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h2 font-weight-bold"><?php echo $avg; ?> %</div>
                            </div>
                        </div>
                        <!-- END -->

                        <!-- Demo info -->
                        <div class="row text-center mt-4">
                            <div class="col-6 border-right">
                                <div class="h4 font-weight-bold mb-0"><?php echo $tot; ?></div><span class="small text-gray">GRN Quantity</span>
                            </div>
                            <div class="col-6">
                                <div class="h4 font-weight-bold mb-0"><?php echo $tot1; ?></div><span class="small text-gray">GIN Quantity</span>
                            </div>
                        </div>
                        <!-- END -->
                    </div>
                </div>
                <div class="col-lg-4" style="margin-top: 0%;">
                    <div class="bg-white p-5 border" style=" border-radius: 0px 0px 0px 0px;">
                        <h2 class="h6 font-weight-bold text-center mb-4">Product Received this week</h2>

                        <!-- Progress bar 1 -->
                        <div class="progress mx-auto" data-value='90'>
                            <span class="progress-left">
                                <span class="progress-bar border-success"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar border-success"></span>
                            </span>
                            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h2 font-weight-bold">90 %</div>
                            </div>
                        </div>
                        <!-- END -->

                        <!-- Demo info -->
                        <div class="row text-center mt-4">
                            <div class="col-6 border-right">
                                <div class="h4 font-weight-bold mb-0">88%</div><span class="small text-gray">Last week</span>
                            </div>
                            <div class="col-6">
                                <div class="h4 font-weight-bold mb-0">76%</div><span class="small text-gray">This month</span>
                            </div>
                        </div>
                        <!-- END -->
                    </div>
                </div>
                <div class="col-lg-4" style="margin-top: 0%;">
                    <div class="bg-white p-5 border" style=" border-radius: 0px 0px 0px 0px;">
                        <h2 class="h6 font-weight-bold text-center mb-4">Stock Rejected this week</h2>

                        <!-- Progress bar 1 -->
                        <div class="progress mx-auto" data-value='20'>
                            <span class="progress-left">
                                <span class="progress-bar border-danger"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar border-danger"></span>
                            </span>
                            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h2 font-weight-bold">20 %</div>
                            </div>
                        </div>
                        <!-- END -->

                        <!-- Demo info -->
                        <div class="row text-center mt-4">
                            <div class="col-6 border-right">
                                <div class="h4 font-weight-bold mb-0">24%</div><span class="small text-gray">Last week</span>
                            </div>
                            <div class="col-6">
                                <div class="h4 font-weight-bold mb-0">30%</div><span class="small text-gray">This month</span>
                            </div>
                        </div>
                        <!-- END -->
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-lg-4" style="margin-top: 2%;">
                    <div class="bg-white p-5 border" style="height: 300px;  border-radius: 0px 0px 0px 0px;">
                        <!-- <div class="card-header bg-primary text-white"><h4>Basic info</h4></div> -->
                        <!-- <div class="card-body" style="height: 300px;"> -->
                        <h4 class="text-primary"><img src="../images/peinfo.svg" alt="info" style="width: 32px;">&nbsp;&nbsp;Basic info</h4><br />
                            Mailing Name : <?php echo $mailnm; ?><br />
                            
                            Current Period : <?php echo $finyearfrom; ?> to <?php echo $finyearto; ?><br />
                            GST number : <?php echo $gstno; ?>  
                        <!-- </div> -->
                        <!-- <div class="card-footer">Footer</div> -->
                    </div>
                    <!-- <div class="border-0 bg-white bor-ten" style="padding: 5% 5% 5% 5%; margin-bottom: 5%; height: 30vh;"> -->
                        
                                             
                    <!-- </div> -->
                </div>
                <div class="col-lg-4" style="margin-top: 2%;">
                    <div class="bg-white p-5 border" style="height: 300px;  border-radius: 0px 0px 0px 0px;">
                        <!-- <div class="card-header bg-primary text-white"><h4>Mailing Address</h4></div>
                        <div class="card-body" style="height: 200px;"> -->
                        <h4 class="text-primary"><img src="../images/address.svg" alt="info" style="width: 32px;">&nbsp;&nbsp;Mailing address</h4><br />    
                            <?php echo $addr . '<br />' . $city . '<br />' . $stat . '<br />' . $country
                            . '<br />Pincode : ' . $pin
                            ; 
                            
                            ?>
                        <!-- </div> -->
                    </div>
                </div>
                <div class="col-lg-4" style="margin-top: 2%;">
                    <div class="bg-white p-5 border" style="height: 300px;  border-radius: 0px 0px 0px 0px;">
                        <!-- <div class="card-header bg-primary text-white"><h4>Contact Information</h4></div>
                        <div class="card-body" style="height: 200px;"> -->
                        <h4 class="text-primary"><img src="../images/cont.svg" alt="info" style="width: 32px;">&nbsp;&nbsp;Contact information</h4><br />     
                            <?php
                                echo 'Email : ' . $email . '<br />Phone number : ' . $phno . '<br />Web : <a href="' . $web . '" target="_blank" style="color: #000; ">' . $web . '</a>';
                            ?>
                        <!-- </div> -->
                    </div>  
                </div>
            </div>
        </div>
</body>
<script>
$(function() {

$(".progress").each(function() {

  var value = $(this).attr('data-value');
  var left = $(this).find('.progress-left .progress-bar');
  var right = $(this).find('.progress-right .progress-bar');

  if (value > 0) {
    if (value <= 50) {
      right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
    } else {
      right.css('transform', 'rotate(180deg)')
      left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
    }
  }

})

function percentageToDegrees(percentage) {

  return percentage / 100 * 360

}

});
</script>
</html>