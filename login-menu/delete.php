<?php
    include "menu_connection.php";
    if(isset($_GET['recid'])){
        $recid = $_GET['recid'];
        $sql = "DELETE from `employeefile` where recid=$recid";
        $conn->query($sql);
    }
    header('location:menu_delete.php');
    exit;
?>