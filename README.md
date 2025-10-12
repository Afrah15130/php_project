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

1️⃣ Open phpMyAdmin → click New → create a database named blog
2️⃣ Run this SQL inside phpMyAdmin:

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

🚀 How to Run the Project

1️⃣ Install XAMPP

2️⃣ Copy the folder php_project into:

C:\xampp\htdocs\


3️⃣ Start Apache and MySQL in XAMPP Control Panel
4️⃣ Open your browser and go to:

http://localhost/php_project/register.php


5️⃣ Register, login, and start adding blog posts!


You can add screenshots like this:

![Register Page]
![Login Page]
![Dashboard]

🧑‍💻 Technologies Used

PHP 8+

MySQL (phpMyAdmin)

HTML / CSS

XAMPP Server

VS Code
