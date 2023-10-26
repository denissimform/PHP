<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>

    <form id="form" class="w-25 mx-auto my-3">
        <div class="alert alert-success alert-dismissible fade show d-none" id="alert" role="alert">
            <strong>Success!</strong> Data inserted successfully.
            <button type="button" class="btn-close"></button>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="name">Name</span>
            <input type="text" class="form-control shadow-none border" placeholder="Username" aria-label="Username" aria-describedby="name">
        </div>
        <div class="input-group mb-3">
            <input type="submit" class="form-control btn btn-success">
        </div>
    </form>
    <div class="d-flex flex-row justify-content-center flex-wrap" id="body-content"></div>

    <script src="./JS/jquery-3.6.4.min.js"></script>
    <script src="./JS/bootstrap.bundle.min.js"></script>
    <script src="./JS/index.js"></script>
</body>

</html>