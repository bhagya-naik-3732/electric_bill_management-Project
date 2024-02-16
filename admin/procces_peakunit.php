<?php
    require_once('../Include/config.php');
    $cid=$_POST['cid'];
    echo "&cid";
    if(isset($_POST["peakunit_process"])){
        if(isset($_POST["cid"])){
            $query = "UPDATE peakunit SET status='PROCESSED' WHERE id={$pid}";
            //echo $query;
            $result = musqli_query($con,$query);
            if($result === FALSE) {
                die(mysql_error());//TODO: better error handling
            } 
        }
    }
    header("Location:peakunit.php");
?>