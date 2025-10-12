<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = $_GET['id'];
$conn->query("DELETE FROM posts WHERE id=$id");

header("Location: posts.php");
exit;
?>
