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
</head>
<body class="bg-light" oncontextmenu="return false;">
    <div class="container-fluid bor-none border" style="padding: 0% 2% 2% 2%; width: 97vw; margin: 1% 1% 1% 1%; background-color: #FFFFFF;">
        <!-- <h4><i class="fas fa-file-invoice"></i>&nbsp;Invoice entry</h4> -->
        <a href="new.php" class="btn btn-outline-primary bor-none"><i class="fas fa-plus"></i>&nbsp;&nbsp;New</a>
        <div class="bg-white table-responsive" style="">
        <table class="table table-bordered table-striped">
            <tr class="bg-primary text-white">
                <th>SL.NO</th>
                <th>Date</th>
                <th>Supplier Name</th>
                <th>Invoice Number</th>
                <th>Actions</th>
            </tr>
            
            <?php
                $ret = khatral::khquery('SELECT * FROM entrymo WHERE inst=:inst', array(':inst'=>$_SESSION['instnm']));
                $count = 0;
                foreach($ret as $p){
                    $count = $count + 1;
                    $dt = $p['dt'];
                    $podate = date("d-m-Y", strtotime($dt));
                    echo ' <tr class="">
                    <td>' . $count . '</td>
                    <td class="">' . $podate . '</td>
                    <td class="">' . $p['suppnm'] . '</td>
                    <td class="">' . $p['invdt'] . '</td>
                    <td class=""><a href="view.php?id=' . $p['entryid'] . '" style="" class="btn btn-outline-primary bor-none"><i class="far fa-eye"></i></a> 
                    </tr>';
                }
            ?>        
        </table>
        </div>
    </div>
</body>