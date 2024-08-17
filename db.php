<?php
$servername = "localhost";
$username = "root";
$password = "1234"; // הכנס כאן את הסיסמה אם יש לך סיסמה למשתמש root
$dbname = "bakerydb";

// יצירת חיבור
$conn = new mysqli($servername, $username, $password, $dbname);

// בדיקת החיבור
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
