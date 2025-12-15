<!-- <div class="container mt-4">

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

</div> -->


<div class="container mt-4">

    <h1 class="mb-4">Pages</h1>

    <div class="row g-4" id="pages-container">
        <!-- AJAX pages here -->
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', loadPages);

function loadPages() {
    fetch('/?r=pages-ajax')
        .then(res => res.json())
        .then(resp => {

            const container = document.getElementById('pages-container');
            container.innerHTML = '';

            if (resp.data.length === 0) {
                container.innerHTML = '<p>No pages found.</p>';
                return;
            }

            resp.data.forEach(p => {
                const col = document.createElement('div');
                col.className = 'col-md-4';

                col.innerHTML = `
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">${escapeHtml(p.title)}</h5>

                            <p class="card-text text-muted">
                                ${escapeHtml(p.content.substring(0, 120))}...
                            </p>

                            <a href="/?r=page&id=${p.id}" class="btn btn-primary mt-auto">
                                View
                            </a>
                        </div>
                    </div>
                `;

                container.appendChild(col);
            });
        });
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
</script>





