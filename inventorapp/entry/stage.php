
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
<table class="table table-bordered" id="here_table">
                <tr class="w3-light-grey">
                    <th style="width: 450px;">Item Details</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Amount</th>
                    <th>Actions</th>
                </tr>
                <a href="#" class="btn btn-primary" id="addbut" name="addbut">Add row</a><br />       
            </table>
<script>
     $(document).ready(function(){
         a = 0;
         alert('hello');
        $('#here_table').append('<tr><td><select id="it' + a +'" name="it' + a + '" class="custom-select prodx"></select></td><td><input class="form-control  rte " required="" type="text" name="dt' + a + '" id="dt' + a + '"></td><td><input class="accx form-control rte" required="" type="text" name="rt' + a + '" id="rt' + a + '"></td><td><input class="form-control rte" required="" type="text" name="amt' + a + '" id="amt' + a + '"></td><td><button type="button" id="deletebut" name="deletebut" class="btn btn-danger deletebut">x</button></td></tr>');
        a += 1;
        $('.deletebut').click(function(){
                        alert('hello');
                        $(this).closest('tr').remove();
                        // return false;
                    }); 
     })
</script>