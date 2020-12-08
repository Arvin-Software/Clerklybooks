<?php
  session_start();
  include '../../classes/khatral.php';
  include '../../classes/inventor.php';
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
    <style>
         #tablex tr:last-child td:first-child {
            border-bottom-left-radius: 15px;
            
        }

        #tablex tr:last-child td:last-child {
            border-bottom-right-radius: 15px;
            
        }
        #tablex th:last-child{
            border-top-right-radius: 15px;
        }
        #tablex th:first-child{
            border-top-left-radius: 15px;
        }
        #tablex{
            border-radius: 20px 20px 20px 20px;
        }
    </style>
</head>
<body class="bg-light" style="background-color: #FFFFFF;" oncontextmenu="return false;">
<div class="container-fluid bg-white border bor-none" style="padding: 1% 1% 1% 1%; margin-top: 1%; width: 98vw;">
    <a href="srb.php" class="btn btn-outline-success bor-none" style="margin-top: 0%;"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a> 
    <h5>Inventory Name : <?php echo $_GET['nm']; ?></h5>
    <table class="table table-striped border" id="table" style="">
            <tr class="bg-primary text-white">
                <th>Sl.No</th>
                <th>Date</th>
                <th>GRN No</th>
                <th>Supplier Name</th>
                <th>DC Quantity</th>
                <th>Actual Quantity</th>
                <th>Rejected Quantity</th>
                <th>Final Quantity</th>
                <!-- <th>Rate</th>
                <th>Amount</th> -->
            </tr>
            <?php
            $quant = 0;
            $count = 0;
            $ret = khatral::Khquery('SELECT * FROM grnitems WHERE itemnm=:nm AND usr=:instnm' , array(':nm'=>$_GET['nm'], ':instnm'=>$_SESSION['instnm']));
            foreach($ret as $p){
                
                $res = khatral::khquery('SELECT * FROM grn WHERE grn_id=:entryid', array(':entryid'=>$p['grnid']));
                foreach($res as $pi){
                    $count += 1;
                    $quant += $p['accquant'];
                    $dt = $pi['dt'];
                    $podate = date("d-m-Y", strtotime($dt));
                    echo '<tr class="w3-border-top"><td>' . $count . '</td><td>' . $podate . '</td><td>' . $pi['grn_no'] . '</td>';
                    echo '<td>' . $pi['suppnm'] . '</td>';
                    echo '<td class="w3-border-left">' . $p['invquant'] . '</td>';
                    echo '<td>' . $p['actquant'] . '</td>';
                    echo '<td>' . $p['rejquant'] . '</td>';
                    echo '<td>' . $p['accquant'] . '</td></tr>';
                }
                // echo '<td class="w3-border-left">' . $p['rte'] . '</td>';
                // echo '<td class="w3-border-left">' . $p['tot'] . '</td></tr>';
            }
            // echo '</table>';
            if($count <= 0 ){
                echo '<tr><td>No Items to display</td></tr>';
            }
            ?>
            <tr class="bg-primary text-white">
                <th>Sl.No</th>
                <th>Date</th>
                <th>GIN No</th>
                <th>GRS No</th>
                <th></th>
                <th></th>
                <th>Requested Quantity</th>
                <th>Issued Quantity</th>
            </tr>
            <?php
            $quant1 = 0;
            $count = 0;
            $ret = khatral::Khquery('SELECT * FROM ginitems WHERE itemnm=:nm' , array(':nm'=>$_GET['nm']));
            foreach($ret as $p){
                
                $res = khatral::khquery('SELECT * FROM gin WHERE gin_id=:entryid', array(':entryid'=>$p['ginid']));
                foreach($res as $pi){
                    $count+=1;
                    $dt = $pi['dt'];
                    $podate = date("d-m-Y", strtotime($dt));
                    $quant1 += $p['issquant'];
                    echo '<tr><td>' . $count . '</td><td>' . $podate . '</td><td>' . $pi['gin_no'] . '</td><td>' . $pi['grs_no'] . '</td><td></td><td></td><td>' . $p['reqquant'] . '</td><td>' . $p['issquant'] . '</td></tr>'; 
                }
            }
            if($count <= 0 ){
                echo '<tr><td>No Items to display</td></tr>';
            }
            ?>
            <tr>
            <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Opening</b></td>
                <td><?php echo $_GET['open']; ?></td>

            </tr>
            <tr>
            <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Add</b></td>
                <td><?php echo $quant; ?></td>

            </tr>
            <tr>
            <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Sub</b></td>
                <td><?php echo $quant1; ?></td>

            </tr>
            <tr>
            <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Grand total</b></td>
                <td><?php echo $_GET['tot']; ?></td>

            </tr>
        </table>
    </div>
   