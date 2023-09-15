<?php
include 'database.php';
$id = $_GET['id'];
$uuid = $_GET['uuid'];

$sql = "DELETE FROM skills WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("location: ./skills.php");
}
