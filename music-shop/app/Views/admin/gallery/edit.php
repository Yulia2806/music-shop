<h2>Edit Photo</h2>

<div class="mb-3">
    <a class="btn btn-secondary" href="/?r=admin-gallery">← Back</a>
</div>

<div class="card p-4" style="max-width:600px;">
    <img src="/uploads/gallery/<?= $photo['filename'] ?>" style="width:100%;border-radius:5px;" class="mb-3">

    <form action="/?r=admin-gallery-update" method="post">
        <input type="hidden" name="id" value="<?= $photo['id'] ?>">

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description"><?= htmlspecialchars($photo['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Alt text</label>
            <input class="form-control" name="alt_text" 
                   value="<?= htmlspecialchars($photo['alt_text']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Sort order</label>
            <input type="number" class="form-control" name="sort_order" 
                   value="<?= $photo['sort_order'] ?>">
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="/?r=admin-gallery" class="btn btn-secondary">Cancel</a>
    </form>
</div>
