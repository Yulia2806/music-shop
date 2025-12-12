<h1><?= htmlspecialchars($news['title']) ?></h1>

<p><?= nl2br(htmlspecialchars($news['content'])) ?></p>

<a href="/?r=news" class="btn btn-secondary">← Back to News</a>
