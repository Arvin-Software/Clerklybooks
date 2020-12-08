<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../../images/logo.png" />
    <title>Tick - Home</title>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" media='all'>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="../../css/softview.css">
    <link rel="stylesheet" href="../../css/all.css">
    <style type="text/css">
  @media print { 
    .table tr { 
        background-color: #F2F2F2 !important; 
    } 
}
    </style>
</head>
<body class="container-fluid border" style="height: 1380px;" onload="sumx();">
<h3 class="text-center" style="margin: 5% 0% 5% 0%;"><?php echo $_GET['stat']; ?></h3>
<?php
            session_start();
            include '../../classes/khatral.php';
            $mailnm = '';
            $finyearfrom = '';
            $finyearto = '';
            $gstno = '';
            $addr = '';
            $country = '';
            $stat = '';
            $city = '';
            $pin = '';
            $curr = '';
            $email = '';
            $phno ='';
            $web = '';
            $typofb = '';
            $logo = '';
            $res =  khatral::khquery('SELECT * FROM comp_info WHERE ref_id=:refid', array(':refid'=>$_SESSION['ref_id']));
            foreach($res as $p){
                $mailnm = $p['mail_nm'];
                $finyearfrom = $p['finyearfrom'];
                $finyearto = $p['finyearto'];
                $gstno = $p['gstno'];
                $addr = $p['addr'];
                $country = $p['country'];
                $stat = $p['stat'];
                $city = $p['city'];
                $pin  = $p['pin'];
                $curr = $p['curr'];
                $email = $p['email'];
                $phno = $p['phno'];
                $web = $p['web'];
                $typofb = $p['typofb'];
                $logo = $p['logo'];
            }
            $pono = '';
            $podate = '';
            $posup = '';
            $valid = '';
            $ret = khatral::khquery('SELECT * FROM entryso WHERE entryid=:id', array(
                ':id'=>$_GET['id']
            ));
            foreach($ret as $pi){
                $pono = $pi['sono'];
                $podate = $pi['dt'];
                $podate = date("d-m-Y", strtotime($podate));
                $posup = $pi['custnm'];
                if($p['stat'] != 'Invoice'){
                    $valid = $pi['validity'];
                    $valid = date("d-m-Y", strtotime($valid));
                }
            }
        ?>
    <table class="table">
        <tr>
        <td>
        <h5  class="">Number : <?php echo $pono; ?></h5>
            <h6>Date : <?php echo $podate; ?></h6>
            <?php
                if($valid != ''){ echo 'Validity : ' . $valid; }
            ?>
            <hr>
           
           
            <?php echo '<h5>' . $mailnm . '</h5>GST No : ' . $gstno; ?>
            <?php echo '<br />Address : ' . $addr . ' <br /> ' . $city . ' ' . $pin . ' <br /> ' . $stat . ' , ' . $country . '<br />' . $email . ' , ' . $phno  . ' , ' . $web; ?>
        </td>
        <td>
            
            <img src="../../images/d/<?php echo $logo; ?>" class="float-right bg-white rounded-circle" style="width: 256px; height: 256px; margin-top: 12%;">  
        </td>
    </tr>
    <tr>
        <td>
            <h3>Customer Info</h3>
            <?php
                $res = khatral::khquery('SELECT * FROM cont_list WHERE cont_nm=:nm AND acc=:acc', array(
                    ':nm'=>$posup,
                    ':acc'=>$_SESSION['instnm']
                ));
                foreach($res as $p){
                    echo '<h5>' . $p['cont_nm'] . '</h6>';
                    echo 'GST No : ' . $p['cont_gst'] . '<br />Address : ' . $p['cont_addr'] . '<br />' . $p['cont_email'] . '<br />' . $p['cont_phone'];
                }
            ?>
        </td>
    </tr>
    </table>
    <table class="table table-bordered">
        <tr class="">
            <th>SL.NO</th>
            <th>Item Details</th>
            <th>HSN Code</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>CGST %</th>
            <th>SGST/IGST %</th>
            <th>Amount</th>
        </tr>
        <?php
            $res = khatral::khquery('SELECT * FROM itemsso WHERE entrypo=:id', array(
                ':id'=>$_GET['id']
            ));
            $count = 0;
            $total = 0;
            foreach($res as $p){
                $count += 1;
                echo '<tr><td>' . $count . '</td>';
                echo '<td>' . $p['itemnm'] . '</td>';
                echo '<td>' . $p['hsn'] . '</td>';
                echo '<td>' . $p['quant'] . '</td>';
                echo '<td>' . $p['rte'] . '</td>';
                echo '<td>' . $p['cgst'] . '</td>';
                echo '<td>' . $p['sgst'] . '</td>';
                echo '<td class="text-right">' . $p['tot'] . '</td></tr>';
                $total += $p['tot'];
            }
        ?>
       
        <?php
    $res = khatral::khquery('SELECT * FROM totandtaxso WHERE poid=:id', array(
        ':id'=>$_GET['id']
    ));
    $terms = '';
    $fright = '';
    $discount = '';
    foreach($res as $p){
        $terms = $p['terms'];
        $fright = $p['fright'];
        $discount = $p['discounts'];
    }
    ?>
     <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
         <td class="">
            <b>Freight</b>
            </td>
            <td class="text-right">
                <?php echo $fright; ?>
            </td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
         <td class="">
            <b>Discount</b>
            </td>
            <td class="text-right">
                <?php echo $discount; ?>
            </td>
        </tr>
        <tr>
        <td class="border-0"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
         <td class="">
            <b>Grand total</b>
            </td>
            <td class="text-right">
            <?php echo $total + $fright; ?>
            </td>
        </tr>
        <input type="text" name="tot1" id="tot1" value="<?php echo $total + $fright; ?>" style="display: none;">
    </table>
    <div class="text-left">
            <p>
					<h5>Invoice Value In Words</h5>
					<br />
					<label id="mytext1" name="mytext1"></label>
            </p>
    </div>
    <div class="float-right">
        <h5>For <?php echo $mailnm; ?></h5><br />
        <h6>Authorized Signatory</h6>
    </div>
    <table class="table bottom" style="position: relative; margin-top: 20%; bottom: 0;">
        <tr>
            <td>
                <h5>Terms and Conditions</h5>
                <?php echo $terms; ?>
            </td>
        </tr>
    </table>
</body>
<script>
						function sumx() {
		
		var resx = document.getElementById("tot1").value;
		
    //    var fre = document.getElementById('fre').value;
    //    var load = document.getElementById('load').value;
    //    var resx = parseInt(tot1) + parseInt(fre) + parseInt(load);
      // alert(resx);
       
       var words = inWords(resx);
    //    alert(words);
       document.getElementById('mytext1').innerHTML = words;
       
     };
      var a = ['','One ','Two ','Three ','Four ', 'Five ','Six ','Seven ','Eight ','Nine ','Ten ','Eleven ','Twelve ','Thirteen ','Fourteen ','Fifteen ','Sixteen ','Seventeen ','Eighteen ','Nineteen '];
var b = ['', '', 'Twenty','Thirty','Forty','Fifty', 'Sixty','Seventy','Eighty','Ninety'];

function inWords (num) {
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
    return str;
}
					</script>