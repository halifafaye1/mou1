<?php

  require 'connection/connection.php';
if (isset($_POST['name'])) {
    $qry = "select * from `sch_list` where sid=".$_POST['name'];
    $rec = mysqli_query($conn,$qry);

        while ($res = mysqli_fetch_array($rec)) {
            echo $res['sch_type']."|". $res['sch_code']."|".$res['district']."|" .$res['cluster']."|".$res['region']."|".$res['ward']. "|" .$res['settlemet']."|" .$res['sch_name'];

    }
}
die();
?>
