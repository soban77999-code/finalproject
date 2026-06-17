<?php
$host = "localhost";
$db_name = "store_db";
$username = "root";
$password = ""; // ផ្លាស់ប្តូរទៅតាមការកំណត់របស់អ្នក បើប្រើ Port ផ្សេង

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $exception) {
    echo json_encode(["error" => "Connection failed: " . $exception->getMessage()]);
    exit();
}
?>