<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Accounts</title>
</head>
<body>
    <h1>User Accounts</h1>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('customers') ?>">Customer Accounts</a> |
        <a href="<?= site_url('users/new') ?>">Add New User</a>
    </nav>

    <?php if (session('success')): ?>
        <p style="color: green;"><?= esc(session('success')) ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>ID</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?php if (! empty($user['avatar'])): ?>
                            <img src="<?= base_url('uploads/' . $user['avatar']) ?>"
                                 alt="Profile image"
                                 width="60"
                                 height="60"
                                 style="object-fit: cover;">
                        <?php else: ?>
                            <div style="width: 60px; height: 60px; background: #dddddd;
                                        display: flex; align-items: center; justify-content: center;">
                                No image
                            </div>
                        <?php endif; ?>
                    </td>
                    <td><?= esc($user['user_id']) ?></td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['first_name']) ?></td>
                    <td><?= esc($user['last_name']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= esc($user['role']) ?></td>
                    <td>
                        <a href="<?= site_url('users/' . $user['user_id'] . '/edit') ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>