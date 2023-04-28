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
        <form class="mt-1 border-1 row p-3 mb-3 border border-1 rounded-3" id="form">
            <h1 class="text-center bg-danger text-white rounded-3">CRUD in PHP</h1>
            <div class="mb-3 col-12">
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
                <input type="submit" name="submit" value="submit" aria-hidden="true" class="btn btn-success w-100">
            </div>
        </form>

        <table class="table">
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Product images</th>
                <th scope="col">Product name</th>
                <th scope="col">Product price</th>
            </tr>
            <tr id="table-data"></tr>
        </table>
    </div>

    <script src="../src/bootstrap.bundle.min.js"></script>
    <script src="../src/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(() => {
            const getData = () => {
                $.ajax({
                    url: "./action/data.php",
                    method: "GET",
                    success: (res) => {
                        $("#table-data").html(res);
                    },
                    error: (err) => {
                        console.log(err);
                    }
                })
            }

            const addData = () => {
                const reader = new FileReader();
                reader.onload = (() => {
                    $.ajax({
                        url: "./action/data.php",
                        method: "POST",
                        processData: false,
                        contentType: false,
                        data: {
                            name: $("#product_name").val(),
                            image: reader.result,
                            price: $("#price").val(),
                            submit: true
                        },
                        success: (res) => {
                            getData();
                        },
                        error: (err) => {
                            console.log(err);
                        }
                    })
                });

                reader.readAsDataURL($("#img").val());
            }

            const deleteData = (id) => {
                $.ajax({
                    url: "./action/data.php",
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

            getData();
        })
    </script>
</body>

</html>