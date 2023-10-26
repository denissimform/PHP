<h1 class="text-center fw-bold">Normal Post On LinkedIn</h1>
<form id="form" data-form="post_text" class="m-1 border border-2 p-4">
    <div class="mb-3 input-group">
        <span class="input-group-text">Text</span>
        <textarea class="form-control border shadow-none" name="text" id="text" aria-describedby="text"></textarea>
    </div>
    <div class="mb-3 input-group">
        <span class="input-group-text">Tags</span>
        <textarea class="form-control border shadow-none" name="tag"></textarea>
    </div>
    <div class="mb-3 input-group">
        <input type="submit" class="btn btn-success w-100" id="submit" value="Submit">
        <input type="reset" class="btn btn-success w-100" id="reset" value="Reset" hidden>
        <button class="btn btn-success w-100 d-none" id="spinner" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
        </button>
    </div>
</form>