<?php
  session_start();
  include '../classes/khatral.php';
//   include '../../classes/invento.php';
//   if(isset($_GET['typ'])){
//       $dcno = '';
//       $ret = khatral::khquery('SELECT * FROM dc_entry WHERE entrypo=:id AND inst=:inst', array(
//           ':id'=>$_GET['id'],
//           ':inst'=>$_SESSION['instnm']
//       ));
//       $count = 0;
//       foreach($ret as $p){
//           $dcno = $p['dc_no'];
//           $count+= 1;
//       }
//       if($count == 0){
//         $ret = khatral::khquery('SELECT * FROM itemsso WHERE entrypo=:id', array(
//             ':id'=>$_GET['id']
//         ));
//         date_default_timezone_set('Asia/Kolkata');
//         $date1 = date('dmYhis', time());
//         khatral::khquery('INSERT INTO dc_entry VALUES(NULL, :dcno, :entrypo, :inst)', array(
//             ':dcno'=>'DC' . $date1,
//             ':entrypo'=>$_GET['id'],
//             ':inst'=>$_SESSION['instnm']
//         ));
//         foreach($ret as $p){
            
//             inventor::updateSalesSRBMinus($p['itemnm'], $p['quant'], 1);
//         }
//     }else{
//         header('Location: viewdc.php?id=' . $_GET['id'] . '&stat=Delivery Challan&no=' . $dcno);
//     }
//   }
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
<body class="">
    <div class="container-fluid bor-ten" style="padding-top: 2%; background-color: #FFFFFF;">
        <h4><i class="fas fa-file-invoice"></i>&nbsp;Add New SO</h4><a href="../../switcher.php" class="btn btn-success">Back</a>
        <a href="items.php" class="btn btn-primary bor-ten"><i class="far fa-plus-square"></i>&nbsp;&nbsp;Add new</a>
        <div class="bg-white shadow bor-ten" style="padding: 1% 1% 1% 1%;">
        <table class="table table-bordered">
            <tr class="bg-primary text-white">
                <th>SL.NO</th>
                <th>Date</th>
                <th>Customer Name</th>
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
                    <td class="">' . $p['custnm'] . '</td>';
                    if($p['stat'] == "Invoice"){
                        echo '<td><a href="view.php?id=' . $p['entryid'] . '&stat=' . $p['stat'] . '" style="" class="btn btn-primary bor-ten">View</a><a href="po.php?id=' . $p['entryid'] . '&stat=' . $p['stat'] . '&typ=dc" style="" class="btn btn-primary bor-ten">Generate / View DC</a></td>';
                    }else{
                    echo '<td class=""><a href="view.php?id=' . $p['entryid'] . '&stat=Temp Invoice" style="" class="btn btn-primary bor-ten">View</a></td>';
                    }
                    echo '</tr>';
                }
            ?>        
        </table>
        </div>
    </div>
</body>