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
    <title>Edit Application</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 40px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 10px;
            margin-top: 0;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: 600;
            color: #34495e;
        }
        input, select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }
        input:focus, select:focus {
            border-color: #f1c40f;
            outline: none;
        }
        input[type="submit"] {
            background-color: #f1c40f;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #d4ac0d;
        }
        .btn-cancel {
            text-align: center;
            display: block;
            margin-top: 10px;
            color: #7f8c8d;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-cancel:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data Engineer Application</h2>
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="application_id" value="<?php echo $row['application_id']; ?>">
        
        <label>First Name</label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
        
        <label>Last Name</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
        
        <label>Email Address</label>
        <input type="email" name="email_address" value="<?php echo htmlspecialchars($row['email_address']); ?>" required>
        
        <label>Preferred Cloud Platform</label>
        <select name="preferred_cloud" required>
            <option value="AWS" <?php if($row['preferred_cloud'] == 'AWS') echo 'selected'; ?>>Amazon Web Services (AWS)</option>
            <option value="Google Cloud" <?php if($row['preferred_cloud'] == 'Google Cloud') echo 'selected'; ?>>Google Cloud Platform (GCP)</option>
            <option value="Azure" <?php if($row['preferred_cloud'] == 'Azure') echo 'selected'; ?>>Microsoft Azure</option>
        </select>
        
        <label>Years of Experience</label>
        <input type="number" name="years_experience" value="<?php echo htmlspecialchars($row['years_experience']); ?>" min="0" required>
        
        <label>GitHub Portfolio URL</label>
        <input type="url" name="github_url" value="<?php echo htmlspecialchars($row['github_url']); ?>" required>
        
        <input type="submit" name="editApplicationBtn" value="Save Changes">
        <a class="btn-cancel" href="index.php">Cancel</a>
    </form>
</div>

</body>
</html>
