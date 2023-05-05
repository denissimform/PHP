<?php

require_once("./conf.php");

if (isset($_POST['filter'])) {
    $sql = "SELECT COUNT(*) AS count FROM product";
    $res = $conn->query($sql);
    $res = $res->fetch_assoc();
    $number_of_pages = ceil($res['count'] / 5);
    $page = "";

    if ($res['count']) {

        $page .= '
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <button class="page-link" onclick="prev()" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </button>
                </li>';
        for ($i = 1; $i <= $number_of_pages; $i++) {
            $page .= '<li class="page-item"><button class="page-link" id="' . $i . '" onclick="getPage(' . $i . ')">' . $i . '</button></li>';
        }

        $page .= '
                <li class="page-item">
                    <button class="page-link" onclick="next()" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </button>
                </li>
            </ul>
        </nav>';
    }

    if ($number_of_pages != 0 && $number_of_pages < $_POST['pagination']['pageNumber']) {
        $_POST['pagination']['pageNumber'] = $number_of_pages;
    }

    $_POST['pagination']['pageNumber'] = (5 * ($_POST['pagination']['pageNumber'] - 1));
    $sql = "SELECT * FROM product";
    $flag = false;
    $additionalSql = " ORDER BY ";
    foreach ($_POST['filter'] as $key => $value) {
        if (filter_var($value['flag'], FILTER_VALIDATE_BOOL)) {
            if ($flag)
                $additionalSql .= ",";
            $additionalSql .= "$key " . (filter_var($value['asc'], FILTER_VALIDATE_BOOL) ? "ASC" : "DESC");
            $flag = true;
        }
    }

    if ($_POST['search'] !== "")
        $sql .= " WHERE id LIKE '%{$_POST['search']}%' or  name LIKE '%{$_POST['search']}%' or price LIKE '%{$_POST['search']}%'";

    if ($flag)
        $sql .= $additionalSql;
    $sql .= " LIMIT ?, 5";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST['pagination']['pageNumber']);
    $stmt->execute();

    $res = $stmt->get_result();
    $output = "";

    if ($res->num_rows > 0) {
        $sql = "SELECT * FROM images WHERE product_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        foreach ($res->fetch_all(MYSQLI_ASSOC) as $index => $data) {
            $output .= "<tr><td>" . $data['id'] . "</td><td>";

            $id = $data['id'];
            $stmt->execute();
            $res1 = $stmt->get_result();
            if ($res1->num_rows > 0) {
                $output .= '
                        <div id="carouselExampleControls' . $id . '" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">';

                foreach ($res1->fetch_all(MYSQLI_ASSOC) as $imgIndex => $imgData) {

                    $output .= '<div class="carousel-item ' . ($imgIndex === 0 ? 'active' : '') . '">
                                <img src="data:image/jpeg;base64,' . base64_encode($imgData['image']) . '" width="100" id="img' . $imgIndex . '" alt="Product image" class="d-block w-100"/>
                            </div>';
                }

                $output .= "</div>
                            <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls$id' data-bs-slide='prev'>
                                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                <span class='visually-hidden'>Previous</span>
                            </button>
                            <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls$id' data-bs-slide='next'>
                                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                <span class='visually-hidden'>Next</span>
                            </button>
                        </div>";
            } else {
                $output .= "No images found";
            }

            $output .= "</td>
                <td id='name" . $data['id'] . "'>" . $data['name'] . "</td>
                <td id='price" . $data['id'] . "'>" . $data['price'] . "</td>
                <td><button class='btn btn-danger' onclick='deleteData(" . $data['id'] . ")'>Delete</button>
                <button class='btn btn-success' onclick='updateData(" . $data['id'] . ")' data-bs-toggle='modal' data-bs-target='#updateModal'>Update</button></td></tr>";
        }
    } else {
        $output = "<tr><td colspan='5' class='text-center'>No data found!!</td></tr>";
    }
    echo json_encode(["body" => $output, "pagination" => $page, "max_size" => $number_of_pages]);
} else {
    echo json_encode(["body" => "", "pagination" => ""]);
}
