<?php
session_start();
include '../users/db_connect.php'; // Your DB connection file

// Enable detailed error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password_raw = $_POST['password'];
    $role = $_POST['role'];

    // Hash the password
    $password = password_hash($password_raw, PASSWORD_DEFAULT);

    // Default values
    $grade = $parentEmail = $subject = $experience = $department = $employeeId = null;

    // Get role-specific fields
    if ($role === 'student') {
        $grade = $_POST['grade'] ?? null;
        $parentEmail = $_POST['parentEmail'] ?? null;
    } elseif ($role === 'teacher') {
        $subject = $_POST['subject'] ?? null;
        $experience = $_POST['experience'] ?? null;
    } elseif ($role === 'admin') {
        $department = $_POST['department'] ?? null;
        $employeeId = $_POST['employeeId'] ?? null;
    }

    // Prepare SQL insert
    $stmt = $conn->prepare("
        INSERT INTO users (name, email, password, role, grade, parent_email, subject, experience, department, employee_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param(
        "ssssssssss",
        $name,
        $email,
        $password,
        $role,
        $grade,
        $parentEmail,
        $subject,
        $experience,
        $department,
        $employeeId
    );

    if ($stmt->execute()) {
        $_SESSION['success'] = "✅ Registration successful! You can now log in.";
        header("Location: login.html");
        exit();
    } else {
        $_SESSION['error'] = "❌ Registration failed. Try again.";
        header("Location: register.html");
        exit();
    }
}
?>