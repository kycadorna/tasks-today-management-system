<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <p><a href="<?= site_url('users') ?>">Back to User Accounts</a></p>

    <?php if (! empty($errors)): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (! empty($user['avatar'])): ?>
        <p>
            <img src="<?= base_url('uploads/' . $user['avatar']) ?>"
                 alt="Current profile image"
                 width="120">
        </p>
    <?php endif; ?>

    <form action="<?= site_url('users/' . $user['user_id']) ?>"
          method="post"
          enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="user_id" value="<?= esc($user['user_id']) ?>">

        <p>
            <label>Username</label><br>
            <input type="text" name="username"
                   value="<?= esc(old('username', $user['username'])) ?>">
        </p>

        <p>
            <label>New Password (leave blank to keep current password)</label><br>
            <input type="password" name="password">
        </p>

        <p>
            <label>First Name</label><br>
            <input type="text" name="first_name"
                   value="<?= esc(old('first_name', $user['first_name'])) ?>">
        </p>

        <p>
            <label>Last Name</label><br>
            <input type="text" name="last_name"
                   value="<?= esc(old('last_name', $user['last_name'])) ?>">
        </p>

        <p>
            <label>Email</label><br>
            <input type="email" name="email"
                   value="<?= esc(old('email', $user['email'])) ?>">
        </p>

        <p>
            <label>Role</label><br>
            <select name="role">
                <?php $selectedRole = old('role', $user['role']); ?>
                <option value="admin" <?= $selectedRole === 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="staff" <?= $selectedRole === 'staff' ? 'selected' : '' ?>>Staff</option>
            </select>
        </p>

        <p>
            <label>Profile Image (JPG or PNG, maximum 2 MB)</label><br>
            <input type="file" name="avatar" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
        </p>

        <button type="submit">Update User</button>
    </form>
</body>
</html>