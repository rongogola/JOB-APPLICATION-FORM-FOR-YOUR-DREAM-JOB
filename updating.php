<?php
require_once 'dbConfig.php';

if (isset($_POST['editApplicationBtn'])) {
    $query = "UPDATE data_engineer_applications SET first_name = ?, last_name = ?, email_address = ?, preferred_cloud = ?, years_experience = ?, github_url = ? WHERE application_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        $_POST['first_name'], 
        $_POST['last_name'], 
        $_POST['email_address'], 
        $_POST['preferred_cloud'], 
        $_POST['years_experience'], 
        $_POST['github_url'], 
        $_POST['application_id']
    ]);
    header("Location: ../index.php");
    exit();
}
?>
