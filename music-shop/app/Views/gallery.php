
<h1>Gallery</h1>
<div id="gallery" class="row"></div>


<script>
function loadGallery() {
    fetch('/?r=gallery-ajax')
        .then(res => res.json())
        .then(images => {
            let html = '';

            images.forEach(img => {
                html += `
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm">
                            <img src="/uploads/gallery/${img.filename}"
                                 class="img-fluid rounded"
                                 alt="${img.alt_text ?? ''}">
                        </div>
                    </div>
                `;
            });

            document.getElementById('gallery').innerHTML = html;
        });
}

loadGallery();
</script>

<!-- <div class="gallery-container">
<?php foreach($photos as $g): ?>
    <div class="photo-block">
        <img src="/uploads/gallery/<?= $g['filename'] ?>" width="250">
    </div>
<?php endforeach; ?>
</div> -->



