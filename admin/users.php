<?php
 include '../classes/khatral.php';
if(isset($_GET['act'])){
    khatral::khquery('UPDATE authen SET act=:act WHERE authenid=:id', array(
        ':act'=>"1",
        ':id'=>$_GET['unme']
    ));
    echo 'activated';
}
?>
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
       
        if(isset($_POST['submit'])){
            khatral::khquery('INSERT INTO authen VALUES(NULL, :unm, :pass, :inst, :act)', array(':unm'=>$_POST['hodnm'], ':pass'=>$_POST['pass'], ':inst'=>$_POST['inst'], ':act'=>"0"));
            echo 'user created successfully';
        }
    ?>
    <!-- <h3>Tick -> Company details</h3> -->
    <div class="container" style="padding-top: 2%;">
        <form action="users.php" method="post" style="">
            <p>
                Company name
                <select name="inst" id="inst" class="custom-select">
                    <?php
                        $ret = khatral::khquerypar('SELECT * FROM inst');
                        foreach($ret as $p){
                            echo '<option>' . $p['instnm'] . '</option>';
                        }
                    ?>
                </select>
            </p>
            <p>
                Username
                <input type="text" class="form-control" id="hodnm" name="hodnm" placeholder="Name : example" autocomplete="off">
            </p>
            <p>
                Password
                <input type="password" class="form-control" id="pass" name="pass">
            </p>
            <p>
                <input type="submit" value="Add user to company" name="submit" id="submit" class="btn btn-primary">
            </p>
        </form>
    </div>
    <div class="container">
        <table class="table table-all border">
            <tr>
                <th>SL.NO</th>
                <th>Username</th>
                <th>Company Name</th>
                <th>Activation status</th>
                <th>Actions</th>
            </tr>
            <?php
                $count = 0;
                $ret = khatral::khquerypar('SELECT * FROM authen');
                foreach($ret as $p){
                    $count = $count+1;
                    echo '<tr><td> ' . $count . '</td><td>' . $p['inst'] . '</td><td>' . $p['unme'] . '</td><td>' . $p['act'] . '</td><td><a href="users.php?act=1&unme=' . $p['authenid'] . '" class="btn btn-success">Activate</a><a href="#" class="btn btn-danger">Delete</a></tr>';
                }
            ?>
        </table>
    </div>
</body>