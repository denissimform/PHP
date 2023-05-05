<?php
require_once("./conf.php");

if (isset($_POST['submit'])) {
    try {
        $conn->begin_transaction();
        $sql = "insert into product (name, price) values(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sd", $_POST['product_name'], $_POST['price']);
        if ($stmt->execute()) {
            $id = $conn->insert_id;
            $sql = "INSERT INTO images (product_id, image) VALUES(?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $id, $imageContent);

            foreach ($_FILES['img']['tmp_name'] as $File) {
                $imageContent = (file_get_contents($File));
                $stmt->execute();
            }
            $conn->commit();
            echo json_encode($success);
        } else {
            $conn->rollback();
            echo json_encode($error);
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(["success" => false, "message" => "<b>Error: <b>" . $e->getMessage() . " at line " . $e->getLine()]);
    }
}

if (isset($_POST['update'])) {
    try {

        $conn->begin_transaction();
        $sql = "update product set name = ?, price = ? where id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdi", $_POST['product_name'], $_POST['price'], $_POST['product_id']);
        if ($stmt->execute()) {
            if (($_FILES['img']['tmp_name'][0] !== "")) {
                $sql = "INSERT INTO images (product_id, image) values(?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("is", $_POST['product_id'], $imgContent);
                foreach ($_FILES['img']['tmp_name'] as $File) {
                    $imgContent = file_get_contents($File);
                    $stmt->execute();
                }
            }
            $conn->commit();
            echo json_encode($success);
        } else {
            $conn->rollback();
            echo json_encode($error);
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(["success" => false, "message" => "<b>Error: <b>" . $e->getMessage() . " at line " . $e->getLine()]);
    }
}

if (isset($_POST['deleteImg'])) {
    $sql = "delete from images where id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST['id']);
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
        $sql = "SELECT * FROM images where product_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
        $res1 = $stmt->get_result();

        $output = ' <form id="update-form" method="POST" enctype="multipart/formdata">
                        <div class="modal-body">
                            <div class="mb-3 col-12 d-flex justify-content-center">
                                <div id="updated-img-preview" class="d-none"></div>
                                <input type="hidden" class="form-control d-none" value="' . $res['id'] . '" name="product_id" id="product_id">
                            </div>
                            <div class="mb-3">
                                <label for="product-img" class="col-form-label">Product image:</label>
                                <input type="file" name="img[]" class="form-control" id="updated-product-img" multiple value="">
                            </div>
                            <div class="mb-3">
                                <label for="product-name" class="col-form-label">Name:</label>
                                <input type="text" value="' . $res['name'] . '" name="product_name" class="form-control" id="product-name">
                            </div>
                            <div class="mb-3">
                                <label for="product-price" class="col-form-label">Price:</label>
                                <input type="number" value="' . $res['price'] . '" name="price" class="form-control" id="product-price">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label w-100">Uploaded image:</label>
                                ';

        foreach ($res1->fetch_all(MYSQLI_ASSOC) as $imgIndex => $img) {
            $output .= '    <div class="d-inline-block" id="' . $img['id'] . '" >    
                                    <img src="data:image/jpeg;base64,' . base64_encode($img['image']) . '" width="100" class="m-1" alt="Product image"/><br />
                                    <button type="button" class="btn btn-danger btn-sm m-1" style="width:100px" onclick="deleteImg(' . $img['id'] . ')">Delete</button>
                                </div>';
        }

        $output .= '        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal" aria-label="Close">Update</button>
                        </div>
                    </form>';
        echo $output;
    } else {
        echo "No Data found!!";
    }
}
