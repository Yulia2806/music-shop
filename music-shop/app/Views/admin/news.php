
<h1 class="mb-4">News Management</h1>

<a href="/?r=admin-news-create" class="btn btn-success mb-3">+ Add News</a>

<?php if (!empty($news)): ?>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th width="50">ID</th>
            <th width="220">Title</th>
            <th>Content</th>
            <th width="200">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($news as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['title']) ?></td>

            <!-- 💡 Ось контент -->
            <td><?= htmlspecialchars(mb_strimwidth($item['content'], 0, 120, '...')) ?></td>

            <td>
                <a href="/?r=admin-news-edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/?r=admin-news-delete&id=<?= $item['id'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this news?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>

<div class="alert alert-info">No news yet</div>

<?php endif; ?>
