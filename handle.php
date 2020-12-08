<?php
include 'classes/khatral.php';
if(isset($_POST['submit'])){
    if(isset($_POST['fileToUpload1'])){
    $target_dir = 'images/d/';
    $target_file = basename($_FILES["fileToUpload1"]["name"]);
    // echo $target_file;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // echo 'datas entered';
    // echo $imageFileType;

    if($imageFileType == "png" || $imageFileType == "PNG"){
        // echo 'datas saved2';
        date_default_timezone_set('Asia/Kolkata');
        $date = date('dmYhis', time());
        $date1 = date('d/m/Y h:i:s', time());
        khatral::khquery('UPDATE inst SET firstrun=:frst WHERE instid=:id', array(':frst'=>"1", ':id'=>$_POST['refid']));
        khatral::khquery('INSERT INTO comp_info VALUES(NULL, :ref_id, :mail_nm, :finyearfr, :finyearto, :gstno,
         :addr, :country, :stat, :city, :pin, :curr,
        :email, :phno, :web, :typofb, :logo)', array(
            ':ref_id'=>$_POST['refid'],
            ':mail_nm'=>$_POST['nm'],
            ':finyearfr' =>$_POST['dt'],
            ':finyearto'=>$_POST['dtend'],
            ':gstno'=>$_POST['gst'],
            ':addr'=>$_POST['addr'],
            ':country'=>$_POST['count'],
            ':stat'=>$_POST['stat'],
            ':city'=>$_POST['city'],
            ':pin'=>$_POST['pin'],
            ':curr'=>$_POST['curr'],
            ':email'=>$_POST['email'],
            ':phno'=>$_POST['phno'],
            ':web'=>$_POST['web'],
            ':typofb'=>$_POST['typofb'],
            ':logo'=>$date . '.png',
        ));
        move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], "images/d/" . $date . '.png');
        // echo 'datas saved';
    }
}else{
    date_default_timezone_set('Asia/Kolkata');
    $date = date('dmYhis', time());
    $date1 = date('d/m/Y h:i:s', time());
    khatral::khquery('UPDATE inst SET firstrun=:frst WHERE instid=:id', array(':frst'=>"1", ':id'=>$_POST['refid']));
    khatral::khquery('INSERT INTO comp_info VALUES(NULL, :ref_id, :mail_nm, :finyearfr, :finyearto, :gstno,
     :addr, :country, :stat, :city, :pin, :curr,
    :email, :phno, :web, :typofb, :logo)', array(
        ':ref_id'=>$_POST['refid'],
        ':mail_nm'=>$_POST['nm'],
        ':finyearfr' =>$_POST['dt'],
        ':finyearto'=>$_POST['dtend'],
        ':gstno'=>$_POST['gst'],
        ':addr'=>$_POST['addr'],
        ':country'=>$_POST['count'],
        ':stat'=>$_POST['stat'],
        ':city'=>$_POST['city'],
        ':pin'=>$_POST['pin'],
        ':curr'=>$_POST['curr'],
        ':email'=>$_POST['email'],
        ':phno'=>$_POST['phno'],
        ':web'=>$_POST['web'],
        ':typofb'=>$_POST['typofb'],
        ':logo'=>'',
    ));
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        html, body {
            height: 100%;
        }
    </style>
</head>
<body class="bg-light">
<div class="container-fluid ">
        <div class="row" style="height: 100vh;">
            <div class="col-xl"></div>
            <div class="col-xl my-auto">
                <div class="card card-block " style="border-radius: 20px 20px 20px 20px;">                   
                    <div class="card-body">
                        <div class="container" style="padding: 5% 8% 5% 8%; margin-bottom: 10%;">
                            <div class=""  style="width: 100%; padding: 5% 1% 1% 1%; padding-bottom: 10%;">  
                                <img src="images/logo.svg" class="mx-auto d-block" style="width: 128px; height: 128px; margin-bottom: 5%;">
                                <!-- <h4>Your account details</h4> -->
                                <!-- <h6>your account to continue</h6> -->
                            </div>
                            <form action="loginhandle.php" style="height: 160px;" method="post" autocomplete="off">
                                <div class="text-center" style="padding-top: 5%;">
                                    
                                    <div class="spinner-border text-primary"></div>
                                    <br /><br />
                                    <h5>Saving information...</h5>                        
                                </div>
                                <!-- <input type="submit" id="submit" name="submit" value="Next step" style="border-radius: 15px 15px 15px 15px;" class="btn btn-primary float-right"> -->
                            </form>
                            
                        </div>
                        <p class="text-center" style="">
                                &copy; 2020 Tick ERP Suite.
                            </p>
                    </div>                    
                </div>
            </div>
            <div class="col-xl"></div>
        </div>  
    </div>
    <script>
    $( document ).ready(function() {
        setTimeout(function() {
        window.location.href = "switcher.php";
        }, 1000);
    })
    </script>
</body>