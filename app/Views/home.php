<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks for Today</title>
</head>
<body>
    <h1>Tasks for Today Management System</h1>

    <p>Welcome! Select a page below.</p>

    <p>
        <a href="<?= site_url('tasks') ?>">Task List</a>
    </p>

    <p>
        <a href="<?= site_url('profile') ?>">Profile</a>
    </p>

    <p>
        <a href="<?= site_url('about') ?>">About</a>
    </p>

    <?php if (session()->get('isLoggedIn')): ?>
        <p>
            <a href="<?= site_url('logout') ?>">Logout</a>
        </p>
    <?php else: ?>
        <p>
            <a href="<?= site_url('login') ?>">Login</a>
        </p>
    <?php endif; ?>
</body>
</html>