<?php 
require_once 'core/dbConfig.php'; 

$stmt = $pdo->prepare("SELECT * FROM data_engineer_applications WHERE application_id = ?");
$stmt->execute([$_GET['id']]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Application</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f6f9; padding: 40px; }
        .box { max-width: 500px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; border-top: 5px solid #e74c3c; }
        h2 { color: #c0392b; margin-top: 0; }
        p { font-size: 16px; color: #34495e; margin: 20px 0; }
        input[type="submit"] { background-color: #e74c3c; color: white; border: none; font-weight: bold; padding: 12px 24px; cursor: pointer; border-radius: 4px; font-size: 15px; }
        input[type="submit"]:hover { background-color: #c0392b; }
        a { display: inline-block; margin-left: 15px; color: #7f8c8d; text-decoration: none; font-size: 15px; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="box">
    <h2>Delete Application</h2>
    <p>Are you sure you want to permanently delete the application for <strong><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></strong>?</p>
    
    <form action="core/deletion.php" method="POST">
        <input type="hidden" name="application_id" value="<?php echo $row['application_id']; ?>">
        <input type="submit" name="deleteApplicationBtn" value="Yes, Delete Application">
        <a href="index.php">Cancel</a>
    </form>
</div>
</body>
</html>
