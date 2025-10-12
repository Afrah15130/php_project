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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows === 1) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
      $_SESSION['username'] = $username;
      header("Location: posts.php");
      exit;
    } else {
      $msg = "❌ Incorrect password.";
    }
  } else {
    $msg = "❌ Username not found.";
  }
  $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
  body {
    font-family: Arial;
    background: linear-gradient(135deg, #bbdefb, #64b5f6);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  form {
    background: white;
    padding: 30px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  }
  input, button {
    padding: 10px;
    margin: 8px;
    width: 90%;
    border-radius: 5px;
    border: 1px solid #ccc;
  }
  button {
    background: #2196F3;
    color: white;
    border: none;
    cursor: pointer;
  }
  button:hover {
    background: #1976D2;
  }
  .msg { color: red; font-weight: bold; }
</style>
</head>
<body>
<form method="POST">
  <h2>Login</h2>
  <?php if (!empty($msg)) echo "<div class='msg'>$msg</div>"; ?>
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Login</button><br>
  <p>Don't have an account? <a href="register.php">Register</a></p>
</form>
</body>
</html>
