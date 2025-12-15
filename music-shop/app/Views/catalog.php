<h1>Products</h1>

<!-- <?php foreach ($products as $p): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
        <b><?= htmlspecialchars($p['title']) ?></b><br>
        💰 Price: <?= $p['price'] ?><br>
        📦 Stock: <?= $p['stock'] ?><br>
        📝 <?= htmlspecialchars($p['description']) ?>
    </div>
<?php endforeach; ?> -->

<div id="products" class="row"></div>

<script>
fetch('/?r=catalog-ajax')
    .then(res => res.json())
    .then(products => {
        const container = document.getElementById('products');
        container.innerHTML = '';

        products.forEach(p => {
            container.innerHTML += `
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5>${p.title}</h5>
                            <p>${p.description ?? ''}</p>
                            <strong>${p.price} грн</strong>
                        </div>
                    </div>
                </div>
            `;
        });
    });
</script>




