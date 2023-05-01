<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_log(E_ALL);
ini_set("mysqli.default_port", '');
?>

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
            <div class="mb-3 col-12 d-flex justify-content-center">
                <input type="hidden" class="form-control d-none" name="product_id" id="product_id">
                <img width='100' alt='Product image' class="d-none" id='preview-img' />
            </div>
            <div class=" mb-3 col-12">
                <label for="img" class="form-label">Image: </label>
                <input type="file" class="form-control" name="img" id="img">
            </div>
            <div class="mb-3 col-12">
                <label for="product_name" class="form-label">Product name: </label>
                <input type="text" class="form-control" name="product_name" id="product_name">
            </div>
            <div class="mb-3 col-12">
                <label for="price" class="form-label">Price: </label>
                <input type="number" class="form-control" name="price" id="price">
            </div>
            <div class="col-12">
                <input type="submit" name="submit" value="submit" id="submit" class="btn btn-success w-100">
                <input type="submit" name="update" value="update" id="update" class="d-none btn btn-danger w-100">
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

    <script src="../src/bootstrap.bundle.min.js"></script>
    <script src="../src/jquery-3.6.4.min.js"></script>

    <script>
        const changeImage = (event) => {
            const reader = new FileReader();

            reader.onload = () => {
                $("#preview-img").removeClass("d-none").attr("src", reader.result);
            }

            reader.readAsDataURL(event.target.files[0]);
        }
        $("#img").change(changeImage);

        const getData = () => {
            $.ajax({
                url: "./action/data.php",
                method: "GET",
                success: (res) => {
                    $("#reset").click();
                    $("#table-data").html(res);
                    $("#preview-img").attr("src", "").addClass("d-none");
                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
        getData();

        const updateData = (id) => {
            $("#product_id").removeClass("d-none").val(id);
            $("#submit").addClass("d-none");
            $("#update").removeClass("d-none");
            $("#preview-img").removeClass("d-none").attr("src", $("#img" + id).attr("src"));
            $("#product_name").removeClass("d-none").val($("#name" + id).html());
            $("#price").removeClass("d-none").val($("#price" + id).html());
        }

        const deleteData = (id) => {
            $.ajax({
                url: "./action/setData.php",
                method: "POST",
                data: {
                    id: id,
                    delete: true
                },
                success: (res) => {
                    getData();
                },
                error: (err) => {
                    console.log(err);
                }
            })
        }

        const addData = (event) => {
            event.preventDefault();
            const fileData = new FormData(event.target);
            fileData.append($("#submit").hasClass("d-none") ? 'update' : 'submit', true);
            $.ajax({
                url: "./action/setData.php",
                method: "POST",
                contentType: false,
                processData: false,
                data: fileData,
                success: (res) => {
                    res = JSON.parse(res);
                    if (res.success) {
                        $("#error").addClass("d-none");
                        $("#success").removeClass("d-none").prepend(res.message);
                        getData();
                    } else {
                        $("#success").addClass("d-none");
                        $("#error").removeClass("d-none").prepend(res.message);
                    }
                },
                error: (err) => {
                    console.log(err);
                }
            })

            $("#submit").removeClass("d-none");
            $("#update").addClass("d-none");
        }
        $('#form').submit(addData);
    </script>
</body>

</html>