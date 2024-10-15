<?php
require_once('core/dbConfig.php');
require_once('core/models.php');

$applications = getApplications($pdo);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Applications</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            color: #333;
        }

        h1 {
            color: forestgreen;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: forestgreen;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: forestgreen;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .message {
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: forestgreen;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #228b22;
        }
    </style>
</head>

<body>
    <h1>YOUR DREAM JOB REGISTRATION SYSYTEM</h1>

    <?php if (isset($_GET['message'])): ?>
        <p class="message success"><?php echo $_GET['message']; ?></p>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <p class="message error"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Job Position</th>
                <th>Resume Link</th>
                <th>Status</th>
                <th>Date Applied</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $application): ?>
                <tr>
                    <td><?php echo $application['id']; ?></td>
                    <td><?php echo $application['full_name']; ?></td>
                    <td><?php echo $application['email']; ?></td>
                    <td><?php echo $application['phone']; ?></td>
                    <td><?php echo $application['job_position']; ?></td>
                    <td><a href="<?php echo $application['resume_link']; ?>">View Resume</a></td>
                    <td><?php echo $application['status']; ?></td>
                    <td><?php echo $application['date_applied']; ?></td>
                    <td>
                        <a href="editApplication.php?id=<?php echo $application['id']; ?>">Edit</a> |
                        <a href="deleteApplication.php?id=<?php echo $application['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Add New Application</h2>
    <form method="POST" action="core/handleForm.php">
        <label for="name">Full Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>

        <label for="job_position">Job Position:</label>
        <input type="text" name="job_position" required><br>

        <label for="resume_link">Resume Link:</label>
        <input type="text" name="resume_link"><br>

        <button type="submit">Submit Application</button>
    </form>
</body>

</html>
