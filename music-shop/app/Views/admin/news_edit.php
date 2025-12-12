
<h1>Edit News</h1>

<form method="post" action="/?r=admin-news-update">

    <input type="hidden" name="id" value="<?= $news['id'] ?>">

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" 
               value="<?= htmlspecialchars($news['title']) ?>">
    </div>

    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="6"><?= htmlspecialchars($news['content']) ?></textarea>
    </div>

    <button class="btn btn-success">Save</button>
    <a href="/?r=admin-news" class="btn btn-secondary">Back</a>
</form>
