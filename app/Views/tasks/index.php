<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    <h1>Tasks for Today</h1>

    <p>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('profile') ?>">Profile</a> |
        <a href="<?= site_url('about') ?>">About</a>
    </p>

    <?php if (session()->getFlashdata('success')): ?>
        <p><?= esc(session()->getFlashdata('success')) ?></p>
    <?php endif; ?>

    <?php if (session()->get('isLoggedIn')): ?>
        <?php $user = session()->get('user'); ?>

        <p>
            Logged in as:
            <?= esc($user['username'] ?? $user['email'] ?? 'User') ?>
        </p>

        <p>
            <a href="<?= site_url('tasks/new') ?>">Create New Task</a> |
            <a href="<?= site_url('logout') ?>">Logout</a>
        </p>
    <?php else: ?>
        <p>
            <a href="<?= site_url('login') ?>">Login</a>
        </p>
    <?php endif; ?>

    <?php if (empty($tasks)): ?>
        <p>No active tasks found.</p>
    <?php else: ?>
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Task Date</th>

                    <?php if (session()->get('isLoggedIn')): ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['title']) ?></td>
                        <td><?= esc($task['description']) ?></td>
                        <td><?= esc($task['task_date']) ?></td>

                        <?php if (session()->get('isLoggedIn')): ?>
                            <td>
                                <a href="<?= site_url('tasks/' . $task['task_id'] . '/edit') ?>">
                                    Edit
                                </a>

                                <form action="<?= site_url('tasks/' . $task['task_id'] . '/delete') ?>" method="post" style="display:inline;">
                                    <?= csrf_field() ?>

                                    <button type="submit" onclick="return confirm('Are you sure you want to archive this task?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>