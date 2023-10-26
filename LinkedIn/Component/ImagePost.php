<h1 class="text-center fw-bold">Image Post On LinkedIn</h1>
<form id="form" data-form="post_image" class="m-1 border border-2 p-4">
    <div id="preview-imgs" class="mb-3 d-flex justify-content-center flex-row flex-wrap"></div>
    <div class="mb-3 input-group">
        <input type="file" class="form-control border shadow-none" name="img[]" id="img" multiple>
    </div>
    <div class="mb-3 input-group">
        <span class="input-group-text">Title</span>
        <input type="text" class="form-control border shadow-none" name="title" id="title" required>
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
        <input type="reset" class="btn btn-success w-100" id="reset" value="Reset" hidden>
        <input type="submit" class="btn btn-success w-100" id="submit" value="Submit">
        <button class="btn btn-success w-100 d-none" id="spinner" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
        </button>
    </div>
</form>