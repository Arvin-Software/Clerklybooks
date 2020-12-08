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
</head>
<body class="bg-light" oncontextmenu="return false;">
<?php
include '../../classes/inventor.php';
if(isset($_POST['submit'])){
    inventor::insertmtrlforproduct($_POST['sel'], $_POST['quan'], $_GET['id'], $_SESSION['unme']);
    echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Material added successfully.
  </div>';
}
if(isset($_GET['delid'])){
    inventor::deletemtrlforproduct($_GET['delid'], $_SESSION['instnm']);
    echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Material successfully deleted.
  </div>';
}
?>
<div class="container-fluid bor-ten bg-light" style="padding: 2% 2% 2% 2%; background-color: #FFFFFF;">
        <h4><i class="fas fa-boxes"></i>&nbsp;Add Materials</h4>
        <a href="product.php" class="btn btn-success bor-ten" id="back" name="back"><i class="far fa-arrow-alt-circle-left"></i></a>&nbsp;<a href="#" class="btn btn-primary bor-ten" data-toggle="modal" data-target="#myModal"><i class="far fa-plus-square"></i>&nbsp;&nbsp;Add Material</a>
        <table class="table table-striped table-bordered " style="background-color: #FFFFFF;">
            <thead>
                <tr class="bg-primary text-white">
                    <!-- <th style="width: 50px;">Sl.no</th> -->
                    <th>Material name</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 0;
                    $ret = khatral::khquery('SELECT * FROM capmat WHERE capid=:capid AND usr=:usr', array(':capid'=>$_GET['id'], ':usr'=>$_SESSION['instnm']));
                    $count = 0;
                    foreach($ret as $p){
                        $count= $count + 1;
                        echo '<tr><td>' . $p['capmat'] . '</td><td>' . $p['matquan'] . '</td><td><a id="addmat" name="addmat" href="addmat.php?id=' . $_GET['id'] . '&delid=' . $p['cap_id'] . '" class="navigator bg-danger text-white" style="">Delete</a></td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="addmat.php?id=<?php echo $_GET['id']; ?>" method="post">
        <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add new</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        Select Material
                        <select name="sel" id="sel" class="custom-select">
                            <?php
                                $ret = khatral::khquery('SELECT * FROM mtrl WHERE usr=:usr' , array(':usr'=>$_SESSION['instnm']));
                                foreach($ret as $p){
                                    echo '<option>' . $p['mtrl_nm'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        Quantity
                        <input type="text" name="quan" id="quan" required="" class="form-control">
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

<script>
    window.parent.$('.prod').click(function(){
            window.parent.$('#navg').html("<img src=\"images/logo.svg\" style=\"width: 20px;\">&nbsp;&nbsp;<a href=\"switcher.php\" class=\"navigator\">Tick</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> / <a href=\"inventorapp/pages/product.php\" target=\"tar\" class=\"navigator prod\">Products</a>");
        })
        $('#back').click(function(){
            window.parent.$('#navg').html("<img src=\"images/logo.svg\" style=\"width: 20px;\">&nbsp;&nbsp;<a href=\"switcher.php\" class=\"navigator\">Tick</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> / <a href=\"inventorapp/pages/product.php\" target=\"tar\" class=\"navigator prod\">Products</a>");
        })
</script>