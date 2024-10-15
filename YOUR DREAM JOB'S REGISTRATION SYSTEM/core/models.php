<?php
// Create a new application
function createApplication($pdo, $name, $email, $phone, $job_position, $resume_link) {
    $sql = "INSERT INTO job_applications (full_name, email, phone, job_position, resume_link) 
            VALUES (:name, :email, :phone, :job_position, :resume_link)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':job_position' => $job_position,
        ':resume_link' => $resume_link
    ]);
}

// Read all applications
function getApplications($pdo) {
    $stmt = $pdo->query("SELECT * FROM job_applications ORDER BY date_applied DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Update an application
function updateApplication($pdo, $id, $status) {
    $sql = "UPDATE job_applications SET status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':status' => $status, ':id' => $id]);
}

// Get a specific application by ID
function getApplicationById($pdo, $id) {
    $sql = "SELECT * FROM job_applications WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Delete an application
function deleteApplication($pdo, $id) {
    $sql = "DELETE FROM job_applications WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
}
?>
