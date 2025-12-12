<h1>Create Page</h1>

<form method="post" action="/?r=admin-pages-store">
    <div class="mb-3">
        <label>Title</label>
        <input name="title" class="form-control">
    </div>

    <div class="mb-3">
        <label>Slug</label>
        <input name="slug" class="form-control">
    </div>

    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="8"></textarea>
    </div>

    <button class="btn btn-success">Save</button>
</form>
