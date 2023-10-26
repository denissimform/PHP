<!DOCTYPE html>
<html>

<head>
    <title>CSV import/export</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <button class="navbar-brand btn">CSV import/export in PHP</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <button class="nav-link btn" aria-current="page" onclick="home()">Home</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn" onclick="data()">User Details</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="body" class="py-2"></div>
    <script src="./Js/bootstrap.bundle.min.js"></script>
    <script src="./Js/jquery-3.6.4.min.js"></script>
    <script src="./Js/index.js"></script>
</body>

</html>