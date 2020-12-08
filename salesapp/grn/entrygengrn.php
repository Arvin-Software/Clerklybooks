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
    <link rel="stylesheet" href="../../all.css">
    <link rel="stylesheet" href="../../css/softview.css">
</head>
<body class="" style="background-color: #FFFFFF;">
    <?php
          if(isset($_POST['submit'])){
            inventor::insertGRNSales($_POST['grnno'], $_POST['dt'], '', '', '', '');
            // inventor::insertdet($_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dcno'], $_SESSION['instnm']);
            $ret = khatral::khquery('SELECT * FROM grnsales WHERE inst=:usr ORDER BY grn_id DESC LIMIT 1', array(':usr'=>$_SESSION['instnm']));
            $val = '';
            foreach($ret as $p){
                $val = $p['grn_id'];
            }
            $loopval = $_POST['totprod'];
            for($i = 0; $i <= $loopval; $i++){
                if(isset($_POST['it' . $i])){
                    // echo "Exists " . $i . '<br />';
                                inventor::insertitemsGRNSales($_POST['it' . $i], '', '' , '', $_POST['dt' . $i], $val);
                                inventor::updateSalesSRB($_POST['it' . $i], $_POST['dt' . $i]);
                                // inventor::insertitemsGRN(0,0,0,0,0,0);
                                // inventor::insertitemGRN($_POST['item' . $i], $_POST['dt' . $i], $_POST['rt' . $i], $_POST['amt' . $i], $val);
                                // inventor::insertsrb($_POST['it' . $i], $_POST['dcno'], $_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dt'], $_POST['dt'. $i], $_POST['rt' . $i], $_POST['amt'. $i], "", "", $_SESSION['unme']);
                                // invent::insertdaybook($_POST['dcno'], $date1, $_POST['supnm'], $_POST['invno'], $_POST['it' . $i], $_POST['dt' . $i], "", "", "", "", "", $_POST['rt' . $i], "", $_SESSION['unme']);
                            
                           
                }else{
                    // echo "Not Exists " . $i . '<br />';
                }
            }
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> invoice entered successfully.
          </div>';
          header("Location: stockentry.php");
        }
    ?>
    <div class="container-fluid bor-twen shadow border" style="background-color: #FFFFFF; padding: 2% 2% 2% 2%; margin: 1% 1% 1% 1%; width: 96vw;">
        <h4><i class="fas fa-file-invoice"></i>&nbsp;Stock entry / Generate GRN</h4>
        <a href="stockentry.php" class="btn btn-success bor-ten"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
        <form action="entrygengrn.php" method="post" class="" style="padding: 1% 2% 2% 2%;">
        <div class="form-group">
                Date
                <input type="date" name="dt" id="dt" autocomplete="off" class="form-control"  required="" value="<?php echo $dt; ?>">
            </div>
                <?php
                date_default_timezone_set('Asia/Kolkata');
                 $date1 = date('dmYhis', time());
                    
                ?>
           
            <div class="form-group">
                GRN No
                <input type="text" name="grnno" id="grnno" class="form-control" required="" value="<?php echo 'GRN' . $date1; ?>">
            </div>
            
            <div class="table-responsive">
            <table class="bg-light table table-bordered" id="here_table">
                <tr class="w3-light-grey">
                    <th style="width: 450px;">Item Details</th>
                   <th>Quantity</th>
                   <th>Action</th>
                </tr>
                
            </table>
                </div>
                <div class="form-group">
                Total Products
                <input type="text" name="totprod" id="totprod" class="form-control" required="" value="<?php echo $i; ?>">
            </div>
            <input type="submit" value="Save" class="btn btn-primary" id="submit" name="submit" style="margin-top: 20px;">
        </form>
    </div>
    
         <script src="interface.js"></script>
</body>