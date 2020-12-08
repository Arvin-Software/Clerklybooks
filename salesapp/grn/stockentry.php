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
    <link rel="stylesheet" href="../../css/all.css">
    <link rel="stylesheet" href="../../css/softview.css">
    <style>
        #tablex tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
            
        }

        #tablex tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
            
        }
        #tablex th:last-child{
            border-top-right-radius: 10px;
        }
        #tablex th:first-child{
            border-top-left-radius: 10px;
        }
        #tablex{
            border-radius: 10px 10px 10px 10px;
        }
    </style>
</head>
<body class="bg-light" style="">
    <div class="container-fluid bor-none border bg-white" style="padding: 2% 2% 2% 2%; margin: 1% 1% 1% 1%; width: 98vw;">
        <!-- <h4><i class="fas fa-truck-moving"></i>&nbsp;Stock entry</h4> -->
        <a href="entrygengrn.php" class="btn btn-primary bor-ten"><i class="far fa-plus-square"></i>&nbsp;&nbsp;Add new</a>
        <div class="" style="border-radius: 20px 20px 20px 20px;">
        <br />
        <div class="table-responsive">
        <table class="table table-striped border bg-white" id="tablex" style="border-collapse: separate; border-spacing: 0px;">
            <tr class="bg-primary text-white" style="">
                <th>SL.NO</th>
                <th>Date</th>
                <th>GRN Number</th>
            </tr>
            
            <?php
                $ret = khatral::khquery('SELECT * FROM grnsales WHERE inst=:inst', array(':inst'=>$_SESSION['instnm']));
                $count = 0;
                foreach($ret as $p){
                    $count = $count + 1;
                    echo ' <tr class="">
                    <td>' . $count . '</td>
                    <td class="">' . $p['dt'] . '</td>
                    <td>' . $p['grn_no'] . '</td>
                    <td class=""> 
                    </tr>';
                }
            ?>        
        </table>
        </div>
        </div>
    </div>
    <script src="interface.js"></script>
</body>