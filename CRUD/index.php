<html>

<head>
    <title>CRUD in PHP</title>
    <link rel="stylesheet" href="../src/bootstrap.min.css">
</head>

<body>
    <div class="container w-50 my-2 mx-auto p-0 ">
        <form class="mt-1 border-1 row p-3 mb-3 border border-1 rounded-3" id="form" method="POST" enctype="multipart/form-data">
            <div class="alert alert-success alert-dismissible d-none" id="success">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-danger alert-dismissible d-none" id="error">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <h1 class="text-center bg-danger text-white rounded-3">CRUD in PHP</h1>
            <div class="mb-3 col-12 d-flex justify-content-center" id="preview-img-body">
            </div>
            <div class=" mb-3 col-12">
                <label for="img" class="form-label">Image: </label>
                <input type="file" class="form-control" name="img" id="img" multiple required>
            </div>
            <div class="mb-3 col-12">
                <label for="product_name" class="form-label">Product name: </label>
                <input type="text" class="form-control" name="product_name" id="product_name" required>
            </div>
            <div class="mb-3 col-12">
                <label for="price" class="form-label">Price: </label>
                <input type="number" class="form-control" name="price" id="price" required>
            </div>
            <div class="col-12">
                <input type="submit" name="submit" value="submit" id="submit" class="btn btn-success w-100">
                <input type="reset" name="reset" value="reset" id="reset" class="btn btn-primary w-100" hidden>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr class="w-100">
                    <th scope="col">Product ID</th>
                    <th scope="col">Product images</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="table-data"></tbody>
        </table>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-body">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update product details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeBtn()"></button>
                </div>
            </div>
        </div>
    </div>
    <script src="../src/bootstrap.bundle.min.js"></script>
    <script src="../src/jquery-3.6.4.min.js"></script>

    <script src="./JS/index.js"></script>
</body>

</html>