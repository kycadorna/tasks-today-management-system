<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>

    <p>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('tasks') ?>">Tasks</a> |
        <a href="<?= site_url('about') ?>">About</a>
    </p>

    <?php if (session()->get('isLoggedIn')): ?>
        <?php $user = session()->get('user'); ?>

        <p>
            Username:
            <?= esc($user['username'] ?? 'Not available') ?>
        </p>

        <p>
            First Name:
            <?= esc($user['firstname'] ?? $user['first_name'] ?? 'Not available') ?>
        </p>

        <p>
            Last Name:
            <?= esc($user['lastname'] ?? $user['last_name'] ?? 'Not available') ?>
        </p>

        <p>
            Email:
            <?= esc($user['email'] ?? 'Not available') ?>
        </p>

        <p>
            <a href="<?= site_url('logout') ?>">Logout</a>
        </p>
    <?php else: ?>
        <p>You are not logged in.</p>

        <p>
            <a href="<?= site_url('login') ?>">Login</a>
        </p>
    <?php endif; ?>
</body>
</html>