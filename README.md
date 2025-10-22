# Simple Blog Management System

Internship: ApexPlanet 45-Days (PHP & MySQL)

## Task 1 – Setup
- Installed XAMPP
- Verified PHP & MySQL
- Created GitHub repository
- Added initial project structure

## Next Steps
- Build CRUD operations
- Add authentication and security
PHP Blog CRUD Application
📖 Overview

This project is a simple Blog Application built using PHP and MySQL that allows users to:

🧑‍💻 Register and login

📝 Create, Read, Update, and Delete (CRUD) blog posts

🔐 Securely store user credentials (hashed passwords)

🎨 Enjoy a clean and responsive user interface

⚙️ Features

✅ User Registration & Login (with password hashing)
✅ Add / Edit / Delete / View Blog Posts
✅ Session-based authentication
✅ Beautiful modern UI with gradient backgrounds
✅ Lightweight PHP + MySQL backend

🗂️ Project Structure
php_project/
│
├── db_connection.php     # Database connection file
├── register.php          # User registration
├── login.php             # User login
├── posts.php             # Dashboard - view posts
├── add_post.php          # Add a new post
├── edit_post.php         # Edit post details
├── delete_post.php       # Delete a post
├── logout.php            # Logout script
└── README.md             # Project documentation

🧱 Database Setup

1️⃣ create a database named blog
2️⃣ Run this SQL inside phpMyAdmin

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

3️⃣ Start Apache and MySQL in XAMPP Control Panel
4️⃣ Open your browser and go to
5️⃣ Register, login, and start adding blog posts!

🧑‍💻 Technologies Used

PHP 8+
MySQL (phpMyAdmin)
HTML / CSS
XAMPP Server
VS Code

## Task 2 — Basic CRUD Application


🪄 Step 1 – Database Setup

Open phpMyAdmin

Click New → name it blog → Create

Run this SQL:

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


✅ Now you have 2 tables: users and posts

🔌 Step 2 – Database Connection

File: db_connection.php

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

👤 Step 3 – User Registration
File: register.php
Users enter a username and password
Password is hashed for security
Data saved into users table

✅ URL → http://localhost/php_project/register.php

🔐 Step 4 – User Login
File: login.php
Validates username/password
Starts a session
Redirects to posts page on success

✅ URL → http://localhost/php_project/login.php

📝 Step 5 – Create Post
File: add_post.php
Allows logged-in users to create new blog posts
Posts are stored in posts table

✅ URL → http://localhost/php_project/add_post.php

📜 Step 6 – View All Posts
File: posts.php
Displays all blog posts
Shows Edit and Delete buttons

✅ URL → http://localhost/php_project/posts.php
✏️ Step 7 – Edit & Delete Posts
Files:
edit_post.php – Update title/content
delete_post.php – Remove post from database
logout.php – End user session


🧩 TASK 3 — Advanced Features (Search + Pagination + UI)
✅ What Was Done
->Added Bootstrap UI
->Integrated Bootstrap 5 for styling
->Used cards, buttons, and navbar for a clean layout
->Added gradient background and centered design
->Implemented Search Function
->Users can search blog posts by title or content
->Dynamic filtering of results using SQL LIKE queries
->Added Pagination
->Limited to 5 posts per page
->Navigation links added to move between pages
->Improved Overall UI
->Uniform design across all pages
->Responsive layout for all screen sizes
->Buttons for edit, delete, add new post, and logout

🧾 Result
The project now has a modern look with search and pagination features, making it more user-friendly and professional.
✅ Task 3 Completed Successfully.


