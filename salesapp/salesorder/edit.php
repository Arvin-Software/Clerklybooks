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
  
    <link rel="stylesheet" href="../../css/softview.css">
    <link rel="stylesheet" href="../../css/all.css">
</head>
<body class="bg-light">
    <?php
      date_default_timezone_set('Asia/Kolkata');
      $date1 = date('dmYhis', time());
          if(isset($_POST['submit'])){
            // inventor::insertGIN($_POST['ginno'], $_POST['dt'], $_POST['grsno'], $_POST['dept']);
            // if($_POST['stat'] == "Sales Order"){
            //     inventor::insertEntrySo($_POST['dt'], $_POST['dept'], $_POST['pono'], '', $_POST['valid'], $_POST['stat']);
            // }else if($_POST['stat'] == "Invoice"){
            //     inventor::insertEntrySo($_POST['dt'], $_POST['dept'], '', $_POST['pono'], $_POST['valid'], $_POST['stat']);
            // }else{
            //     inventor::insertEntrySo($_POST['dt'], $_POST['dept'], $_POST['pono'], '', $_POST['valid'], $_POST['stat']);
            // }
            
            // inventor::insertdet($_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dcno'], $_SESSION['instnm']);
            // $ret = khatral::khquery('SELECT * FROM entryso WHERE inst=:usr ORDER BY entryid DESC LIMIT 1', array(':usr'=>$_SESSION['instnm']));
            // $val = '';
            // foreach($ret as $p){
            //     $val = $p['entryid'];
            // }
            $loopval = $_POST['num'];
            khatral::khquery('DELETE FROM itemsso WHERE entrypo=:id', array(
                ':id'=>$_GET['id']
            ));
            khatral::khquery('UPDATE entryso SET dt=:dt, sono=:sono, validity=:valid, stat=:stat WHERE entryid=:id', array(
                ':dt'=>$_POST['dt'],
                ':sono'=>$_POST['pono'],
                ':valid'=>$_POST['valid'],
                ':stat'=>$_POST['stat'],
                ':id'=>$_GET['id']
            ));
            for($i = 0; $i <= $loopval; $i++){
                if(isset($_POST['prod' . $i])){
                    echo "Exists " . $i . '<br />';
                    
                    inventor::insertItemsSo($_POST['prod' . $i], $_POST['hsn' . $i], $_POST['dt' . $i], $_POST['rt' . $i], $_POST['cgstper' . $i], $_POST['sgstper' . $i], $_POST['amt' . $i], $_GET['id']);
                    
                    // inventor::insertGINItems($_POST['it' . $i], $_POST['dt' . $i], $_POST['rt' . $i], $val);
                    // inventor::updateSRBMinus($_POST['it' . $i], $_POST['rt' . $i], 1);
                    // inventor::insertDeptStock($_POST['it'.$i], $_POST['dt'], $_POST['ginno'], $_POST['grsno'], $_POST['dt' . $i], $_POST['rt' . $i], $_POST['dept']);
                                // inventor::insertsrb($_POST['it' . $i], $_POST['dcno'], $_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dt'], $_POST['dt'. $i], $_POST['rt' . $i], $_POST['amt'. $i], "", "", $_SESSION['unme']);
                                // invent::insertdaybook($_POST['dcno'], $date1, $_POST['supnm'], $_POST['invno'], $_POST['it' . $i], $_POST['dt' . $i], "", "", "", "", "", $_POST['rt' . $i], "", $_SESSION['unme']);
                            
                           
                }else{
                    // echo "Not Exists " . $i . '<br />';
                }
            }
            khatral::khquery('UPDATE totandtaxso SET fright=:fright, discounts=:dis, terms=:terms WHERE poid=:id', array(
                ':fright'=>$_POST['fri'],
                ':dis'=>$_POST['dis'],
                ':terms'=>$_POST['terms'],
                ':id'=>$_GET['id']
            ));
            // inventor::insertSotxTot($_POST['fri'], $_POST['dis'], $_POST['terms'], $val);
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Sales Order updated successfully.
          </div>';
          header("Location: po.php");
        }
    ?>
    <div class="container-fluid bor-none border" style="width: 97vw; padding-top: 2%; background-color: #FFFFFF; padding: 2% 2% 2% 2%;">
        <h4><i class="fas fa-file-invoice"></i>&nbsp;<?php echo $_GET['stat']; ?> / Edit entry</h4>
        <a href="po.php" class="btn btn-success bor-ten"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
        <h2 class="float-right">Total : <input type="text" id="totl" name="totl" class="" disabled="" style="font-size: 32px; text-align: right; width: 10em;background-color: #fff; border:none;" value="0.0"></h2>
        <?php
            $dt = '';
            $quot = '';
            $valid = '';
            $stat = '';
            $ret = khatral::khquery('SELECT * FROM entryso WHERE entryid=:id', array(
                ':id'=>$_GET['id']
            ));
            foreach($ret as $p){
                $dt = $p['dt'];
                $quot = $p['sono'];
                $valid = $p['validity'];
                $stat = $p['stat'];
            }
        ?>
        <form action="edit.php?id=<?Php echo $_GET['id']; ?>" method="post" class="" style="">
            <div class="form-group">
                Date
                <input type="date" name="dt" id="dt" value="<?php echo $dt; ?>" autocomplete="off" class="form-control" required="">
            </div>
            <div class="form-group">
                Quote / Order / Invoice Number
                <input type="text" autocomplete="off" value="<?php echo $quot; ?>" id="pono" name="pono" class="form-control"  required="">
                
            </div>
            <div class="form-group">
                Type
                <select name="stat" id="stat" class="custom-select">
                <?php
                if($stat == "Quote"){
                    echo '<option selected>Quote</option>';
                }else{
                    echo '<option>Quote</option>';                   
                } 
                
                if($stat == "Sales Order"){
                    echo '<option selected>Sales Order</option>';
                }else{
                    echo '<option>Sales Order</option>';
                }
                if($stat == "Invoice"){
                    echo '<option selected>Invoice</option>';
                }else{
                    echo '<option>Invoice</option>';
                }
                ?>  
                </select>
            </div>
            <div class="form-group">
                Valid upto
                <input type="date" name="valid" id="valid" value="<?php echo $valid; ?>" class="form-control"  required="">
            </div>
           
            
            <div class="table-responsive">
            <table class="bg-light table table-bordered" id="here_table">
                <a href="#" class="btn btn-primary float-right" id="addbut" name="addbut">Add row</a><br />
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
                <?php
                    $a = 1;
                    $ret = khatral::khquery('SELECT * FROM itemsso WHERE entrypo=:id', array(
                        ':id'=>$_GET['id']
                    ));
                    foreach($ret as $p){
                        echo '<tr><td>';
                        echo '<select id="prod' . $a . '" name="prod' . $a . '" class="custom-select">';
                        echo '<option>' . $p['itemnm'] . '</option>';
                        echo '</select>';
                        echo '</td>';
                        echo '<td><input type="text" id="hsn' . $a . '" name="hsn' . $a . '" class="form-control" value="' . $p['hsn'] . '" required=""></td>';
                        echo '<td><input type="text" id="dt' . $a . '" name="dt' . $a . '" class="form-control accx" value="' . $p['quant'] . '" required=""></td>';
                        echo '<td><input type="text" id="rt' . $a . '" name="rt' . $a . '" class="form-control" value="' . $p['rte'] . '" required=""></td>';
                        echo '<td><input type="text" id="cgstper' . $a . '" name="cgstper' . $a . '" class="form-control" value="' . $p['cgst'] . '" required=""></td>';
                        echo '<td><input type="text" id="sgstper' . $a . '" name="sgstper' . $a . '" class="form-control" value="' . $p['sgst'] . '" required=""></td>';
                        echo '<td><input type="text" id="amt' . $a . '" name="amt' . $a . '" class="form-control" value="' . $p['tot'] . '" required=""></td>';
                        echo '<td><button type="button" id="deletebut" name="deletebut" class="btn btn-danger btndeleterowadded">X</button></td>';
                        echo '</tr>';
                        $a += 1;
                    }
                ?>
            </table>
            </div>
            <?php
                $fright = '';
                $dis = '';
                $terms = '';
                $ret = khatral::khquery('SELECT * FROM totandtaxso WHERE poid=:id', array(
                    ':id'=>$_GET['id']
                ));
                foreach($ret as $p){
                    $fright = $p['fright'];
                    $dis = $p['discounts'];
                    $terms = $p['terms'];
                }
            ?>
            <table class="table">
                <tr>
                    <td style="width: 40%;"></td>
                    <td></td>
                    <td>Freight Cost</td>
                    <td><input type="text" value="<?php echo $fright; ?>" name="fri" id="fri" class="form-control" required=""></td>
                </tr>
                <tr>
                    <td style="width: 40%;"></td>
                    <td></td>
                    <td>Discount %</td>
                    <td><input type="text" name="dis" id="dis" value="<?php echo $dis; ?>" class="form-control" required=""></td>
                </tr>
            </table>
            <div class="form-group" style="display: none;">
                Total Products
                <input type="text" name="num" id="num" value="<?php echo $a; ?>" class="form-control" required="" >
            </div>
            <div class="form-group">
                Terms and Conditions
                <textarea name="terms" id="terms" cols="30" rows="5" class="form-control" required=""><?php echo $terms; ?></textarea>
            </div>
            <input type="submit" value="Save" class="btn btn-primary" id="submit" name="submit" style="margin-top: 20px;">
        </form>
    </div>
         <script src="interfaceso.js"></script>
</body>