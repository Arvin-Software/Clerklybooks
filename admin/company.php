<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/0d58c98fc8.js" crossorigin="anonymous"></script>
</head>
<body style="padding: 1% 1% 1% 1%;">
    <?php
        include '../classes/khatral.php';
        if(isset($_POST['submit'])){
            khatral::khquery('INSERT INTO inst VALUES(NULL, :instnm, :firstrun)' , array(':instnm'=>$_POST['inst'], ':firstrun'=>'0'));
            echo 'Values inserted successfully';
        }
    ?>
    <!-- <h3>Tick -> Company details</h3> -->
    <div class="container" style="padding-top: 2%;">
        <form action="company.php" method="post" style="">
            <p>
                Company name
                <input type="text" name="inst" id="inst" class="form-control" required="">
            </p>
            <p>
                <input type="submit" value="Add company" name="submit" id="submit" class="btn btn-primary">
            </p>
        </form>
    </div>
    <div class="container">
        <table class="table table-all border">
            <tr>
                <th>SL.NO</th>
                <th>Company Name</th>
                <th>Actions</th>
            </tr>
            <?php
                $count = 0;
                $ret = khatral::khquerypar('SELECT * FROM inst');
                foreach($ret as $p){
                    $count = $count+1;
                    echo '<tr class="w3-border-top" style="padding-top: 5px; padding-bottom: 5px;"><td> ' . $count . '</td><td>' . $p['instnm'] . '</td><td><a href="#" class="btn btn-danger">Delete</a></tr>';
                }
            ?>
        </table>
    </div>
</body>