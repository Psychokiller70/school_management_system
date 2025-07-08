<?php
session_start();
include '../users/db_connect.php'; // Include DB connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND role = ?");
    $stmt->bind_param("ss", $email, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Check password (assuming hashed with password_hash)
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user; // Save user in session
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "<script>alert('❌ Invalid password'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('❌ User not found'); window.location.href='login.html';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: login.html");
    exit();
}
?>