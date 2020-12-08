<?php
    if(isset($_POST['submit'])){
        session_start();
        session_destroy();
        header("Location: ../loginhandle/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../images/logo.png" />
    <title>Tick - Admin</title>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/0d58c98fc8.js" crossorigin="anonymous"></script>

    <style>
        html, body {
            height: 100%;
        }
        .bor-twen{
            border-radius: 20px 20px 20px 20px;
        }
        .bor-ten{
            border-radius: 10px 10px 10px 10px;
        }
        a{
            margin-top: 2%;
            margin-bottom: 2%;
        }
        a:hover{
            background-color: #E1E1E1;
        }
        a:active{
            background-color: #0062CC;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 bg-light">
            <nav class="navbar navbar-light navbar-expand-lg px-0 flex-row">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                 <div class="navbar-collapse collapse" id="navbarWEX">
                    <div class="nav flex-md-column flex-column" style="width: 100%; height: 98vh;">
                        <img src="../images/logo.svg" class="mx-auto d-block" style="width: 68px; height: 68px; margin-bottom: 5%;">  
                        <a class="nav-item nav-link btn btn-primary active bor-twen text-left" id="comp" name="comp" href="company.php" target="tar"><i class="fas fa-store-alt"></i>&nbsp;&nbsp;Company</a>
                        <a href="users.php" target="tar" class="nav-item nav-link btn text-left bor-twen" id="users" name="users"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Users</a>
                        <!-- <a href="modules.php" target="tar" class="nav-item nav-link btn text-left bor-twen" id="modul" name="modul"><i class="fas fa-briefcase"></i>&nbsp;&nbsp;Modules</a> -->
                        <a href="../loginhandle/logout" class="nav-item nav-link btn text-left bor-twen"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col py-2">
            <iframe src="company.php" class="border bor-ten" id="tar" name="tar" style="width: 100%; height: 96vh;"></iframe>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // document.getElementById('id01').style.display='block';
        $('#comp').click(function(){
            
            $('#comp').addClass("btn-primary");
            $('#users').removeClass("btn-primary");
            $('#modul').removeClass("btn-primary");
            $("#navbarWEX").removeClass("show");
            
        })
        $('#users').click(function(){
            
            $('#users').addClass("btn-primary");
            $('#comp').removeClass("btn-primary");
            $('#modul').removeClass("btn-primary");
            $("#navbarWEX").removeClass("show");
        })
        $('#modul').click(function(){
            
            $('#modul').addClass("btn-primary");
            $('#users').removeClass("btn-primary");
            $('#comp').removeClass("btn-primary");
            $("#navbarWEX").removeClass("show");
        })
    })
</script>
</body>
</html>