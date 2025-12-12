
<h1>ADMIN PANEL</h1>

<a href="/music-shop/public/logout">Log out</a>

<h3>Add Product (AJAX)</h3>

<form id="addForm">
    <input type="text" name="title" placeholder="Name" required>
    <input type="number" name="price" placeholder="Price" required>
    <input type="number" name="stock" placeholder="Stock" required>
    <textarea name="description" placeholder="Description"></textarea>
    <button type="submit">Add</button>
</form>

<div id="msg"></div>

<script>
document.getElementById('addForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch('/?r=admin-create-ajax', {
    method: 'POST',
    body: formData
})
.then(response => response.text())
.then(text => {
    console.log('SERVER RESPONSE:', text);

    try {
        const data = JSON.parse(text);

        if (data.status === 'success') {
            document.getElementById('msg').innerHTML = '✅ Product added!';
            setTimeout(() => location.reload(), 500);
        } else {
            document.getElementById('msg').innerHTML = '❌ Error';
        }
    } catch (e) {
        document.getElementById('msg').innerHTML = '❌ Not JSON response';
    }
});

});
</script>

<h3>Products</h3>

<?php foreach ($products as $p): ?>
    <div style="border:1px solid #ccc; padding:5px; margin:5px 0;">
        <b><?= htmlspecialchars($p['title']) ?></b><br>
        Price: <?= $p['price'] ?><br>
        Stock: <?= $p['stock'] ?><br>
        Description: <?= htmlspecialchars($p['description']) ?><br>

        <a href="/?r=admin-delete&id=<?= $p['id'] ?>">Delete</a> |
        <a href="/?r=admin-edit&id=<?= $p['id'] ?>">Edit</a>
    </div>
<?php endforeach; ?>

