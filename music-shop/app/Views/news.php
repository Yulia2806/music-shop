<h1 class="mb-4">News</h1>
<div id="news-list" class="row"></div>

<script>
function loadNews() {
    fetch('/?r=news-ajax')
        .then(response => response.json())
        .then(news => {

            let html = '';

            if (news.length === 0) {
                html = '<p>No news found.</p>';
            }

            news.forEach(item => {
                html += `
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">${item.title}</h5>
                                <p class="text-muted small">
                                    ${item.created_at ?? ''}
                                </p>
                                <p class="card-text">
                                    ${item.content.substring(0, 150)}...
                                </p>
                                <a href="/?r=news-view&id=${item.id}"
                                   class="btn btn-primary btn-sm">
                                    Read more
                                </a>
                            </div>
                        </div>
                    </div>
                `;
            });

            document.getElementById('news-list').innerHTML = html;
        });
}

loadNews();
</script>


<!-- <?php if (!empty($news)): ?>
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
<?php endif; ?> -->
