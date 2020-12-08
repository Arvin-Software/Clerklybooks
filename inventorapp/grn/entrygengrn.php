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
<body class="bg-light" style="background-color: #FFFFFF;" oncontextmenu="return false;">
    <?php
          if(isset($_POST['submit'])){
            inventor::insertGRN($_POST['grnno'], $_POST['dt'], $_POST['dcno'], $_POST['supnm'], '', '');
            // inventor::insertdet($_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dcno'], $_SESSION['instnm']);
            $ret = khatral::khquery('SELECT * FROM grn WHERE inst=:usr ORDER BY grn_id DESC LIMIT 1', array(':usr'=>$_SESSION['instnm']));
            $val = '';
            foreach($ret as $p){
                $val = $p['grn_id'];
            }
            $loopval = $_POST['totprod'];
            for($i = 0; $i <= $loopval; $i++){
                if(isset($_POST['itemnm' . $i])){
                    // echo "Exists " . $i . '<br />';
                                inventor::insertitemsGRN($_POST['itemnm' . $i], $_POST['quant' . $i], $_POST['actquant' . $i], $_POST['rejquant' . $i], $_POST['finquant' . $i], $val);
                                inventor::updateSRB($_POST['itemnm' . $i], $_POST['finquant' . $i]);
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
    <div class="container-fluid bor-none border" style="background-color: #FFFFFF; padding: 2% 2% 2% 2%; margin: 1% 1% 1% 1%; width: 96vw;">
        <h4><i class="fas fa-file-invoice"></i>&nbsp;Stock entry / Generate or view GRN</h4>
        <a href="stockentry.php" class="btn btn-outline-success bor-none"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
        <?php
        $ret = khatral::khquery('SELECT * FROM grnitems WHERE grnid=:dcno', array(':dcno'=>$_GET['id']));
        $count =0;
        foreach($ret as $p){
            $count += 1;
        }
        if($count > 0){
    ?>
    <div class="container-fluid bg-primary text-white bor-none" style="padding: 1% 1% 1% 1%;">
        <?php
            $ret = khatral::khquery('SELECT * FROM grn WHERE grn_id=:entryid', array(':entryid'=>$_GET['id']));
            foreach($ret as $p){
                echo 'Date : ' . $p['dt'] . '<br />';
                echo 'Supplier Name : ' . $p['suppnm'] . '<br />';
                echo 'GRN Number : ' . $p['grn_no'] . '<br />';
                echo 'DC No : ' . $p['dcno'] . '<br />';
            }
        ?>
    </div>
    <div class="container-fluid bg-white bor-ten" style="padding: 0% 0% 0% 0%; margin-top: 2%;"> 
        <table class="table table-bordered" id="here_table">
            <tr class="bg-primary text-white">
                <th style="width: 450px;">Item Details</th>
                <th>DC Quantity</th>
                <th>Actual Quantity</th>
                <th>Rejected Quantity</th>
                <th>Final Quantity</th>
                <!-- <th>Rate</th>
                <th>Amount</th> -->
            </tr>
            <?php
            $ret = khatral::Khquery('SELECT * FROM grnitems WHERE grnid=:entrymo' , array(':entrymo'=>$_GET['id']));
            foreach($ret as $p){
                echo '<tr class="w3-border-top"><td class="w3-border-left">' . $p['itemnm'] . '</td>';
                echo '<td class="w3-border-left">' . $p['invquant'] . '</td>';
                echo '<td>' . $p['actquant'] . '</td>';
                echo '<td>' . $p['rejquant'] . '</td>';
                echo '<td>' . $p['accquant'] . '</td></tr>';
                // echo '<td class="w3-border-left">' . $p['rte'] . '</td>';
                // echo '<td class="w3-border-left">' . $p['tot'] . '</td></tr>';
            }
            ?>
        </table>
    </div>
        <?php
        }else{
        $ret = khatral::khquery('SELECT * FROM entrydc WHERE dc_id=:id', array(':id'=>$_GET['id']));
        $dt = '';
        $supnm = '';
        $dcno = '';
        foreach($ret as $p){
            $dt = $p['dt'];
            $supnm = $p['suppnm'];
            $dcno = $p['dcno'];
        }
        ?>
        <form action="entrygengrn.php" method="post" class="" style="padding: 1% 0% 0% 0%;">
        <div class="form-group">
                Date
                <input type="date" name="dtx" id="dtx" autocomplete="off" class="form-control" disabled="" required="" value="<?php echo $dt; ?>">
                <input type="date" name="dt" id="dt" autocomplete="off" class="form-control" style="display: none;" required="" value="<?php echo $dt; ?>">
            </div>
            <div class="form-group">
                Supplier Name
                <input list="supnmx" autocomplete="off" id="supnms" name="supnms" class="form-control" disabled="" required="" value="<?php echo $supnm; ?>">
                <input list="supnmx" autocomplete="off" id="supnm" name="supnm" class="form-control" style="display: none;" required="" value="<?php echo $supnm; ?>">
                <?php
                date_default_timezone_set('Asia/Kolkata');
                 $date1 = date('dmYhis', time());
                    $ret = khatral::khquery('SELECT DISTINCT suppnm FROM entrymo WHERE inst=:inst', array(
                        ':inst'=>$_SESSION['instnm']
                    ));
                    echo '<datalist id="supnmx">';
                    foreach($ret as $p){
                        echo '<option>' . $p['suppnm'] . '</option>';
                    }
                ?>
            </div>
            <div class="form-group">
                DC No
                <input type="text" name="dcnox" id="dcnox" class="form-control" required="" placeholder="000000" disabled="" value="<?php echo $dcno; ?>">
                <input type="text" name="dcno" id="dcno" class="form-control" required="" placeholder="000000" style="display: none;"  value="<?php echo $dcno; ?>">
            </div>
            <div class="form-group">
                GRN No
                <input type="text" name="grnno" id="grnno" class="form-control" required="" value="<?php echo 'GRN' . $date1; ?>">
            </div>
            
            <div class="table-responsive">
            <table class="bg-light table table-bordered" id="here_table">
                <tr class="w3-light-grey">
                    <th style="width: 450px;">Item Details</th>
                    <th>Quantity in DC</th>
                    <th>Actual Quantity</th>
                    <th>Rejected Quantity</th>
                    <th>Final Quantity</th>
                </tr>
                <?php
                    $ret = khatral::khquery('SELECT * FROM itemsdc WHERE entrydc=:id', array(':id'=>$_GET['id']));
                    $i = 0;
                    foreach($ret as $p){
                        echo '<tr><td><select id="itemnm' . $i . '" name="itemnm' . $i . '" class="custom-select"><option>'. $p['itemnm'] . '</option></select></td>
                        <td><select id="quant' . $i . '" name="quant' . $i . '" class="custom-select"><option>' . $p['quant'] . '</option></select></td><td><input type="text" required="" id="actquant' . $i . '" name="actquant' . $i . '" class="form-control"></td>
                        <td><input type="text" id="rejquant' . $i . '" name="rejquant' . $i . '" required="" class="form-control"></td><td><input type="text" id="finquant' . $i . '" name="finquant' . $i . '" required="" class="form-control"></td></tr>';
                        $i += 1;
                    }
                ?>
            </table>
                </div>
                <div class="form-group" style="display: none;">
                Total Products
                <input type="text" name="totprod" id="totprod" class="form-control" required="" value="<?php echo $i; ?>">
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-outline-primary bor-none"><i class="far fa-save"></i>&nbsp;&nbsp;Save</button>
            <!-- <input type="submit" value="Save" class="btn btn-primary" id="submit" name="submit" style="margin-top: 20px;"> -->
        </form>
    </div>
    <?php
        }
        ?>
         <script src="interface.js"></script>
</body>