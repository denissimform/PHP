<?php
require_once("./conf.php");

if (isset($_POST['submit'])) {
    $sql = "insert into product (name, price, image) values(?,?,'" . addslashes(file_get_contents($_FILES['img']['tmp_name'])) . "')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $_POST['product_name'], $_POST['price']);
    if ($stmt->execute()) {
        echo json_encode($success);
    } else {
        echo json_encode($error);
    }
}

if (isset($_POST['update'])) {
    $sql = "update product set name = ?, price = ?, image= '" . addslashes(file_get_contents($_FILES['img']['tmp_name'])) . "' where id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdi", $_POST['product_name'], $_POST['price'], $_POST['product_id']);
    if ($stmt->execute()) {
        echo json_encode($success);
    } else {
        echo json_encode($error);
    }
}

if (isset($_POST['delete'])) {
    $sql = "delete from product where id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST['id']);
    if ($stmt->execute()) {
        echo json_encode($success);
    } else {
        echo json_encode($error);
    }
}

if (isset($_POST['getData'])) {
    $sql = "select * from product where id= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['id']);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $res = $res->fetch_assoc();
        $output = ' <form id="update-form" method="POST" enctype="multipart/formdata">
                        <div class="modal-body">
                            <div class="mb-3 col-12 d-flex justify-content-center">
                                <img src="data:image/jpeg;base64,' . base64_encode($res['image']) . '" width="100" id="updated-img-preview" alt="Product image" id="update-preview-img" />
                                <input type="hidden" class="form-control d-none" value="' . $res['id'] . '" name="product_id" id="product_id">
                            </div>
                            <div class="mb-3">
                                <label for="product-img" class="col-form-label">Product image:</label>
                                <input type="file" name="img" class="form-control" id="updated-product-img">
                            </div>
                            <div class="mb-3">
                                <label for="product-name" class="col-form-label">Name:</label>
                                <input type="text" value="' . $res['name'] . '" name="product_name" class="form-control" id="product-name">
                            </div>
                            <div class="mb-3">
                                <label for="product-price" class="col-form-label">Price:</label>
                                <input type="number" value="' . $res['price'] . '" name="price" class="form-control" id="product-price">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal" aria-label="Close">Update</button>
                        </div>
                    </form>';
        echo $output;
    } else {
        echo "No Data found!!";
    }
}
