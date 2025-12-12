<h1 class="mb-4">Add News</h1>

<div class="card">
    <div class="card-body">

        <form method="post" action="/?r=admin-news-store" class="row g-3">

            <div class="col-12">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="col-12">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="6" required></textarea>
            </div>

            <div class="col-12 d-flex justify-content-between">
                <a href="/?r=admin-news" class="btn btn-secondary">⬅ Back</a>
                <button class="btn btn-success">Create</button>
            </div>

        </form>

    </div>
</div>
