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
<body class="bg-white">
    <?php
        include '../../classes/inventor.php';
        if(isset($_POST['submit'])){
            inventor::insertcap($_POST['matnm'], $_SESSION['unme']);
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Product created successfully.
          </div>';
        }
    ?>
    <div class="container-fluid bor-twen border shadow" style="width: 98vw; margin-top: 1%; padding: 2% 2% 2% 2%; background-color: #FFFFFF;">
        <h4><i class="fas fa-boxes"></i>&nbsp;Products</h4>
        <a href="#" class="btn btn-primary bor-ten" data-toggle="modal" data-target="#myModal"><i class="far fa-plus-square"></i>&nbsp;&nbsp;Add new</a>
        <table class="table table-striped border" id="tablex" style="border-collapse: separate; border-spacing: 0px; margin-top: 1%;">
            <thead>
                <tr class="bg-primary text-white">
                    <!-- <th style="width: 50px;">Sl.no</th> -->
                    <th>Product name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 0;
                    $ret = khatral::khquery('SELECT * FROM cap WHERE usr=:usr', array(':usr'=>$_SESSION['instnm']));
                    $count = 0;
                    foreach($ret as $p){
                        $count= $count + 1;
                        echo '<tr><td>' . $p['cap_name'] . '</td><td><a id="addmat" name="addmat" href="addmat.php?id=' . $p['cap_id'] . '" class="navigator bbcre" style="">Add Materials</a></td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="product.php" method="post">
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
     $(document).ready(function(){
        // document.getElementById('id01').style.display='block';
        $('.bbcre').click(function(){
            window.parent.$('#navg').html("<img src=\"images/logo.svg\" style=\"width: 20px;\">&nbsp;&nbsp;<a href=\"switcher.php\" class=\"navigator\">Tick</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> / <a href=\"inventorapp/pages/product.php\" target=\"tar\" class=\"navigator prod\">Products</a> / Add Materials");
            // alert("hello");
        })
        window.parent.$('.prod').click(function(){
            window.parent.$('#navg').html("<img src=\"images/logo.svg\" style=\"width: 20px;\">&nbsp;&nbsp;<a href=\"switcher.php\" class=\"navigator\">Tick</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> / <a href=\"inventorapp/pages/product.php\" target=\"tar\" class=\"navigator prod\">Products</a>");
        })
     })
</script>
</body>
</html>