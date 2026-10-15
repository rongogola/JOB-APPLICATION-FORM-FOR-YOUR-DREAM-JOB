<?php
require_once 'dbConfig.php';

if (isset($_POST['deleteApplicationBtn'])) {
    $query = "DELETE FROM data_engineer_applications WHERE application_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST['application_id']]);
    header("Location: ../index.php");
}
?>
