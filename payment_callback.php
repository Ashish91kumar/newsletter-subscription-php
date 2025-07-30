<?php
include 'db.php';

$uid = $_GET['uid'];
$pid = $_GET['pid'];

$sql = "UPDATE subscribers SET subscribed = 1, payment_id = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $pid, $uid);
$stmt->execute();

header("Location: success.php");
?>
