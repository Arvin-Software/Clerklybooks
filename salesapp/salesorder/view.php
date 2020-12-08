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
<body class="bg-light">
<script type="text/javascript">
        function PrintDiv() {
            document.getElementById("printf").contentWindow.print();
        }
    </script>
<div class="container-fluid border" style="width: 98vw; background-color: #FFFFFF;">
<button type="button" onclick="PrintDiv();" class="btn btn-outline-primary bor-none"><i class="fas fa-print"></i></button>&nbsp;<a href="po.php" class="btn btn-outline-success bor-none"><i class="fas fa-arrow-circle-left"></i></a><br />
<iframe class="border-0" src="print.php?id=<?php echo $_GET['id']; ?>&stat=<?php echo $_GET['stat']; ?>" id="printf" name="printf" style="height: 85vh; width: 100%;"></iframe>