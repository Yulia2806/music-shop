<div class="container mt-4">

    <h1 class="mb-4">Pages</h1>

    <?php if (!empty($pages)): ?>

        <div class="row g-4">
            <?php foreach ($pages as $p): ?>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">

                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title">
                                <?= htmlspecialchars($p['title']) ?>
                            </h5>

                            <p class="card-text text-muted">
                                <?= htmlspecialchars(mb_substr(strip_tags($p['content']), 0, 120)) ?>...
                            </p>

                            <a href="/?r=page&id=<?= $p['id'] ?>" class="btn btn-primary mt-auto">View</a>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <p>No pages found.</p>
    <?php endif; ?>

</div>
