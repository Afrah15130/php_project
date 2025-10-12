<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM posts WHERE id=$id");
$post = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
  $stmt->bind_param("ssi", $title, $content, $id);
  $stmt->execute();
  header("Location: posts.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Post</title>
<style>
body {
  font-family: Arial, sans-serif;
  background: linear-gradient(120deg, #f6d365, #fda085);
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
  background: #ffc107;
  color: black;
  border: none;
  padding: 10px 15px;
  border-radius: 8px;
  cursor: pointer;
}
button:hover { background: #e0a800; }
a {
  display: inline-block;
  margin-top: 10px;
  color: #007bff;
}
</style>
</head>
<body>
<form method="POST">
  <h2>✏️ Edit Post</h2>
  <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br>
  <textarea name="content" rows="6" required><?php echo htmlspecialchars($post['content']); ?></textarea><br>
  <button type="submit">Update</button><br>
  <a href="posts.php">⬅️ Back</a>
</form>
</body>
</html>
