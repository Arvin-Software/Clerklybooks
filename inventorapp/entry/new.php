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
<body class="bg-light" oncontextmenu="return false;">
    <?php
          if(isset($_POST['submit'])){
            inventor::insertdet($_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dcno'], $_POST['vehno'], $_SESSION['instnm']);
            $ret = khatral::khquery('SELECT * FROM entrymo WHERE inst=:usr ORDER BY entryid DESC LIMIT 1', array(':usr'=>$_SESSION['instnm']));
            $val = '';
            foreach($ret as $p){
                $val = $p['entryid'];
            }
            $loopval = $_POST['totprod'];
            for($i = 0; $i <= $loopval; $i++){
                if(isset($_POST['it' . $i])){
                    // echo "Exists " . $i . '<br />';
                            
                            
                                inventor::insertitem($_POST['it' . $i], $_POST['dt' . $i], $_POST['rt' . $i], $_POST['cgst' . $i], $_POST['sgst' . $i], $_POST['amt' . $i], $val);
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
          header("Location: invoice.php");
        }
    ?>
    <div class="container-fluid bor-none border" style="margin-top: 1%; margin-bottom: 2%; width: 97vw; padding: 0% 2% 2% 2%; background-color: #FFFFFF;">
        <h4> <a href="invoice.php" class="btn btn-success bor-none"><i class="far fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;<i class="fas fa-file-invoice"></i>&nbsp;Invoice entry / New entry</h4>
       
        <form action="new.php" method="post" class="bg-white bor-ten " style="">
            <div class="form-group">
                Date
                <input type="date" name="dt" id="dt" autocomplete="off" style="width: 20%;" class="form-control" required="">
            </div>
            <div class="form-group">
                Supplier Name
                <select name="supnm" id="supnm" class="custom-select">
                    <?php
                        date_default_timezone_set('Asia/Kolkata');
                        $date1 = date('dmYhis', time());
                        $ret = khatral::khquery('SELECT * FROM cont_list WHERE typ=:typ AND acc=:inst', array(
                            ':typ'=>"s",
                            ':inst'=>$_SESSION['instnm']
                        ));
                        foreach($ret as $p){
                            echo '<option>' . $p['cont_nm'] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                Invoice No
                <input type="text" name="invno" id="invno" class="form-control" required="">
            </div>
            <div class="form-group">
                EWay bill / DC No
                <input type="text" name="dcno" id="dcno" class="form-control" required="">
            </div>
            <div class="form-group">
                Vehicle Number
                <input type="text" name="vehno" id="vehno" class="form-control" required="">
            </div>
            <div class="form-group" style="display: none;">
                Total Products
                <input type="text" name="totprod" id="totprod" class="form-control" required="" >
            </div>
            <table class="bg-light table table-bordered" id="here_table">
                <a href="#" class="btn btn-primary float-right" id="addbut" name="addbut">Add row</a><br />
                <tr class="w3-light-grey">
                    <th style="width: 450px;">Item Details</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>CGST %</th>
                    <th>SGST/IGST %</th>
                    <th>Amount</th>
                    <th>Actions</th>
                </tr>
                      
            </table>
        
            <input type="submit" value="Save" class="btn btn-primary" id="submit" name="submit" style="margin-top: 20px;">
        </form>
    </div>
         <script src="interface.js"></script>
</body>