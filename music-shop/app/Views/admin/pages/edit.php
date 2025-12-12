<?php ob_start(); ?>

<h1>Edit Page</h1>

<form method="post" action="/?r=admin-pages-update">

    <input type="hidden" name="id" value="<?= $page['id'] ?>">

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($page['title']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control" value="<?= htmlspecialchars($page['slug']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" class="form-control" rows="6"><?= htmlspecialchars($page['content']) ?></textarea>
    </div>

    <button class="btn btn-primary">Save</button>
    <a href="/?r=admin-pages" class="btn btn-secondary">Cancel</a>

</form>
