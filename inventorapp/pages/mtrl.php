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
    <script src="https://kit.fontawesome.com/0d58c98fc8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/softview.css">
    <style>
        #tablex tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
            
        }

        #tablex tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
            
        }
        #tablex th:last-child{
            border-top-right-radius: 10px;
        }
        #tablex th:first-child{
            border-top-left-radius: 10px;
        }
        #tablex{
            border-radius: 10px 10px 10px 10px;
        }
    </style>
</head>
<body style="" class="bg-light" oncontextmenu="return false;">
    <?php
        include '../../classes/inventor.php';
        if(isset($_POST['submit'])){
            inventor::insertmtrl($_POST['matnm'], $_POST['unit'], $_POST['quant'], $_POST['loc'], $_SESSION['unme']);
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
    <div class="container-fluid bor-none border" style="padding: 0% 2% 2% 2%; margin: 1% 1% 1% 1%; width: 98vw; background-color: #FFFFFF;">
        <!-- <h4><i class="fas fa-dolly-flatbed"></i>&nbsp;Inventory </h4> -->
        <?php
         $count = 0;
         $ret = khatral::khquery('SELECT * FROM mtrl WHERE usr=:usr', array(':usr'=>$_SESSION['instnm']));
         $count = 0;
         foreach($ret as $p){
             $count= $count + 1;
         }
        ?>
       
        <!-- <div class="progress float-right text-center" style="width: 20%; text-align: center;">
          <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-center" style="color: #000000; text-align: center; width:<?php echo ($count/50)*100 . '%'; ?>">Usage : <?php echo $count; ?> / 50 ( <?php echo ($count/50)*100 . '%'; ?> )</div>
        </div> -->
        <a href="#" class="btn btn-outline-primary bor-none" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;New</a>
        <div class="table-responsive">
        <table class="table table-bordered" id="table" style="">
            <thead>
                <tr class="bg-primary text-white">
                    <!-- <th style="width: 50px;">Sl.no</th> -->
                    <th>Product name</th>
                    <th>Unit</th>
                    <th>Opening Balance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 0;
                    $ret = khatral::khquery('SELECT * FROM mtrl WHERE usr=:usr', array(':usr'=>$_SESSION['instnm']));
                    $count = 0;
                    foreach($ret as $p){
                        $count= $count + 1;
                        echo '<tr><td>' . $p['mtrl_nm'] . '</td><td>' . $p['unit'] . '</td><td>' . $p['open_bal'] . '</td><td><a href="mtrl.php?id=' . $p['mtrl_id'] . '&nm=' . $p['mtrl_nm'] . '" class="btn btn-outline-danger bor-none" style=""><i class="far fa-trash-alt"></i></a></td></tr>';
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
    <div class="modal fade" id="myModal">
    <div class="modal-dialog   modal-lg">
        <div class="modal-content">
            <form action="mtrl.php" method="post">
        <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">New Inventory</h4>
                    <button type="button" class="btn btn-danger bor-none" data-dismiss="modal">x</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    
                    <div class="form-group">
                        Product name
                        <input type="text" name="matnm" id="matnm" class="form-control bor-none" autocomplete="off" required="" placeholder="">    
                    </div>
                    <div class="form-group">
                        Unit
                        <input list="browsers" id="unit" name="unit" class="form-control bor-none">
                        <datalist id="browsers">
                            <option value="cm"></option>
                            <option value="dm"></option>
                            <option value="m"></option>
                            <option value="dam"></option>
                            <option value="hm"></option>
                            <option value="km"></option>
                            <option value="cL"></option>
                            <option value="dL"></option>
                            <option value="litre"></option>
                            <option value="daL"></option>
                            <option value="hL"></option>
                            <option value="kL"></option>
                            <option value="cg"></option>
                            <option value="dg"></option>
                            <option value="g"></option>
                            <option value="dag"></option>
                            <option value="hg"></option>
                            <option value="kg"></option>
                            <option value="ton"></option>
                            <option value="ft"></option>
                            <option value="yd"></option>
                            <option value="rd"></option>
                            <option value="fur"></option>
                            <option value="mi"></option>
                        </datalist>
                    </div>
                    <div class="form-group">
                        Opening Quantity
                        <input type="text" name="quant" id="quant" class="form-control bor-none" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        Inventory location in store
                        <input type="text" name="loc" id="loc" class="form-control bor-none" autocomplete="off" required="">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" id="submit" name="submit" class="btn btn-outline-primary bor-none"><i class="far fa-save"></i>&nbsp;&nbsp;Save</button>
                    <!-- <input type="submit" value="Submit" id="submit" name="submit" class="btn btn-primary bor-none" style=""> -->
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>