<h1 class="mb-4">News</h1>

<?php if (!empty($news)): ?>
    <?php foreach ($news as $item): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h3><?= htmlspecialchars($item['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars(mb_strimwidth($item['content'], 0, 500, '...'))) ?></p>

                <a href="/?r=news-view&id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">
                    Read more
                </a>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="alert alert-info">No news yet.</div>
<?php endif; ?>
