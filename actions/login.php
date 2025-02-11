<?php
require "../config/database.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT id_user, password, level FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && $password === $result['password']) {
        $_SESSION['id'] = $result['id_user'];
        $_SESSION['level'] = $result['level'];

        $ormas = $conn->query("SELECT * FROM ormas WHERE id_user = " . $result['id_user']);
        $ormasResult = $ormas->fetch_assoc();
        
        if ($ormasResult) {
            header("Location: ../dashboard.php?msg=loginsuccess");
            exit();
        } else {
            header("Location: ../registration.php");
            exit();
        }
    } else {
        echo "Login gagal. <a href='../index.php'>Coba lagi</a>";
    }
}
?>
