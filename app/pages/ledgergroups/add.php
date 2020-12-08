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
            /* padding: 1% 1% 1% 1%; */
            padding-left: 5px;
            padding-right: 5px;
            text-decoration: none;
            color: #000000;
            border-radius: 10px 10px 10px 10px;
        }
        .navigator:hover{
            background-color: #007AFF;
            color: #FFFFFF;
            text-decoration: none;
        }
        .navigator:active{
            background-color: #0062CC;
            text-decoration: none;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container" style="padding-top: 5%;">
        <?php
            if(isset($_POST['submit'])){
                $grpnm = $_POST['grpnm'];
                $grpal = $_POST['grpala'];
                $grpun = $_POST['grpun'];
                $grpnat = '';
                $grpaffect = '';
                if($grpun == "Primary"){
                    $grpnat = $_POST['natur'];
                    if($grpnat == "Income" || $grpnat == "Expenses"){
                        $grpaffect = $_POST['profaff'];
                    }else{
                        $grpaffect = '';
                    }
                }else{
                    $grpnat = '';
                }
                khatral::khquery('INSERT INTO ledger_groups VALUES(NULL, :grp_nm, :grp_nm_alias, :grp_under, :grp_typ, :grp_prof_aff, :unm)', array(
                    ':grp_nm'=>$grpnm,
                    ':grp_nm_alias'=>$grpal,
                    ':grp_under'=>$grpun,
                    ':grp_typ'=>$grpnat,
                    ':grp_prof_aff'=>$grpaffect,
                    ':unm'=> $_SESSION['ref_id']
                ));
                echo '<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Ledger group created.
              </div>';
            }
        ?>
        <h4><img src="../../../images/ledger.svg" style="width: 32px;" alt="ledger"> Ledger group creation</h4>
        <form action="add.php" method="post" class="was-validated">
            <div class="form-group">
                Group name
                <input type="text" name="grpnm" id="grpnm" class="form-control bor-ten" required="" autocomplete="off">    
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>                        
            </div>
            <div class="form-group">
                Alias
                <input type="text" name="grpala" id="grpala" class="form-control bor-ten" required="" autocomplete="off">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>                        
            </div>
            <div class="form-group">
                Group under
                <select name="grpun" id="grpun" class="custom-select bor-ten" required="">
                    <!-- <option>Please select...</option> -->
                    <option disabled selected value>Please Select...</option>
                    <option>Primary</option>
                    <?php
                        $ret = khatral::khquery('SELECT * FROM ledger_groups WHERE grp_under=:under', array(
                            ':under'=>"Primary"
                        ));
                        foreach($ret as $p){
                            echo '<option>' . $p['grp_nm'] . '</option>';
                        }
                    ?>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please select an option.</div>                        
            </div>
            <div class="form-group" id="nat" name="nat">
                Nature of the group
                <select name="natur" id="natur" class="custom-select bor-ten" required="">
                    <option disabled selected value>Please Select...</option>
                    <option>Not Required</option>
                    <?php
                        $ret = khatral::khquerypar('SELECT * FROM master_rec');
                        foreach($ret as $p){
                            echo '<option>' . $p['master_nm'] . '</option>';
                        }
                    ?>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please select an option.</div>                        
            </div>
            <div class="form-group" id="affect" name="affect" required="">
                Does this affect gross profit ?
                <select name="profaff" id="profaff" class="custom-select bor-ten">
                    
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
            <div class="form-group" id="submitbu" name="submitbu">
                <input type="submit" value="Create" id="submit" name="submit" class='btn btn-primary'>
            </div>
        </form>
        <script>
        $(document).ready(function(){
            $('#nat').css('visibility','hidden');
            $('#affect').css('visibility','hidden');
            $('#submitbu').css('visibility','hidden');
            $("#grpun").change(function(){
                var selectedun = $(this).children("option:selected").val();
                if(selectedun == "Primary"){
                    $('#nat').css('visibility','visible');
                    // alert(selectedun);
                    $('#submitbu').css('visibility','hidden');
                }else{
                    $('#natur').val("Not Required");
                    $('#nat').css('visibility','hidden');
                    $('#affect').css('visibility','hidden');

                    $('#submitbu').css('visibility','visible');

                }
                
            });
            $("#natur").change(function(){
                var selectedun = $(this).children("option:selected").val();
                if(selectedun == "Expenses" || selectedun == "Income"){
                    $('#affect').css('visibility','visible');
                    $('#submitbu').css('visibility','visible');
                    // alert(selectedun);
                }else{
                    $('#affect').css('visibility','hidden');
                    $('#submitbu').css('visibility','visible');
                }
                
            });
        });
</script>
    </div>