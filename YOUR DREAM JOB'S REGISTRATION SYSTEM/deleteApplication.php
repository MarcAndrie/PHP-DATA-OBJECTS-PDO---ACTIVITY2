<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteApplication($pdo, $id);
    header('Location: index.php?message=Application deleted successfully');
} else {
    header('Location: index.php?error=No application ID provided');
}
?>
