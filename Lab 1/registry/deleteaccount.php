<?php

    include_once("connections/connection.php");
    $con = connection();

    if(isset($_GET['ID'])){

        $id = $_GET['ID'];
        $sql = "DELETE FROM accounts_list WHERE ID='$id'";
        $con->query($sql) or die ($con->error);
        
        header("location:index.php");
    }
?>