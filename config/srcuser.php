<?php
require "config.php";
session_start();
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    header("Location: ../user/profile.php?id=$id");
    exit();
} else {
    header("Location: ../login.php");
    exit();
}
?>
