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
    <link rel="stylesheet" href="../../css/all.css">
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
<body class="" style="background-color: #FFFFFF;">
<div class="container-fluid bg-white shadow border bor-ten" style="padding: 1% 1% 1% 1%; margin-top: 1%; width: 98vw;">
    <a href="srb.php" class="btn btn-success bor-ten" style="margin-top: 0%;"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a> 
    <h5>Inventory Name : <?php echo $_GET['nm']; ?></h5>
    <table class="table table-striped border" id="tablex" style="border-collapse: separate; border-spacing: 0px;">
            <tr class="bg-primary text-white">
                <th>Sl.No</th>
                <th>Date</th>
                <th>GRN No</th>
                <th>Quantity</th>
                <!-- <th>Rate</th>
                <th>Amount</th> -->
            </tr>
            <?php
            $quant = 0;
            $count = 0;
            $ret = khatral::Khquery('SELECT * FROM grnsalesitems WHERE itemnm=:nm AND usr=:instnm' , array(':nm'=>$_GET['nm'], ':instnm'=>$_SESSION['instnm']));
            foreach($ret as $p){
                
                $res = khatral::khquery('SELECT * FROM grnsales WHERE grn_id=:entryid', array(':entryid'=>$p['grnid']));
                foreach($res as $pi){
                    $count += 1;
                    $quant += $p['accquant'];
                    echo '<tr class="w3-border-top"><td>' . $count . '</td><td>' . $pi['dt'] . '</td><td>' . $pi['grn_no'] . '</td>';
                   
                    echo '<td>' . $p['accquant'] . '</td></tr>';
                }
                // echo '<td class="w3-border-left">' . $p['rte'] . '</td>';
                // echo '<td class="w3-border-left">' . $p['tot'] . '</td></tr>';
            }
            ?>
            <tr class="bg-primary text-white">
                <th>Sl.No</th>
                <th>Date</th>
                <th>Invoice No</th>
                <th>Quantity</th>
            </tr>
            <?php
            $quant1 = 0;
            $count = 0;
            // $ret = khatral::Khquery('SELECT * FROM ginsalesitems WHERE itemnm=:nm' , array(':nm'=>$_GET['nm']));
            // foreach($ret as $p){
                
            //     $res = khatral::khquery('SELECT * FROM ginsales WHERE gin_id=:entryid', array(':entryid'=>$p['ginid']));
            //     foreach($res as $pi){
            //         $count+=1;
            //         $quant1 += $p['issquant'];
            //         echo '<tr><td>' . $count . '</td><td>' . $pi['dt'] . '</td><td>' . $pi['gin_no'] . '</td><td>' . $pi['grs_no'] . '</td><td></td><td></td><td>' . $p['reqquant'] . '</td><td>' . $p['issquant'] . '</td></tr>'; 
            //     }
            // }
            ?>
            <tr>
           
                <td></td>
                <td></td>
                
                <td><b>Opening</b></td>
                <td><?php echo $_GET['open']; ?></td>

            </tr>
            <tr>
            
                <td></td>
                <td></td>
               
                <td><b>Add</b></td>
                <td><?php echo $quant; ?></td>

            </tr>
            <tr>
            
                <td></td>
                <td></td>
               
                <td><b>Sub</b></td>
                <td><?php echo $quant1; ?></td>

            </tr>
            <tr>
            
                <td></td>
                <td></td>
               
                <td><b>Grand total</b></td>
                <td><?php echo $_GET['tot']; ?></td>

            </tr>
        </table>
    </div>
   