<div id="alert"></div>
<form id="form1" class="form w-25 mx-auto">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" min="0" max="100" name="age" id="age" class="form-control" required>
    </div>
    <div class="mb-3">
        <input type="submit" name="Submit" id="submit" class="btn btn-success form-control">
    </div>
</form>
<hr class="w-25 mx-auto my-3">
<form id="form2" method="post" enctype="multipart/form-data" class="form w-25 m-auto">
    <input type="file" class="form-control my-2" name="csv_file" id="csv_file" accept="text/csv" required>
    <input type="submit" class="form-control btn btn-success mb-2" value="Submit csv file" name="submit_csv">
</form>