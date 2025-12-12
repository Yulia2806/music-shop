<h2>Edit Product</h2>

<form method="post" action="/?r=admin-update">

    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <p>
        <input type="text" name="title" 
               value="<?= htmlspecialchars($product['title']) ?>" 
               placeholder="Name" required>
    </p>

    <p>
        <input type="number" name="price" 
               value="<?= $product['price'] ?>" 
               placeholder="Price" required>
    </p>

    <p>
        <input type="number" name="stock" 
               value="<?= $product['stock'] ?>" 
               placeholder="Stock" required>
    </p>

    <p>
        <textarea name="description" placeholder="Description"
                  style="width:300px; height:80px;"><?= htmlspecialchars($product['description']) ?></textarea>
    </p>

    <button type="submit">Update</button>
</form>

<br>
<a href="/?r=admin">← Back to Admin</a>

