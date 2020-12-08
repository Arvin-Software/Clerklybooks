<?php
  session_start();
  include '../classes/khatral.php';
  
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
    <link rel="stylesheet" href="../css/softview.css">
    <style>
        #tablex tr:last-child td:first-child {
            border-bottom-left-radius: 5px;
            
        }

        #tablex tr:last-child td:last-child {
            border-bottom-right-radius: 5px;
            
        }
        #tablex th:last-child{
            border-top-right-radius: 5px;
        }
        #tablex th:first-child{
            border-top-left-radius: 5px;
        }
        #tablex{
            border-radius: 5px 5px 5px 5px;
        }
        @media (min-width: 1200px) {
   .modal-xlg {
      width: 90%; 
   }
}
    </style>
</head>
<body style="" class="bg-light" oncontextmenu="return false;">
    <?php
        include '../classes/inventor.php';
        if(isset($_POST['submit'])){
            Khatral::khquery('INSERT INTO cont_list VALUES(\'\', :contnm, :contemail, :contphone, :contaddr, :contgst, :stcd, :consnm, :consemail, :consphone, :consaddr,:consgst, :conscd, :banknm, :ifsc, :otherbnk, :acc, :typ)', array(
                ':contnm'=>$_POST['connm'],
                ':contemail'=>$_POST['email'],
                ':contphone'=>$_POST['phno'],
                ':contaddr'=>$_POST['addr'],
                ':contgst'=>$_POST['contgst'],
                ':stcd'=>$_POST['stcd'],
                ':consnm'=>$_POST['consnm'],
                ':consemail'=>$_POST['consemail'],
                ':consphone'=>$_POST['consphno'],
                ':consaddr'=>$_POST['consaddr'],
                ':consgst'=>$_POST['consgst'],
                ':conscd'=>$_POST['conscd'],
                ':banknm'=>$_POST['banknm'],
                ':ifsc'=>$_POST['ifsc'],
                ':otherbnk'=>$_POST['bankdet'],
                ':acc'=>$_SESSION['instnm'],
                ':typ'=>"s"
        ));
        echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Supplier successfully deleted.
          </div>';
        }
    ?>
    <div class="container-fluid bor-none bg-white border" style="padding: 0% 2% 2% 2%; margin: 1% 1% 1% 1%; width: 98vw; background-color: #FFFFFF;">
        <!-- <h4><i class="fas fa-dolly-flatbed"></i>&nbsp;Supplier </h4> -->
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
        <a href="#" style="margin-top: 2%; margin-bottom: 2%;" class="btn btn-outline-primary bor-none" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;New</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="" style="">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>SL.NO</th>
                        <th>Supplier Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ret = khatral::khquery('SELECT * FROM cont_list WHERE acc=:inst AND typ=:typ', array(
                        ':inst'=>$_SESSION['instnm'],
                        ':typ'=>'s'
                    ));
                    $count = 0;
                    foreach($ret as $p){
                        $count += 1;
                        echo '<tr><td>' . $count . '</td><td>' . $p['cont_nm'] . '</td><td><a href="viewsup.php?nm=' . $p['cont_nm'] . '" class="btn btn-outline-primary bor-none"><i class="far fa-eye"></i></a></td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <form action="supplier.php" method="post">
        <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">New Contact</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="overflow: auto;">
                   <div class="row">
                   <div class="col-lg-6">
        <!-- <h4 style=""><a href="contactview.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;New Contact</h4> -->
                    <div class="form-group">
                        Name
                        <input type="text" name="connm" id="connm" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        Email
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        Phone Number
                        <input type="text" name="phno" id="phno" class="form-control">
                    </div>  
                    <div class="form-group">
                        Address
                
                    <textarea name="addr" id="addr" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                        GSTIN Number
                    <input type="text" name="contgst" id="contgst" class="form-control">
                    </div>
                    <div class="form-group">
                        State Code
                    
                    <input type="text" name="stcd" id="stcd" class="form-control">
                    </div>
                    <div class="form-group">
                        Consignee Name
                    
                        <input type="text" name="consnm" id="consnm" class="form-control" required="">
                    </div>
                    <div class="form-group">
                    Consignee Email
                        <input type="email" name="consemail" id="consemail" class="form-control">
                    </div>
                    <div class="form-group">
                    Consignee Phone Number
                        <input type="text" name="consphno" id="consphno" class="form-control">
                    </div>   
                    </div>
                    <div class="col-lg-6">
                <!-- consignee -->
                
                    <div class="form-group">
                    Consignee Address
                    <textarea name="consaddr" id="consaddr" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        Consignee GSTIN Number
                    <input type="text" name="consgst" id="consgst" class="form-control">
                    </div>
                    <div class="form-group">
                        State Code
                    
                    <input type="text" name="conscd" id="conscd" class="form-control">
                    </div>        
                    <div class="form-group">
                        Bank Name
                        <input type="text" name="banknm" id="banknm" class="form-control">
                    </div>                        
                    <div class="form-group">
                        IFSC Code
                        <input type="text" name="ifsc" id="ifsc" class="form-control">
                    </div>
                    <div class="form-group">
                        Other Bank Details
                        <textarea name="bankdet" id="bankdet" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" id="submit" name="submit" class="btn btn-outline-primary bor-none"><i class="far fa-save"></i>&nbsp;&nbsp;Save</button>
                    <!-- <input type="submit" value="Submit" id="submit" name="submit" class="btn btn-primary bor-ten" style=""> -->
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>