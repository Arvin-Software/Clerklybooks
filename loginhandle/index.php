<?php
function base(){
    echo str_replace("index.php", "", $_SERVER['PHP_SELF']);
}
$url = explode("/", $_SERVER['QUERY_STRING']);
if(file_exists($url[0]. '.php')){
require_once($url[0] . '.php');
}
else{
    require_once('login.php');
}
?>