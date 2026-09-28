<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
</head>
<body>
    <h1>Add New User</h1>

    <p><a href="<?= site_url('users') ?>">Back to User Accounts</a></p>

    <?php if (! empty($errors)): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('users') ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label>Username</label><br>
            <input type="text" name="username" value="<?= old('username') ?>">
        </p>

        <p>
            <label>Password</label><br>
            <input type="password" name="password">
        </p>

        <p>
            <label>First Name</label><br>
            <input type="text" name="first_name" value="<?= old('first_name') ?>">
        </p>

        <p>
            <label>Last Name</label><br>
            <input type="text" name="last_name" value="<?= old('last_name') ?>">
        </p>

        <p>
            <label>Email</label><br>
            <input type="email" name="email" value="<?= old('email') ?>">
        </p>

        <p>
            <label>Role</label><br>
            <select name="role">
                <option value="">Select a role</option>
                <option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="staff" <?= old('role') === 'staff' ? 'selected' : '' ?>>Staff</option>
            </select>
        </p>

        <button type="submit">Save User</button>
    </form>
</body>
</html>