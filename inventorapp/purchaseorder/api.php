<?php
session_start();
include '../../classes/khatral.php';
if($_POST['id'] == "t"){
 $res = Khatral::khquery('SELECT * FROM mtrl WHERE usr=:acc', array(':acc'=>$_SESSION['instnm']));
 // $myArr = array(2);
 $count = 1;
 foreach($res as $p){
     $count = $count + 1;
 }
 $myArr = array($count, "Please Select");
 foreach($res as $p){
 
     array_push($myArr, $p['mtrl_nm']);
 $myJSON = json_encode($myArr);
 

 }
 echo $myJSON;
// echo $p['mtrl_nm'];
}
?>