<?php
session_start();
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
header("Location: switcher.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo.svg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Login - ClerklyBooks</title>
  </head>
  <body class="bg-light">
  <div class="container " style="width: 40%;">
        <div class="row">
                <img src="images/logo.svg" class="mx-auto d-block" style="width: 128px; height: 128px; margin-left: 5%; margin-top: 2%;">
                <form action="firstrun.php" method="post" class="was-validated" enctype="multipart/form-data">
                    <div class="bg-white shadow border " style="padding: 7% 7% 7% 7%; width: 100%; margin-top: 1%;">
                        <p>
                            <h3>Basic info</h3>
                            <?php
                                $res = khatral::khquery('SELECT * FROM inst WHERE instnm=:nm', array(
                                    ':nm'=>$_SESSION['instnm']
                                ));
                                $refid = 0;
                                foreach($res as $p){
                                    $refid = $p['instid'];
                                }
                            ?>
                            <input type="text" name="refid" id="refid" style="display: none;" value="<?php echo $refid; ?>">
                            <input type="text" name="refnm" id="refnm" style="display: none;" value="<?php echo $_SESSION['instnm']; ?>">
                            Mailing name
                            <input type="text" name="nm" id="nm" class="form-control" required="" value="<?php echo $_SESSION['instnm']; ?>">
                        </p>
                        <div class="mb-3">
                            Financial year starts from
                            <input type="date" name="dt" id="dt" class="form-control" required="">
                            
                            <div class="invalid-feedback">Please fill out this field.</div>                        
                        </div>
                        <div class="mb-3">                            
                            Financial year ends at
                            <input type="date" name="dtend" id="dtend" class="form-control" required="">
                            
                            <div class="invalid-feedback">Please fill out this field.</div>                        
                        </div>
                        <div class="mb-3">                            
                            GST number
                            <input type="text" name="gst" id="gst" class="form-control">
                            <div class="valid-feedback">Optional</div>
                            <div class="invalid-feedback">Please fill out this field.</div>                     
                        </div>
                        <div class="mb-3">                            
                            Mailing address
                            <textarea name="addr" id="addr" cols="10" rows="10" style="height: 200px;" class="form-control" required=""></textarea>
                            
                            <div class="invalid-feedback">Please fill out this field.</div>                            
                        </div>
                        <div class="mb-3">                        
                            Country
                            <select name="count" id="count" class="form-select" required="">
                                <option>India</option>
                            </select>
                            
                            <div class="invalid-feedback">Please fill out this field.</div>                        
                        </div>
                        <div class="mb-3">                        
                            State
                            <select name="stat" id="stat" class="form-select">
                                <option>Andaman and Nicobar Islands</option>
                                <option>Andra Pradesh</option>
                                <option>Arunachal Pradesh</option>
                                <option>Assam</option>
                                <option>Bihar</option>
                                <option>Chandigarh</option>
                                <option>Chhattisgarh</option>
                                <option>Dadra and Nagar Haveli</option>
                                <option>Daman and Diu</option>
                                <option>Delhi</option>
                                <option>Goa</option>
                                <option>Gujarat</option>
                                <option>Haryana</option>
                                <option>Himachal Pradesh</option>
                                <option>Jammu and Kashmir</option>
                                <option>Jharkhand</option>
                                <option>Karnataka</option>
                                <option>Kerala</option>
                                <option>Ladakh</option>
                                <option>Lakshadweep</option>
                                <option>Madhya Pradesh</option>
                                <option>Maharashtra</option>
                                <option>Manipur</option>
                                <option>Meghalaya</option>
                                <option>Mizoram</option>
                                <option>Nagaland</option>
                                <option>Odisha</option>
                                <option>Puducherry</option>
                                <option>Punjab</option>
                                <option>Rajasthan</option>
                                <option>Sikkim</option>
                                <option>Tamil Nadu</option>
                                <option>Telangana</option>
                                <option>Tripura</option>
                                <option>Uttar Pradesh</option>
                                <option>Uttarakhand</option>
                                <option>West Bengal</option>
                            </select>
                            
                            <div class="invalid-feedback">Please fill out this field.</div>                        
                        </div>
                        <div class="mb-3">                            
                                City
                                <input type="text" name="city" id="city" class="form-control" required="">
                                
                                <div class="invalid-feedback">Please fill out this field.</div>                            
                        </div>
                        <div class="mb-3">                            
                                Pincode
                                <input type="text" name="pin" id="pin" class="form-control" required="">
                                
                                <div class="invalid-feedback">Please fill out this field.</div>                             
                        </div>
                        <div class="mb-3">
                            Currency
                            <select name="curr" id="curr" class="form-select">
                                <option value="inr">&#8377; Rupee</option>
                                <option value="doll">$ Dollar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            Logo (File : *****.png, Size : 512px x 512px Max)
                            <div class="custom-file">
                                <input type="file" class="form-control" name="fileToUpload1" id="fileToUpload1">
                                
                            </div>
                            
                            <div class="invalid-feedback">Please fill out this field.</div>                   
                            <script>
                                // Add the following code if you want the name of the file appear on select
                                $(".custom-file-input").on("change", function() {
                                var fileName = $(this).val().split("\\").pop();
                                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                });
                            </script>
                        </div>
                    </div>
                    <div class="bg-white shadow border" style="padding: 7% 7% 7% 7%; width: 100%; margin-top: 2%; margin-bottom: 5%;">
                        <!-- <hr style="width: 100%;"> -->
                        
                            <h3>Contact info</h3>
                            <div class="mb-3">
                                Email
                                <input type="email" name="email" id="email" class="form-control">
                                                  
                            </div>
                            <div class="mb-3">
                                Phone number
                                <input type="text" name="phno" id="phno" class="form-control">
                                
                            </div>
                            <div class="mb-3">
                                Website
                                <input type="text" name="web" id="web" class="form-control">
                                
                            </div>
                        
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="agree" name="example1" required="">
                                    <label class="form-check-label" for="agree">I accept the terms and conditions and privacy policy of Arvin Soft</label>
                                    <!-- 
                                    <div class="invalid-feedback">Please accept the terms and conditions</div>                    -->
                                </div>
                            </div>     
                            <div class="mb-3">                   
                                Type of business
                                <select name="typofb" id="typofb" class="form-select">
                                    <option selected>Sole trader</option>
                                    <option>Partnership</option>
                                    <option>Company</option>
                                </select>
                                
                                <div class="invalid-feedback">Please fill out this field.</div>                   
                            </div>
                        
                            <input type="submit" value="Save" id="submit" name="submit" class="btn btn-primary">
                            <a href="loginhandle/logout" class="btn btn-danger">Logout</a>
                                        
                    </div>
                </form>
                <div class="text-center"><?php include 'classes/clerkly.php'; echo clerklybooks::cbVersion(); ?></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>