<?php
  session_start();
  include '../../classes/khatral.php';
  
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
    <style>
        #tablex tr:last-child td:first-child {
            border-bottom-left-radius: 15px;
            
        }

        #tablex tr:last-child td:last-child {
            border-bottom-right-radius: 15px;
            
        }
        #tablex th:last-child{
            border-top-right-radius: 15px;
        }
        #tablex th:first-child{
            border-top-left-radius: 15px;
        }
        #tablex{
            border-radius: 20px 20px 20px 20px;
        }
    </style>
</head>
<body style="background-color: #FFFFFF;">
    <?php
        include '../../classes/inventor.php';
        if(isset($_POST['submit'])){
            inventor::insertmtrl($_POST['matnm'], $_POST['quant'], $_POST['loc'], $_SESSION['unme']);
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Inventory created successfully.
          </div>';
        }
        if(isset($_GET['id'])){
            $ret = khatral::khquery('SELECT * FROM capmat WHERE capmat=:cap AND usr=:usr', array(
                ':cap'=> $_GET['nm'],
                ':usr'=>$_SESSION['instnm']
            ));
            $count = 0;
            foreach($ret as $p){
                $count = $count + 1;
            }
            if($count >= 1){
                echo '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> You have a product that uses this material so delete the material in the product record first.
              </div>';
            }else{
            inventor::deletemtrl($_GET['id'], $_SESSION['unme']);
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Inventory successfully deleted.
          </div>';
            }
        }
    ?>
    <div class="container-fluid bor-twen bg-white shadow border" style="padding: 2% 2% 2% 2%; margin: 1% 1% 1% 1%; width: 98vw; background-color: #FFFFFF;">
        <h4><i class="fas fa-pallet"></i>&nbsp;Stock register book </h4>
        <?php
         $count = 0;
         $ret = khatral::khquery('SELECT * FROM srbsales WHERE usr=:usr', array(':usr'=>$_SESSION['instnm']));
         $count = 0;
         foreach($ret as $p){
             $count= $count + 1;
         }
        ?>
       
        <div class="progress float-right text-center" style="width: 20%; text-align: center;">
          <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-center" style="color: #000000; text-align: center; width:<?php echo ($count/50)*100 . '%'; ?>">Usage : <?php echo $count; ?> / 50 ( <?php echo ($count/50)*100 . '%'; ?> )</div>
        </div>
        <!-- <a href="#" class="btn btn-primary bor-ten" data-toggle="modal" data-target="#myModal"><i class="far fa-plus-square"></i>&nbsp;&nbsp;Add new</a> -->
        <table class="table table-striped border" id="tablex" style="border-collapse: separate; border-spacing: 0px;">
            <thead>
                <tr class="bg-primary text-white">
                    <!-- <th style="width: 50px;">Sl.no</th> -->
                    <th>Product name</th>
                    <th>Opening Stock</th>
                    <th>Stock in hand</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 0;
                    
                    $ret = khatral::khquery('SELECT * FROM srbsales WHERE usr=:usr', array(':usr'=>$_SESSION['instnm']));
                    $count = 0;
                    foreach($ret as $p){
                        $count= $count + 1;
                        $res = khatral::khquery('SELECT * FROM mtrlsales WHERE mtrl_nm=:nm AND usr=:usr', array(':nm'=>$p['matnm'], ':usr'=>$_SESSION['instnm']));
                        foreach($res as $pi){
                            echo '<tr><td>' . $p['matnm'] . '</td><td>' . $pi['open_bal'] . '</td><td>' . $p['qty'] . '</td><td><a href="det.php?id=' . $p['srb_id'] . '&nm=' . $p['matnm'] . '&tot=' . $p['qty'] . '&open=' . $pi['open_bal'] . '" class="navigator bg-success text-white">Details</a></td></tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="mtrl.php" method="post">
        <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add new</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    
                    <div class="form-group">
                        Product name
                        <input type="text" name="matnm" id="matnm" class="form-control" autocomplete="off" required="" placeholder="">    
                    </div>
                    <div class="form-group">
                        Opening Quantity
                        <input type="text" name="quant" id="quant" class="form-control" autocomplete="off" required="" placeholder="000">
                    </div>
                    <div class="form-group">
                        Inventory location in store
                        <input type="text" name="loc" id="loc" class="form-control" autocomplete="off" required="">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" value="Submit" id="submit" name="submit" class="btn btn-primary bor-ten" style="">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>