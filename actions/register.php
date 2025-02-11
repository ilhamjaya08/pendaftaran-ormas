<?php
require "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $level = "Ormas"; // Default Level
    $status = "Aktif";

    $result = $conn->query("SELECT COUNT(*) as total FROM users");
    $row = $result->fetch_assoc();
    $id_user = $row['total'] + 1;

    $stmt = $conn->prepare("INSERT INTO users (id_user, username, password, nama_lengkap, email, no_hp, level, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $id_user, $username, $password, $nama_lengkap, $email, $no_hp, $level, $status);

    if ($stmt->execute()) {
        $_SESSION['id'] = $id_user;
        $_SESSION['level'] = $level;

        header("Location: ../dashboard.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
