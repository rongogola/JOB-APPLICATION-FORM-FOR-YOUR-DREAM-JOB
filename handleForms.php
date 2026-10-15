<?php
require_once 'dbConfig.php';

if (isset($_POST['insertApplicationBtn'])) {
    $query = "INSERT INTO data_engineer_applications (first_name, last_name, email_address, preferred_cloud, years_experience, github_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        $_POST['first_name'], 
        $_POST['last_name'], 
        $_POST['email_address'], 
        $_POST['preferred_cloud'], 
        $_POST['years_experience'], 
        $_POST['github_url']
    ]);
    header("Location: ../index.php");
}
?>
