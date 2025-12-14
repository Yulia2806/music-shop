<h1>Pages</h1>

<a href="/?r=admin-pages-create" class="btn btn-success mb-3">Add Page</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($pages as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['title']) ?></td>
            <td><?= htmlspecialchars($p['slug']) ?></td>
            <td>
                <a href="/?r=admin-pages-edit&id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/?r=admin-pages-delete&id=<?= $p['id'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete?')">
                    Delete
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
