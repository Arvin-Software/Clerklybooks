<?php
  session_start();
  include 'classes/khatral.php';
  
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
    <link rel="stylesheet" href="css/softview.css">
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
        include 'classes/inventor.php';
        if(isset($_POST['submit'])){
            date_default_timezone_set('Asia/Kolkata');
            $date1 = date('d/m/Y', time());
            inventor::insertusers($_POST['deptnm'], $_POST['unme'], $_POST['pass'], $date1);
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Department created successfully.
          </div>';
        }
        if(isset($_GET['id'])){
            inventor::deleteusers($_GET['id']);
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Department successfully deleted.
          </div>';
        }
    ?>
    <div class="container-fluid bor-twen bg-white shadow border" style="padding: 2% 2% 2% 2%; margin: 1% 1% 1% 1%; width: 98vw; background-color: #FFFFFF;">
        <h4><i class="fas fa-dolly-flatbed"></i>&nbsp;Department </h4>
        <?php
         $count = 0;
         $ret = khatral::khquery('SELECT * FROM instdept WHERE deptinst=:usr', array(':usr'=>$_SESSION['instnm']));
         $count = 0;
         foreach($ret as $p){
             $count= $count + 1;
         }
        ?>
       
        <div class="progress float-right text-center" style="width: 20%; text-align: center;">
          <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-center" style="color: #000000; text-align: center; width:<?php echo ($count/10)*100 . '%'; ?>">Usage : <?php echo $count; ?> / 10 ( <?php echo ($count/10)*100 . '%'; ?> )</div>
        </div>
        <a href="#" class="btn bor-ten text-white" style="background-color: #8a008a;" data-toggle="modal" data-target="#myModal"><i class="far fa-plus-square"></i>&nbsp;&nbsp;Add new</a>
        <table class="table table-striped border" id="tablex" style="border-collapse: separate; border-spacing: 0px;">
            <thead>
                <tr class="text-white" style="background-color: #8a008a;">
                    <!-- <th style="width: 50px;">Sl.no</th> -->
                    <th>Dept</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 0;
                    $ret = khatral::khquery('SELECT * FROM instdept WHERE deptinst=:usr', array(':usr'=>$_SESSION['instnm']));
                    $count = 0;
                    foreach($ret as $p){
                        $count= $count + 1;
                        echo '<tr><td>' . $p['deptnm'] . '</td><td><a href="dept.php?id=' . $p['dept_id'] . '&nm=' . $p['deptnm'] . '" class="navigator bg-danger text-white" style="">Delete</a></td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="dept.php" method="post">
        <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add new</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    
                    <div class="form-group">
                        Department Name
                       <input type="text" name="deptnm" id="deptnm" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        Username
                        <input type="text" name="unme" id="unme" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        Password
                        <input type="password" name="pass" id="pass" class="form-control" required="">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" value="Add Dept" id="submit" name="submit" class="btn btn-primary bor-ten" style="background-color: #8a008a;">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>