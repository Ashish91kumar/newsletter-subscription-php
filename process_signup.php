<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$plan = $_POST['plan'];

if ($plan === 'free') {
    $sql = "INSERT INTO subscribers (name, email, plan, subscribed) VALUES (?, ?, ?, 1)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $plan);
    $stmt->execute();
    header("Location: success.php");
} else {
    $sql = "INSERT INTO subscribers (name, email, plan) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $plan);
    $stmt->execute();
    $user_id = $stmt->insert_id;
    header("Location: payment.php?uid=$user_id");
}
?>
