<?php
session_start();
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "blog";
$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['username'])) {
  die("Please login first. <a href='login.php'>Login</a>");
}
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>All Posts</title>
<style>
  body {
    font-family: Arial;
    background: linear-gradient(135deg, #f8bbd0, #f48fb1);
    text-align: center;
    padding: 30px;
  }
  .post {
    background: white;
    border-radius: 10px;
    padding: 20px;
    margin: 20px auto;
    width: 60%;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  }
  a { color: #E91E63; text-decoration: none; }
  a:hover { text-decoration: underline; }
  .top-links { margin-bottom: 20px; }
</style>
</head>
<body>
  <div class="top-links">
    <h2>Welcome, <?php echo $_SESSION['username']; ?> 👋</h2>
    <a href="add_post.php">➕ Add New Post</a> | 
    <a href="logout.php">🚪 Logout</a>
  </div>
  <?php
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<div class='post'>";
      echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
      echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
      echo "<a href='edit_post.php?id=".$row['id']."'>✏️ Edit</a> | ";
      echo "<a href='delete_post.php?id=".$row['id']."'>🗑️ Delete</a>";
      echo "</div>";
    }
  } else {
    echo "<p>No posts yet. <a href='add_post.php'>Add one!</a></p>";
  }
  $conn->close();
  ?>
</body>
</html>
