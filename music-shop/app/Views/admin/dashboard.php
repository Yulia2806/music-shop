<div class="container mt-4">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Admin Panel</h2>

    
    <div class="d-flex gap-2">
        <a href="/?r=admin-news" class="btn btn-success">
            📰 Manage News
        </a>
        <a class="btn btn-warning" href="/?r=admin-gallery">🖼 Admin Gallery</a>
        <a href="/?r=admin-pages" class="btn btn-info">
            📄 Manage Pages
        </a>
        <a href="/?r=/" class="btn btn-secondary">⬅ On the main</a>
        <a href="/?r=logout" class="btn btn-danger">Log out</a>
    </div>
</div>

    <!-- ADD PRODUCT -->
    <div class="card mb-4">
        <div class="card-body">
            <h4>Add Product</h4>

            <form method="post" action="/?r=admin-product-create" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="title" class="form-control" placeholder="Name" required>
                </div>

                <div class="col-md-2">
                    <input type="number" name="price" class="form-control" placeholder="Price" required>
                </div>

                <div class="col-md-2">
                    <input type="number" name="stock" class="form-control" placeholder="Stock" required>
                </div>

                <div class="col-md-4">
                    <input type="text" name="description" class="form-control" placeholder="Description">
                </div>

                <div class="col-12">
                    <button class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>

    <!-- PRODUCTS TABLE -->
    <div class="card">
        <div class="card-body">
            <h4>Products</h4>

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= htmlspecialchars($p['title']) ?></td>
                        <td><?= $p['price'] ?></td>
                        <td><?= $p['stock'] ?></td>
                        <td><?= htmlspecialchars($p['description']) ?></td>
                        <td>
                            <a href="/?r=admin-product-delete&id=<?= $p['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                            <a href="/?r=admin-product-edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
