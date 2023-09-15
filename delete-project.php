<?php
ob_start();
include "includes/config.php";
require_once "conn.php";
include "includes/header.php";

if (!isset($_SESSION['user'])) {
    header('location:login.php');
}


$id = $_GET['id'];
$uuid = $_GET['uuid'];

$sql = "DELETE FROM project WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("location: ./project.php");
}
