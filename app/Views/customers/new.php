<!DOCTYPE html>
<html>
<head>
    <title>Add New Customer</title>
</head>
<body>
    <h1>Add New Customer</h1>

    <p><a href="<?= site_url('customers') ?>">Back to Customer Accounts</a></p>

    <?php if (! empty($errors)): ?>
        <ul style="color: red;">
        <?php foreach ($errors as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('customers') ?>" method="post">
        <?= csrf_field() ?>

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
            <label>Phone</label><br>
            <input type="text" name="phone" value="<?= old('phone') ?>">
        </p>

        <p>
            <label>Address</label><br>
            <textarea name="address"><?= old('address') ?></textarea>
        </p>

        <button type="submit">Save Customer</button>
    </form>
</body>
</html>