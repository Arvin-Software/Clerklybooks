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
</head>
<body class="bg-light" style="padding: 2% 1% 1% 1%;" oncontextmenu="return false;">
    <h4><i class="fas fa-file-invoice"></i>&nbsp;Invoice entry / View entry</h4>
    <a href="gin.php" class="btn btn-success bor-ten"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
    <div class="container-fluid bg-primary text-white shadow bor-ten" style="padding: 1% 1% 1% 1%;">
        <?php
            $ret = khatral::khquery('SELECT * FROM gin WHERE gin_id=:entryid', array(':entryid'=>$_GET['id']));
            foreach($ret as $p){
                echo 'GIN No : ' . $p['gin_no'] . '<br />';
                echo 'DATE : ' . $p['dt'] . '<br />';
                echo 'GRS No : ' . $p['grs_no'] . '<br />';
                echo 'Dept : ' . $p['dept'] . '<br />';
            }
        ?>
    </div>
    <div class="container-fluid bg-white shadow bor-ten" style="padding: 1% 1% 1% 1%; margin-top: 1%;"> 
        <table class="table table-bordered" id="here_table">
            <tr class="bg-primary text-white">
                <th style="width: 450px;">Item Details</th>
                <th>Request Quantity</th>
                <th>Issued Quantity</th>
            </tr>
            <?php
            $ret = khatral::Khquery('SELECT * FROM ginitems WHERE ginid=:entrymo' , array(':entrymo'=>$_GET['id']));
            foreach($ret as $p){
                echo '<tr class="w3-border-top"><td class="w3-border-left">' . $p['itemnm'] . '</td>';
                echo '<td class="w3-border-left">' . $p['reqquant'] . '</td>';
                echo '<td class="w3-border-left">' . $p['issquant'] . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
