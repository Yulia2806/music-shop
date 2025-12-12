<h1>Products</h1>

<?php foreach ($products as $p): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
        <b><?= htmlspecialchars($p['title']) ?></b><br>
        💰 Price: <?= $p['price'] ?><br>
        📦 Stock: <?= $p['stock'] ?><br>
        📝 <?= htmlspecialchars($p['description']) ?>
    </div>
<?php endforeach; ?>
