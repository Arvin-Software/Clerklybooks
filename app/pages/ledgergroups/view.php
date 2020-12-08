<?php
  session_start();
  include '../../../classes/khatral.php';
  
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

    <style>
        html, body {
            
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
        .navigator{
            padding: 1% 1% 1% 1%;
            background-color: #007AFF;
            /* padding-left: 5px;
            padding-right: 5px; */
            text-decoration: none;
            color: #FFFFFF;
            border-radius: 5px 5px 5px 5px;
        }
        .navigator:hover{
            background-color: #F1F1F1;
            color: #000000;
            text-decoration: none;
        }
        .navigator:active{
            background-color: #A8B1B1;
            text-decoration: none;
            color: #000000;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid bor-ten bg-light" style="padding: 2% 2% 2% 2%; background-color: #FFFFFF;">
        <h4><img src="../../../images/visibility.svg" style="width: 32px;" alt="ledger"> View ledger groups</h4>
        <table class="table table-striped table-bordered " style="background-color: #FFFFFF;">
            <thead>
                <tr>
                    <!-- <th style="width: 50px;">Sl.no</th> -->
                    <th>Ledger group</th>
                    <th>Under</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 0;
                    $ret = khatral::khquery('SELECT * FROM ledger_groups WHERE grp_unm=:unm ORDER BY grp_nm ASC', array(
                        ':unm'=>$_SESSION['ref_id']
                    ));
                    foreach($ret as $p){
                        $count += 1;
                        echo '<tr><td><a href="#" class="navigator">' . $p['grp_nm'] . '</a></td><td>' . $p['grp_under'] . '</td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>