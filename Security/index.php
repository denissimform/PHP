<?php
include("./src/permission.php");
$conn = mysqli_connect("localhost", "denis", "Root@123", "PHP");
if (isset($_POST['submit'])) {

    // using normal statement
    $sql = "select * from student where id='" . $_POST['id'] . "' and name='Denis'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_fetch_row($res) > 1) {
        print_r(mysqli_fetch_all($res));
    } else {
        echo "Do something!!";
    }

    // using prepare statement secure
    // $sql = "select * from student where id=? and name='Denis'";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("s", $_POST['id']);
    // $stmt->execute();

    // $res = $stmt->get_result();
    // if ($res->num_rows > 0) {
    //     print_r($res->fetch_all());
    // } else {
    //     echo 'Do something!!';
    // }
} else {
    echo "Nothing happened!!";
}
?>
<html>

<head>
    <title>Security in PHP</title>
</head>

<body>
    <h1>Let's do some hacking...!</h1>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <input type="text" name="id" id="id">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>