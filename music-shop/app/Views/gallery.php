<?php ob_start(); ?>
<h1>Gallery</h1>

<div class="gallery-container">
<?php foreach($photos as $g): ?>
    <div class="photo-block">
        <img src="/uploads/gallery/<?= $g['filename'] ?>" width="250">
    </div>
<?php endforeach; ?>
</div>

<?php

