<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
  $stmt->bind_param("ss", $title, $content);
  $stmt->execute();
  header("Location: posts.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Post</title>
<style>
body {
  font-family: Arial, sans-serif;
  background: linear-gradient(120deg, #a1c4fd, #c2e9fb);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
form {
  background: white;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 0 15px rgba(0,0,0,0.2);
  width: 400px;
  text-align: center;
}
input, textarea {
  width: 90%;
  padding: 10px;
  margin: 10px 0;
  border-radius: 8px;
  border: 1px solid #ccc;
}
button {
  background: #28a745;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 8px;
  cursor: pointer;
}
button:hover { background: #1e7e34; }
a {
  display: inline-block;
  margin-top: 10px;
  color: #007bff;
}
</style>
</head>
<body>
<form method="POST">
  <h2>🖊️ Add New Post</h2>
  <input type="text" name="title" placeholder="Post Title" required><br>
  <textarea name="content" rows="6" placeholder="Write your content..." required></textarea><br>
  <button type="submit">Publish</button><br>
  <a href="posts.php">⬅️ Back to Posts</a>
</form>
</body>
</html>
