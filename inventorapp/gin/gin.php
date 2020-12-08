<?php
  session_start();
  include '../../classes/khatral.php';
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../../images/logo.png" />
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
    <link rel="stylesheet" href="../../css/softview.css">
    <link rel="stylesheet" href="../../css/all.css">
</head>
<body class="bg-light" oncontextmenu="return false;">
    <div class="container-fluid bor-none border" style="padding: 0% 2% 2% 2%; margin-top: 1%; width: 98vw; background-color: #FFFFFF;">
        <!-- <h4><i class="fas fa-truck-loading"></i>&nbsp;Goods Issue Note</h4> -->
        <a href="new.php" class="btn btn-outline-primary bor-none"><i class="fas fa-plus"></i>&nbsp;&nbsp;New</a>
        <div class="bg-white bor-none table-responsive" style="">
        <table class="table table-bordered table-striped">
            <tr class="bg-primary text-white">
                <th>SL.NO</th>
                <th>Date</th>
                <th>Goods Request Slip No</th>
                <th>Goods issue note Number</th>
                <th>Actions</th>
            </tr>
            
            <?php
                $ret = khatral::khquery('SELECT * FROM gin WHERE inst=:inst', array(':inst'=>$_SESSION['instnm']));
                $count = 0;
                foreach($ret as $p){
                    $count = $count + 1;
                    echo ' <tr class="">
                    <td>' . $count . '</td>
                    <td class="">' . $p['dt'] . '</td>
                    <td class="">' . $p['grs_no'] . '</td>
                    <td class="">' . $p['dept'] . '</td>
                    <td class=""><a href="view.php?id=' . $p['gin_id'] . '" style="" class="btn btn-outline-primary bor-none"><i class="far fa-eye"></i></a> 
                    </tr>';
                }
            ?>        
        </table>
        </div>
    </div>
</body>