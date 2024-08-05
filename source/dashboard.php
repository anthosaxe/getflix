<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getflix Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>This is your dashboard.</p>

        <?php if ($_SESSION['role'] === 'admin') : ?>
            <div class="admin-section">
                <h2>Admin Section</h2>
                <p>This content is only visible to administrators.</p>
                <!-- Add admin-specific features here -->
                <ul>
                    <li><a href="manage_users.php">Manage Users</a></li>
                    <li><a href="site_settings.php">Site Settings</a></li>
                </ul>
            </div>
        <?php endif; ?>

        <div class="user-section">
            <h2>User Section</h2>
            <p>This content is visible to all users.</p>
            <!-- Add user-specific features here -->
            <ul>
                <li><a href="edit_profile.php">Edit Profile</a></li>
                <li><a href="view_content.php">View Content</a></li>
            </ul>
        </div>

        <a href="logout.php">Logout</a>
    </div>
</body>

</html>