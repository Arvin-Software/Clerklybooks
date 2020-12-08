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
          if(isset($_POST['submit'])){
            inventor::insertGIN($_POST['ginno'], $_POST['dt'], $_POST['grsno'], $_POST['dept']);
            // inventor::insertdet($_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dcno'], $_SESSION['instnm']);
            $ret = khatral::khquery('SELECT * FROM gin WHERE inst=:usr ORDER BY gin_id DESC LIMIT 1', array(':usr'=>$_SESSION['instnm']));
            $val = '';
            foreach($ret as $p){
                $val = $p['gin_id'];
            }
            $loopval = $_POST['totprod'];
            for($i = 0; $i < $loopval; $i++){
                if(isset($_POST['it' . $i])){
                    // echo "Exists " . $i . '<br />';
                            
                            
                    inventor::insertGINItems($_POST['it' . $i], $_POST['dt' . $i], $_POST['rt' . $i], $val);
                    inventor::updateSRBMinus($_POST['it' . $i], $_POST['rt' . $i], 1);
                    inventor::insertDeptStock($_POST['it'.$i], $_POST['dt'], $_POST['ginno'], $_POST['grsno'], $_POST['dt' . $i], $_POST['rt' . $i], $_POST['dept']);
                                // inventor::insertsrb($_POST['it' . $i], $_POST['dcno'], $_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dt'], $_POST['dt'. $i], $_POST['rt' . $i], $_POST['amt'. $i], "", "", $_SESSION['unme']);
                                // invent::insertdaybook($_POST['dcno'], $date1, $_POST['supnm'], $_POST['invno'], $_POST['it' . $i], $_POST['dt' . $i], "", "", "", "", "", $_POST['rt' . $i], "", $_SESSION['unme']);
                            
                           
                }else{
                    // echo "Not Exists " . $i . '<br />';
                }
            }
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Goods Issue Note created successfully.
          </div>';
          header("Location: gin.php");
        }
    ?>
    <div class="container-fluid bor-none border" style="padding: 2% 2% 2% 2%; width: 97vw; margin-bottom: 5%; background-color: #FFFFFF;">
        <h4><i class="fas fa-file-invoice"></i>&nbsp;Goods Issue Note / New entry</h4>
        <a href="gin.php" class="btn btn-outline-success bor-none"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
        <form action="new.php" method="post" class="" style="">
            <div class="form-group">
                Date
                <input type="date" name="dt" id="dt" autocomplete="off" class="form-control" required="">
            </div>
            <div class="form-group">
                Goods Request Slip No
                <input type="text"  autocomplete="off" id="grsno" name="grsno" class="form-control" required="">
                
            </div>
            <div class="form-group">
                Department
                <select name="dept" id="dept" class="custom-select">
                    <?php
                        date_default_timezone_set('Asia/Kolkata');
                        $date1 = date('dmYhis', time());
                        $ret = khatral::khquery('SELECT * FROM instdept WHERE deptinst=:inst', array(
                            ':inst'=>$_SESSION['instnm']
                        ));
                        foreach($ret as $p){
                            echo '<option>' . $p['deptnm'] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                Goods Issue Note No
                <input type="text" name="ginno" id="ginno" class="form-control" required="" value="GIN <?php echo $date1; ?>" placeholder="000000" >
            </div>
            <div class="form-group" style="display: none;">
                Total Products
                <input type="text" name="totprod" id="totprod" class="form-control" required="" >
            </div>
            <table class="bg-light table table-bordered" id="here_table">
                <a href="#" class="btn btn-outline-primary bor-none float-right" id="addbut" name="addbut">Add row</a><br />
                <tr class="w3-light-grey">
                    <th style="width: 450px;">Item Details</th>
                    <th>Requested Quantity</th>
                    <th>Issued Quantity</th>
                    <th>Actions</th>
                </tr>
                      
            </table>
            <button type="submit" id="submit" name="submit" class="btn btn-outline-primary bor-none"  style="margin-top: 20px;"><i class="far fa-save"></i>&nbsp;&nbsp;Save</button>
            <!-- <input type="submit" value="Save" class="btn btn-primary" id="submit" name="submit" style="margin-top: 20px;"> -->
        </form>
    </div>
         <script src="interface.js"></script>
</body>