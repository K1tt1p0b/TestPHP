<?php

$hostname = "localhost"; // ชื่อโฮสต์
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = "1234"; // รหัสผ่านฐานข้อมูล
$database = "php_colorfull09af"; // ชื่อฐานข้อมูล
$port = 3306; // พอร์ตฐานข้อมูล

mysqli_report(MYSQLI_REPORT_OFF); // ปิดการแจ้งเตือนข้อผิดพลาด

$connection = mysqli_connect($hostname, $username, $password, $database, $port); // เชื่อมต่อฐานข้อมูล
if (!$connection) {
    die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ: " . mysqli_connect_error());
}

?>