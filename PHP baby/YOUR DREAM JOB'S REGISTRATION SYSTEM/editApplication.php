<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    if ($id && $status) {
        updateApplication($pdo, $id, $status);
        header('Location: index.php?message=Application updated successfully');
    } else {
        header('Location: index.php?error=Invalid update request');
    }
}

if (isset($_GET['id'])) {
    $application = getApplicationById($pdo, $_GET['id']);
    if ($application) {
        // Render the form with existing application details for editing
        echo '<form method="POST" action="editApplication.php">
                <input type="hidden" name="id" value="' . $application['id'] . '">
                <label for="status">Update Status:</label>
                <select name="status">
                    <option value="applied" ' . ($application['status'] == 'applied' ? 'selected' : '') . '>Applied</option>
                    <option value="in-review" ' . ($application['status'] == 'in-review' ? 'selected' : '') . '>In Review</option>
                    <option value="rejected" ' . ($application['status'] == 'rejected' ? 'selected' : '') . '>Rejected</option>
                    <option value="accepted" ' . ($application['status'] == 'accepted' ? 'selected' : '') . '>Accepted</option>
                </select>
                <button type="submit">Update</button>
              </form>';
    } else {
        echo 'Application not found';
    }
}
?>
