<?php
session_start();
if(isset($_SESSION['unme'])){
    if($_SESSION['typ'] == "admin"){
        header("Location: ../admin/admin.php");
    }else if($_SESSION['typ'] == "user"){
        include '../classes/khatral.php';
        $res = khatral::khquery('SELECT * FROM inst WHERE instnm=:inst', array(':inst'=>$_SESSION['instnm']));
        foreach($res as $p){
            if($p['firstrun'] == "0"){
                header("Location: ../firstrun.php");
            }else{
                header("Location: ../switcher.php");
            }
        }
    }
}else{
    header("Location: ../loginhandle/login?id=2");
}
?>