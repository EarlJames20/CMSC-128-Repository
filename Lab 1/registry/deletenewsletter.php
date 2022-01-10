<?php

    include_once("connections/connection.php");
    $con = connection();

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $sql = "DELETE FROM persons_list WHERE id='$id'";
        $con->query($sql) or die ($con->error);
        
        header("location:index.php");
    }
?>