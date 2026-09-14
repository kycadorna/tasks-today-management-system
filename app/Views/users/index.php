<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
</head>
<body>
    <div class="container">
    <h1>User Accounts</h1>
    <nav>
        <a href="<?= site_url('/') ?>">Home</a> |
         <a href="<?= site_url('customers') ?>">Customer Accounts</a>
    </nav>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= esc($user['user_id']) ?></td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['first_name']) ?></td>
                    <td><?= esc($user['last_name']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= esc($user['role']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>