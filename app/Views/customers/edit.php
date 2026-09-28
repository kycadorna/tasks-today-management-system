<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>
    <h1>Edit Customer</h1>

    <p><a href="<?= site_url('customers') ?>">Back to Customer Accounts</a></p>

    <?php if (! empty($errors)): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('customers/' . $customer['customer_id']) ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label>First Name</label><br>
            <input type="text" name="first_name"
                   value="<?= esc(old('first_name', $customer['first_name'])) ?>">
        </p>

        <p>
            <label>Last Name</label><br>
            <input type="text" name="last_name"
                   value="<?= esc(old('last_name', $customer['last_name'])) ?>">
        </p>

        <p>
            <label>Email</label><br>
            <input type="email" name="email"
                   value="<?= esc(old('email', $customer['email'])) ?>">
        </p>

        <p>
            <label>Phone</label><br>
            <input type="text" name="phone"
                   value="<?= esc(old('phone', $customer['phone'])) ?>">
        </p>

        <p>
            <label>Address</label><br>
            <textarea name="address"><?= esc(old('address', $customer['address'])) ?></textarea>
        </p>

        <button type="submit">Update Customer</button>
    </form>
</body>
</html>