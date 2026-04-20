<?php
    session_start();
    $id = $_SESSION["id"];
    if($id == "" || $id == null) {
        header("Location: ../index.php");
    }