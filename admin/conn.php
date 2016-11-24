<?php 

define('DB_HOST', '');
define('DB_USER', '');
define('DB_PWD', '');
define('DB_NAME', '');

$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$conn->query("set name utf8");



