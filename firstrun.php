<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First Run - Tick Accounting Suite</title>
    <link rel="icon" href="images/logo.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        html, body {
            height: 100%;
            background-color: #007AFF;
        }
        .back-img{
            background-image: url("images/splash.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.3;
            /* background-size: 90% 20%; */
            background-color: #0062CC;
            filter: blur(5px);
            -webkit-filter: blur(5px);
            /* background-color: #0062CC; */
        }
        .bor-twen{
            border-radius: 20px 20px 20px 20px;
        }
        .bor-ten{
            border-radius: 10px 10px 10px 10px;
        }
    </style>
</head>
<body class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 back-img d-none d-lg-block" style="">
                <!-- <img src="images/backemp.png" class="d-none d-xl-block" style="width: 90%; height: 20%; filter: blur(0px); -webkit-filter: blur(0px); margin-top: 70%;" alt=""> -->
            </div>
            <div class="col-lg-9 bg-white" style="height: 100vh; overflow: auto;">
                <img src="images/logo.svg" class="mx-auto d-block" style="width: 68px; height: 68px; margin-left: 5%; margin-top: 2%;">
                <!-- <h3 style="margin: 0% 5% 0% 5%; ">Welcome to</h3>
                <p style="margin-left: 5%;">Tick - Easy Accounting</p> -->
                <!-- <hr style="width: 100%;"> -->
                <form action="handle.php" method="post" class="was-validated" enctype="multipart/form-data">
                    <div class="bg-light bor-ten border" style="padding: 2% 2% 2% 2%; width: 100%; margin-top: 1%;">
                        <label for="dtandtm" class="float-right" style="padding-bottom: 20px;" id="dt" name="dt">Time : 00:00:00</label>
                    
                        <p>
                            <h3>Basic info</h3>
                            <?php
                                include 'classes/khatral.php';
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
                            <input type="text" name="nm" id="nm" class="form-control bor-ten" required="" value="<?php echo $_SESSION['instnm']; ?>">
                        </p>
                        <div class="form-group">
                            Financial year starts from
                            <input type="date" name="dt" id="dt" class="form-control bor-ten" required="">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>                        
                        </div>
                        <div class="form-group">                            
                            Financial year ends at
                            <input type="date" name="dtend" id="dtend" class="form-control bor-ten" required="">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>                        
                        </div>
                        <div class="form-group">                            
                            GST number
                            <input type="text" name="gst" id="gst" class="form-control bor-ten">
                                                    
                        </div>
                        <div class="form-group">                            
                            Mailing address
                            <textarea name="addr" id="addr" cols="10" rows="10" style="height: 200px;" class="form-control bor-ten" required=""></textarea>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>                            
                        </div>
                        <div class="form-group">                        
                            Country
                            <select name="count" id="count" class="custom-select bor-ten" required="">
                                <option>India</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>                        
                        </div>
                        <div class="form-group">                        
                            State
                            <select name="stat" id="stat" class="custom-select bor-ten">
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
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>                        
                        </div>
                        <div class="form-group">                            
                                City
                                <input type="text" name="city" id="city" class="form-control bor-ten" required="">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>                            
                        </div>
                        <div class="form-group">                            
                                Pincode
                                <input type="text" name="pin" id="pin" class="form-control bor-ten" required="">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>                             
                        </div>
                        <div class="form-group">
                            Currency
                            <select name="curr" id="curr" class="custom-select bor-ten">
                                <option value="inr">&#8377; Rupee</option>
                                <option value="doll">$ Dollar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            Logo (File : *****.png, Size : 512px x 512px Max)
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="fileToUpload1" id="fileToUpload1">
                                <label class="custom-file-label" for="fileToUpload1" required="">Choose file</label>
                            </div>
                            <div class="valid-feedback">Valid.</div>
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
                    <div class="bg-light bor-ten border" style="padding: 2% 2% 2% 2%; width: 100%; margin-top: 2%; margin-bottom: 5%;">
                        <!-- <hr style="width: 100%;"> -->
                        
                            <h3>Contact info</h3>
                            <div class="form-group">
                                Email
                                <input type="email" name="email" id="email" class="form-control bor-ten">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>                   
                            </div>
                            <div class="form-group">
                                Phone number
                                <input type="text" name="phno" id="phno" class="form-control bor-ten">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>                   
                            </div>
                            <div class="from-group">
                                Website
                                <input type="text" name="web" id="web" class="form-control bor-ten">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>                   
                            </div>
                        
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="agree" name="example1" required="">
                                    <label class="custom-control-label" for="agree">I accept the terms and conditions and privacy policy of Arvin Soft</label>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please accept the terms and conditions</div>                   
                                </div>
                            </div>     
                            <div class="form-group">                   
                                Type of business
                                <select name="typofb" id="typofb" class="custom-select bor-ten">
                                    <option selected>Sole trader</option>
                                    <option>Partnership</option>
                                    <option>Company</option>
                                </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>                   
                            </div>
                        
                            <input type="submit" value="Save" id="submit" name="submit" class="btn btn-primary bor-ten">
                            <a href="loginhandle/logout" class="btn btn-danger bor-ten">Logout</a>
                                        
                    </div>
                </form>
                <div class="text-center">&copy; 2020 Tick accounting suite.</div>
            </div>
        </div>
    </div>
    <script>
        // // Disable form submissions if there are invalid fields
        // (function() {
        // 'use strict';
        // window.addEventListener('load', function() {
        //     // Get the forms we want to add validation styles to
        //     var forms = document.getElementsByClassName('needs-validation');
        //     // Loop over them and prevent submission
        //     var validation = Array.prototype.filter.call(forms, function(form) {
        //     form.addEventListener('submit', function(event) {
        //         if (form.checkValidity() === false) {
        //         event.preventDefault();
        //         event.stopPropagation();
        //         }
        //         form.classList.add('was-validated');
        //     }, false);
        //     });
        // }, false);
        // })();
    </script>
    <script>
     
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            // var s = today.getSeconds();
            h = checkTime(h);
            m = checkTime(m);
            // s = checkTime(s);
            $('#dt').html("Time : " + h + ":" + m);
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
        $(document).ready(function(){
            startTime();
        });
    </script>
</body>