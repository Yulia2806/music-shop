<div class="container mt-4">
<h1>Gallery</h1>

<div class="row">
    <?php foreach ($photos as $p): ?>
        <div class="col-md-3 mb-3">
            <img src="/uploads/<?= $p['filename'] ?>" class="img-fluid rounded shadow">
        </div>
    <?php endforeach; ?>
</div>
</div>
