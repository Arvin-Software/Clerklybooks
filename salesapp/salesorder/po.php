<?php
  session_start();
  include '../../classes/khatral.php';
  include '../../classes/inventor.php';
  if(isset($_GET['typ'])){
      $dcno = '';
      $ret = khatral::khquery('SELECT * FROM dc_entry WHERE entrypo=:id AND inst=:inst', array(
          ':id'=>$_GET['id'],
          ':inst'=>$_SESSION['instnm']
      ));
      $count = 0;
      foreach($ret as $p){
          $dcno = $p['dc_no'];
          $count+= 1;
      }
      if($count == 0){
        $ret = khatral::khquery('SELECT * FROM itemsso WHERE entrypo=:id', array(
            ':id'=>$_GET['id']
        ));
        date_default_timezone_set('Asia/Kolkata');
        $date1 = date('dmYhis', time());
        khatral::khquery('INSERT INTO dc_entry VALUES(NULL, :dcno, :entrypo, :inst)', array(
            ':dcno'=>'DC' . $date1,
            ':entrypo'=>$_GET['id'],
            ':inst'=>$_SESSION['instnm']
        ));
        foreach($ret as $p){
            
            inventor::updateSalesSRBMinus($p['itemnm'], $p['quant'], 1);
        }
    }else{
        header('Location: viewdc.php?id=' . $_GET['id'] . '&stat=Delivery Challan&no=' . $dcno);
    }
  }
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
</head>
<body class="bg-light">
    <div class="container-fluid bor-none border" style="padding-top: 0%; width: 98vw; background-color: #FFFFFF;">
        <!-- <h4><i class="fas fa-file-invoice"></i>&nbsp;Sales Order</h4> -->
        
        <div class="bg-white" style="padding: 0% 1% 1% 1%;">
        <a href="new.php" class="btn btn-outline-primary bor-none"><i class="fas fa-plus"></i>&nbsp;&nbsp;New</a>
        <table class="table table-bordered">
            <tr class="bg-primary text-white">
                <th>SL.NO</th>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Invoice Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            
            <?php
                $ret = khatral::khquery('SELECT * FROM entryso WHERE inst=:inst', array(':inst'=>$_SESSION['instnm']));
                $count = 0;
                foreach($ret as $p){
                    $count = $count + 1;
                    echo ' <tr class="">
                    <td>' . $count . '</td>
                    <td class="">' . $p['dt'] . '</td>
                    <td class="">' . $p['custnm'] . '</td>
                    <td class="">' . $p['sono'] . '</td>
                    <td><h3><span class="badge badge-primary">' . $p['stat'] . '</span></h3></td>';
                    if($p['stat'] == "Invoice"){
                        echo '<td><a href="view.php?id=' . $p['entryid'] . '&stat=' . $p['stat'] . '" style="" class="btn btn-outline-success bor-none"><i class="far fa-eye"></i></a><a href="po.php?id=' . $p['entryid'] . '&stat=' . $p['stat'] . '&typ=dc" style="" class="btn btn-outline-success bor-none">Generate / View DC</a></td>';
                    }else{
                    echo '<td class=""><a href="edit.php?id=' . $p['entryid'] . '&stat=' . $p['stat'] . '" style="" class="btn btn-outline-success bor-none"><i class="far fa-edit"></i></a>&nbsp;&nbsp;<a href="view.php?id=' . $p['entryid'] . '&stat=' . $p['stat'] . '" style="" class="btn btn-outline-success bor-none"><i class="far fa-eye"></i></a></td>';
                    }
                    echo '</tr>';
                }
            ?>        
        </table>
        </div>
    </div>
</body>