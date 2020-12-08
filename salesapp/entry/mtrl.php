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
<body style="" class="bg-light">
    <?php
        include '../../classes/inventor.php';
        if(isset($_POST['submit'])){
            inventor::insertmtrlsales($_POST['matcd'], $_POST['matnm'], $_POST['hsn'], $_POST['rte'], $_POST["cgst"], $_POST["sgst"], $_POST['quant'], $_POST["loc"]);
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Sales Inventory created successfully.
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
            inventor::deletemtrlsales($_GET['id'], $_SESSION['unme']);
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Inventory successfully deleted.
          </div>';
            }
        }
    ?>
    <div class="container-fluid bor-none bg-white border" style="padding: 0% 2% 2% 2%; margin: 0% 1% 1% 1%; width: 98vw; background-color: #FFFFFF;">
        <!-- <h4><i class="fas fa-dolly-flatbed"></i>&nbsp;Inventory </h4> -->
        <a href="#" class="btn btn-outline-primary bor-none" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;New</a>
        <table class="table table-striped table-bordered" id="table" style="">
            <thead>
                <tr class="bg-primary text-white">
                    <!-- <th style="width: 50px;">Sl.no</th> -->
                    <th>Code</th>
                    <th>Product name</th>
                    <th>Rate</th>
                    <th>CSGT / IGST</th>
                    <th>SGST</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 0;
                    $ret = khatral::khquery('SELECT * FROM mtrlsales WHERE usr=:usr', array(':usr'=>$_SESSION['instnm']));
                    $count = 0;
                    foreach($ret as $p){
                        $count= $count + 1;
                        echo '<tr><td>' . $p['code'] . '</td><td>' . $p['mtrl_nm'] . '</td><td>&#8377;&nbsp;' . $p['rate'] . '</td><td>' . $p['cgst'] . ' %</td><td>' . $p['sgst'] . ' %</td><td style="text-align: center;"><a href="mtrl.php?id=' . $p['mtrl_id'] . '&nm=' . $p['mtrl_nm'] . '" class="btn btn-outline-danger" style=""><i class="far fa-trash-alt"></i></a></td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="mtrl.php" method="post">
        <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add new</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                Material Code
                                <input type="text" name="matcd" id="matcd" class="form-control" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                Product name
                                <input type="text" name="matnm" id="matnm" class="form-control" autocomplete="off" required="" placeholder="">    
                            </div>
                            <div class="form-group">
                                HSN Code
                                <input type="text" name="hsn" id="hsn" class="form-control" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                Rate
                                <input type="number" name="rte" id="rte" class="form-control" autocomplete="off" required="">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                CSGT / IGST %
                                <input type="number" name="cgst" id="cgst" class="form-control" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                SGST %
                                <input type="number" name="sgst" id="sgst" class="form-control" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                Opening Quantity
                                <input type="number" name="quant" id="quant" class="form-control" autocomplete="off" required="" placeholder="000">
                            </div>
                            <div class="form-group">
                                Inventory location in store
                                <input type="text" name="loc" id="loc" class="form-control" autocomplete="off" required="">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" value="Save" id="submit" name="submit" class="btn btn-primary bor-ten" style="">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>