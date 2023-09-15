<?php
include 'database.php';
$id = $_GET['id'];
$uuid = $_GET['uuid'];

$sql = "DELETE FROM interests WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("location: ./interests.php");
}
