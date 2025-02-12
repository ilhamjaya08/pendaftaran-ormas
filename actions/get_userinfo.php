<?php 
header('Content-Type: application/json');
require "../config/database.php";

if(isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];

    $stmt = $conn->prepare("SELECT id_user, username, nama_lengkap, email, no_hp, level, status FROM users WHERE id_user = ?");
    $stmt->bind_param('s', $id_user);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    echo json_encode($user);
}