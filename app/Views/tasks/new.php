<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Task</title>
</head>
<body>
    <h1>Create New Task</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('tasks') ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label for="title">Title</label><br>
            <input
                type="text"
                id="title"
                name="title"
                value="<?= old('title') ?>"
                required
            >
        </p>

        <p>
            <label for="description">Description</label><br>
            <textarea
                id="description"
                name="description"
                rows="5"
            ><?= old('description') ?></textarea>
        </p>

        <p>
            <label for="task_date">Task Date</label><br>
            <input
                type="date"
                id="task_date"
                name="task_date"
                value="<?= old('task_date') ?>"
                required
            >
        </p>

        <button type="submit">Save Task</button>
        <a href="<?= site_url('tasks') ?>">Cancel</a>
    </form>
</body>
</html>