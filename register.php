<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (username, password) VALUES ('$username','$password')";
  if ($conn->query($sql)) echo "<div class='msg success'>✅ Registered successfully!</div>";
  else echo "<div class='msg error'>Error: ".$conn->error."</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
  body {
    font-family: Arial;
    background: linear-gradient(135deg, #c8e6c9, #81c784);
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
    background: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
  }
  button:hover {
    background: #45a049;
  }
  .msg {
    text-align: center;
    font-weight: bold;
  }
  .success { color: green; }
  .error { color: red; }
</style>
</head>
<body>
<form method="POST">
  <h2>Create an Account</h2>
  <input type="text" name="username" placeholder="Enter Username" required><br>
  <input type="password" name="password" placeholder="Enter Password" required><br>
  <button type="submit">Register</button><br>
  <p>Already have an account? <a href="login.php">Login</a></p>
</form>
</body>
</html>
