<?php
// Start Session

SESSION_START();


$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "cake";      // Khai báo database

// Kết nối database tintuc

$conn = mysqli_connect($server, $username, $password, $dbname);
/*
if (!$conn) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}
echo "Khi kết nối thành công sẽ tiếp tục dòng code bên dưới đây."*/
?>