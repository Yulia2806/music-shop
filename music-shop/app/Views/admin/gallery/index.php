<h2>Gallery Admin</h2>

<div class="mb-3">
    <a class="btn btn-secondary" href="/?r=admin">← Back to Admin</a>
</div>

<h4>Upload new photo</h4>

<form method="post" action="/?r=admin-gallery-upload" enctype="multipart/form-data" class="mb-4">
    <input type="file" name="photo" required>
    <button class="btn btn-primary">Upload</button>
</form>

<hr>

<h4>All Photos</h4>

<div class="row">
    <?php foreach ($photos as $p): ?>
        <div class="col-3 mb-3">
            <img src="/uploads/gallery/<?= $p['filename'] ?>" style="width:100%; border-radius:5px;">

            <div class="mt-2 d-flex gap-2">
                <a href="/?r=admin-gallery-edit&id=<?= $p['id'] ?>" class="btn btn-warning btn-sm w-50">Edit</a>

                <a href="/?r=admin-gallery-delete&id=<?= $p['id'] ?>"
                   onclick="return confirm('Delete?')"
                   class="btn btn-danger btn-sm w-50">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

