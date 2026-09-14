<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS System</title>

    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
</head>
<body>

    <div class="container">
        <h1>POS Account Management System</h1>

        <p>Welcome! Select an account page below.</p>

        <nav>
            <a href="<?= site_url('customers') ?>">Customer Accounts</a>
            <a href="<?= site_url('users') ?>">User Accounts</a>
        </nav>
    </div>

</body>
</html>