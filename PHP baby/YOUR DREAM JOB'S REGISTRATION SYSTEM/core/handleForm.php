<?php
require_once 'dbConfig.php';  // Correct path to dbConfig.php
require_once 'models.php';    // Correct path to models.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    $job_position = isset($_POST['job_position']) ? $_POST['job_position'] : null;
    $resume_link = isset($_POST['resume_link']) ? $_POST['resume_link'] : null;

    if ($name && $email && $phone && $job_position) {
        // Assuming you have the createApplication() function defined properly in models.php
        createApplication($pdo, $name, $email, $phone, $job_position, $resume_link);
        header('Location: ../index.php?message=Application submitted successfully');  // Adjust the path if needed
        exit();  // Ensure script stops after redirection
    } else {
        header('Location: ../index.php?error=All fields are required');  // Adjust the path if needed
        exit();  // Ensure script stops after redirection
    }
}
?>
