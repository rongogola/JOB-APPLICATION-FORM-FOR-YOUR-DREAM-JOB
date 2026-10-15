<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Engineer Job Applications</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 40px;
        }
        .container {
            max-width: 1000px;
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
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 40px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group.full-width {
            grid-column: span 2;
        }
        label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #34495e;
        }
        input, select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-color: #fff;
        }
        input:focus, select:focus {
            border-color: #3498db;
            outline: none;
        }
        input[type="submit"] {
            grid-column: span 2;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.2s;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            color: #2c3e50;
            font-weight: 600;
        }
        tr:hover {
            background-color: #fdfdfd;
        }
        .btn-action {
            text-decoration: none;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
        }
        .btn-edit { background-color: #f1c40f; color: #fff; margin-right: 5px; }
        .btn-edit:hover { background-color: #d4ac0d; }
        .btn-delete { background-color: #e74c3c; color: #fff; }
        .btn-delete:hover { background-color: #c0392b; }
        .link-github { color: #3498db; text-decoration: none; font-weight: 600; }
        .link-github:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Engineer Job Application Form</h2>
    <form action="core/handleForms.php" method="POST">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" required placeholder="John">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" required placeholder="Doe">
        </div>
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email_address" required placeholder="johndoe@example.com">
        </div>
        <div class="form-group">
            <label>Preferred Cloud Platform</label>
            <select name="preferred_cloud" required>
                <option value="">--Select Platform--</option>
                <option value="AWS">Amazon Web Services (AWS)</option>
                <option value="Google Cloud">Google Cloud Platform (GCP)</option>
                <option value="Azure">Microsoft Azure</option>
            </select>
        </div>
        <div class="form-group">
            <label>Years of Experience</label>
            <input type="number" name="years_experience" min="0" required placeholder="0">
        </div>
        <div class="form-group">
            <label>GitHub Portfolio URL</label>
            <input type="url" name="github_url" required placeholder="https://github.com">
        </div>
        <input type="submit" name="insertApplicationBtn" value="Submit Application">
    </form>

    <h2>Submitted Applications</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Cloud Platform</th>
                <th>Experience (Yrs)</th>
                <th>GitHub</th>
                <th>Date Added</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM data_engineer_applications");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['application_id']); ?></td>
                <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                <td><?php echo htmlspecialchars($row['email_address']); ?></td>
                <td><?php echo htmlspecialchars($row['preferred_cloud']); ?></td>
                <td><?php echo htmlspecialchars($row['years_experience']); ?></td>
                <td><a class="link-github" href="<?php echo htmlspecialchars($row['github_url']); ?>" target="_blank">View Repo</a></td>
                <td><?php echo htmlspecialchars($row['date_added']); ?></td>
                <td>
                    <a class="btn-action btn-edit" href="edit.php?id=<?php echo $row['application_id']; ?>">Edit</a>
                    <a class="btn-action btn-delete" href="delete.php?id=<?php echo $row['application_id']; ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
