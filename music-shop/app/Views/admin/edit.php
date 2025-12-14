<h1 class="mb-4">Edit product</h1>

<?php if (!empty($product)): ?>

<form method="post" action="/?r=admin-product-update" class="card p-4 shadow-sm">

    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input
            type="text"
            name="title"
            class="form-control"
            value="<?= htmlspecialchars($product['title']) ?>"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input
            type="number"
            name="price"
            step="0.01"
            class="form-control"
            value="<?= $product['price'] ?>"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea
            name="description"
            class="form-control"
            rows="4"
        ><?= htmlspecialchars($product['description']) ?></textarea>
    </div>

    <div class="d-flex gap-2">
        <button class="btn btn-success">Save</button>
        <a href="/?r=admin" class="btn btn-secondary">Cancel</a>
    </div>

</form>

<?php else: ?>

<div class="alert alert-danger">
    Product not found.
</div>

<?php endif; ?>
