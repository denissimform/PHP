<h1 class="text-center fw-bold">Article Post On LinkedIn</h1>
<form id="form" data-form="post_article" class="m-1 border border-2 p-4">
    <div class="mb-3 input-group">
        <span class="input-group-text">Title</span>
        <input type="text" class="form-control border shadow-none" name="title" id="title" aria-describedby="Title" required>
    </div>
    <div class="mb-3 input-group">
        <span class="input-group-text">URL</span>
        <input type="url" class="form-control border shadow-none" name="url" id="url" required />
    </div>
    <div class="mb-3 input-group">
        <span class="input-group-text">Text</span>
        <input type="text" class="form-control border shadow-none" name="text" id="text" required />
    </div>
    <div class="mb-3 input-group">
        <span class="input-group-text">Description</span>
        <textarea class="form-control border shadow-none" name="desc" id="desc" aria-label="Description" required></textarea>
    </div>
    <div class="mb-3 input-group">
        <span class="input-group-text">Tags</span>
        <textarea class="form-control border shadow-none" name="tag" required></textarea>
    </div>
    <div class="mb-3 input-group">
        <input type="reset" class="btn btn-success w-100 " id="reset" value="Reset" hidden>
        <input type="submit" class="btn btn-success w-100" id="submit" value="Submit">
        <button class="btn btn-success w-100 d-none" id="spinner" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
        </button>
    </div>
</form>