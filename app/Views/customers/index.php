<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Accounts</title>
</head>
<body>
    <h1>Customer Accounts</h1>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('customers/new') ?>">Add New Customer</a> |
        <a href="<?= site_url('users') ?>">User Accounts</a>
    </nav>

    <?php if (session('success')): ?>
        <p style="color: green;"><?= esc(session('success')) ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['customer_id']) ?></td>
                    <td><?= esc($customer['first_name']) ?></td>
                    <td><?= esc($customer['last_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                    <td><?= esc($customer['address']) ?></td>
                    <td>
                        <a href="<?= site_url('customers/' . $customer['customer_id'] . '/edit') ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>