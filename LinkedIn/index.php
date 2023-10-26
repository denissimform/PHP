<?php
if (!isset($_SESSION))
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- icon -->
    <link rel="shortcut icon" href="./images/linkedIn.png" type="image/x-icon">

    <!-- import CSS -->
    <link href="./CSS/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./CSS/style.css">

    <?php if (isset($_SESSION['token'])) { ?>
        <link rel="stylesheet" href="./CSS/tag.css">
    <?php } ?>

    <title>LinkedIn</title>
</head>

<body>
    <?php include('./Component/Navbar.php'); ?>

    <div class="container-fluid w-75 mx-auto pt-5">
        <?php if (isset($_SESSION['token'])) { ?>
            <div class="alert alert-success alert-dismissible fade show d-none w-50 mx-auto" id='success-alert' role="alert">
                <strong>Congrats!</strong> Post has been successfully uploaded on linkedin.
                <button type="button" class="btn-close" onclick="closeAlert()"></button>
            </div>
            <div class="alert alert-danger alert-dismissible fade show d-none w-50 mx-auto" id='error-alert' role="alert">
                <strong>Error!</strong> Somthing went wrong to upload post.
                <button type="button" class="btn-close" onclick="closeAlert()"></button>
            </div>
            <div class="editor w-50 mx-auto" id="editor">
            </div>
        <?php } else { ?>
            <div class="text-center mt-5 border p-5 mx-auto w-25 login-box">
                <img src="./images/linkedIn_full_logo.png" width="150" alt="Linkedin logo">
                <hr>
                <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=783znj6gyz3rma&redirect_uri=http://www.myphp.com/LinkedIn/action.php&state=foobar&scope=r_liteprofile%20r_emailaddress%20w_member_social" class="btn btn-success w-100">Login with Linkedin</a>
            </div>
        <?php } ?>

    </div>

    <!-- Include Editor JS files. -->
    <script src="./JS/bootstrap.bundle.min.js"></script>
    <?php if (isset($_SESSION['token'])) { ?>
        <script src="./JS/jquery-3.6.4.min.js"></script>
        <script src="./JS/jquery.validate.min.js"></script>
        <script src="./JS/additional-methods.min.js"></script>
        <script src="./JS/tag.js"></script>
        <script src="./JS/index.js"></script>
    <?php } ?>
</body>

</html>