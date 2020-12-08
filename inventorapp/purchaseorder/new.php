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
    <link rel="stylesheet" href="../../css/all.css">
</head>
<body class="bg-light" oncontextmenu="return false;">
    <?php
      date_default_timezone_set('Asia/Kolkata');
      $date1 = date('dmYhis', time());
          if(isset($_POST['submit'])){
            // inventor::insertGIN($_POST['ginno'], $_POST['dt'], $_POST['grsno'], $_POST['dept']);
            inventor::insertEntryPo($_POST['dt'], $_POST['dept'], $_POST['pono']);
            // inventor::insertdet($_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dcno'], $_SESSION['instnm']);
            $ret = khatral::khquery('SELECT * FROM entrypo WHERE inst=:usr ORDER BY entryid DESC LIMIT 1', array(':usr'=>$_SESSION['instnm']));
            $val = '';
            foreach($ret as $p){
                $val = $p['entryid'];
            }
            $loopval = $_POST['num'];
            for($i = 0; $i <= $loopval; $i++){
                if(isset($_POST['prod' . $i])){
                    // echo "Exists " . $i . '<br />';
                            
                    inventor::insertItemsPo($_POST['prod' . $i], $_POST['hsn' . $i], $_POST['dt' . $i], $_POST['rt' . $i], $_POST['cgstper' . $i], $_POST['sgstper' . $i], $_POST['amt' . $i], $val);
                   
                    // inventor::insertGINItems($_POST['it' . $i], $_POST['dt' . $i], $_POST['rt' . $i], $val);
                    // inventor::updateSRBMinus($_POST['it' . $i], $_POST['rt' . $i], 1);
                    // inventor::insertDeptStock($_POST['it'.$i], $_POST['dt'], $_POST['ginno'], $_POST['grsno'], $_POST['dt' . $i], $_POST['rt' . $i], $_POST['dept']);
                                // inventor::insertsrb($_POST['it' . $i], $_POST['dcno'], $_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dt'], $_POST['dt'. $i], $_POST['rt' . $i], $_POST['amt'. $i], "", "", $_SESSION['unme']);
                                // invent::insertdaybook($_POST['dcno'], $date1, $_POST['supnm'], $_POST['invno'], $_POST['it' . $i], $_POST['dt' . $i], "", "", "", "", "", $_POST['rt' . $i], "", $_SESSION['unme']);
                            
                           
                }else{
                    // echo "Not Exists " . $i . '<br />';
                }
            }
            inventor::insertPotxTot($_POST['fri'], $_POST['dis'], $_POST['terms'], $val);
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Purchase Order created successfully.
          </div>';
          header("Location: po.php");
        }
    ?>
    <div class="container-fluid bor-none border" style="width: 98%; padding-left: 2%; padding-top: 2%; padding-bottom: 2%; background-color: #FFFFFF;">
        <h4><i class="fas fa-file-invoice"></i>&nbsp;Purchase Order / New entry</h4>
        <a href="po.php" class="btn btn-success bor-none"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
        <h2 class="float-right">Total : <input type="text" id="totl" name="totl" class="" disabled="" style="font-size: 32px; text-align: right; width: 10em;background-color: #fff; border:none;" value="0.0"></h2>
        <form action="new.php" method="post" class="bg-white bor-none " style="padding: 0% 0% 0% 0%;">
            <div class="form-group">
                Date
                <input type="date" name="dt" id="dt" autocomplete="off" class="form-control" required="">
            </div>
            <div class="form-group">
                PO Number
                <input type="text" value="PO<?php echo $date1; ?>" autocomplete="off" id="pono" name="pono" class="form-control" required="">
                
            </div>
            <div class="form-group">
                Supplier Name
                <select name="dept" id="dept" class="custom-select">
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
            <div class="form-group" style="display: none;">
                Total Products
                <input type="text" name="num" id="num" class="form-control" required="" >
            </div>
            <div class="table-responsive">
            <table class="bg-light table table-bordered" id="here_table">
                <a href="#" class="btn btn-primary bor-none float-right" id="addbut" name="addbut">Add row</a><br />
                <tr class="bg-primary text-white">
                    <th style="width: 250px;">Item Details</th>
                    <th>HSN Code</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>CGST %</th>
                    <th>SGST %</th>
                    <th style="width: 350px;">Amount</th>
                    <th>Action</th>
                </tr>  
                
            </table>
            </div>
            <table class="table">
                <tr>
                    <td style="width: 40%;"></td>
                    <td></td>
                    <td>Freight Cost</td>
                    <td><input type="text" name="fri" id="fri" class="form-control" required=""></td>
                </tr>
                <tr>
                    <td style="width: 40%;"></td>
                    <td></td>
                    <td>Discount %</td>
                    <td><input type="text" name="dis" id="dis" class="form-control" required=""></td>
                </tr>
            </table>
            <div class="form-group">
                Terms and Conditions
                <textarea name="terms" id="terms" cols="30" rows="5" class="form-control" required=""></textarea>
            </div>
            <input type="submit" value="Save" class="btn btn-primary bor-none" id="submit" name="submit" style="margin-top: 20px;">
        </form>
    </div>
         <script src="interface.js"></script>
</body>