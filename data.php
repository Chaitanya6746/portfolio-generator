<?php
$title = $_POST['title'];

// echo "Name Is".$name ."Phone Number:".$phone;
session_start();

if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
$uuid = $_SESSION['id'];
include 'database.php';
$sql = "INSERT INTO interests(uuid,title)VALUES('$uuid','$title')";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location: ./interests.php");
} else {
    // echo "Sorry We Can't Connect";
}
