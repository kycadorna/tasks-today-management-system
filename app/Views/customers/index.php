<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Accounts</title>
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
</head>
<body>
    <div class="container">
    <h1>Customer Accounts</h1>
    <h1>Customer Accounts</h1>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('users') ?>">User Accounts</a>
    </nav>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>
</html>