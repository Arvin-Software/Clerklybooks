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
    <?php
     if(isset($_POST['submit'])){
        // inventor::insertdet($_POST['dt'], $_POST['supnm'], $_POST['invno'], $_POST['dcno'], $_SESSION['instnm']);
        $loopval = $_POST['totprod'];
        for($i = 0; $i < $loopval; $i++){
            if(isset($_POST['it' . $i])){
                inventor::insertitemdc($_POST['it' . $i], $_POST['dt' . $i], $_GET['id']);
            }
        }
        header("Location: deliverychalan.php");
     }
    ?>
    <h4><i class="fas fa-file-invoice"></i>&nbsp;EWayBill or DC entry / View entry</h4>
    <a href="deliverychalan.php" class="btn btn-success bor-ten"><i class="far fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back</a>
    <?php
        $ret = khatral::khquery('SELECT * FROM itemsdc WHERE entrydc=:dcno', array(':dcno'=>$_GET['id']));
        $count =0;
        foreach($ret as $p){
            $count += 1;
        }
        if($count > 0){
    ?>
    <div class="container-fluid bg-primary text-white shadow bor-ten" style="padding: 1% 1% 1% 1%;">
        <?php
            $ret = khatral::khquery('SELECT * FROM entrymo WHERE entryid=:entryid', array(':entryid'=>$_GET['id']));
            foreach($ret as $p){
                echo 'Supplier Name : ' . $p['suppnm'] . '<br />';
                echo 'Invoice Number : ' . $p['invdt'] . '<br />';
                echo 'EWay bill / DC No : ' . $p['dcno'] . '<br />';
            }
        ?>
    </div>
    <div class="container-fluid bg-white shadow bor-ten" style="padding: 1% 1% 1% 1%; margin-top: 1%;"> 
        <table class="table table-bordered" id="here_table">
            <tr class="bg-primary text-white">
                <th style="width: 450px;">Item Details</th>
                <th>Quantity</th>
                <!-- <th>Rate</th>
                <th>Amount</th> -->
            </tr>
            <?php
            $ret = khatral::Khquery('SELECT * FROM items WHERE entrymo=:entrymo' , array(':entrymo'=>$_GET['id']));
            foreach($ret as $p){
                echo '<tr class="w3-border-top"><td class="w3-border-left">' . $p['itemnm'] . '</td>';
                echo '<td class="w3-border-left">' . $p['quant'] . '</td>';
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
        <form action="addview.php?id=<?php echo $_GET['id']; ?>" method="post" class="shadow bg-white bor-ten " style="padding: 2% 2% 2% 2%;">
            <div class="form-group">
                Date
                <input type="date" name="dt" id="dt" autocomplete="off" class="form-control" disabled="" required="" value="<?php echo $dt; ?>">
            </div>
            <div class="form-group">
                Supplier Name
                <input list="supnmx" autocomplete="off" id="supnm" name="supnm" class="form-control" disabled="" required="" value="<?php echo $supnm; ?>">
                <?php
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
                EWay bill / DC No
                <input type="text" name="dcno" id="dcno" class="form-control" required="" placeholder="000000" disabled="" value="<?php echo $dcno; ?>">
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
                    <th>Actions</th>
                </tr>
                      
            </table>
        
            <input type="submit" value="Save" class="btn btn-primary" id="submit" name="submit" style="margin-top: 20px;">
        </form>
        <script src="interfacedc.js"></script>
    <?php
        }
    ?>