<html>

<head>
    <title>Email</title>
    <link rel="stylesheet" href="../src/bootstrap.min.css">
</head>

<body>

    <form class="w-50 container p-3" id="form">
        <div class="alert alert-success alert-dismissible d-none" id="success">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-danger alert-dismissible d-none" id="error">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <input type="email" name="email" id="email" class="form-control my-2" placeholder="Email address" required />
        <input type="text" name="title" id="title" class="form-control my-2" placeholder="Title" required />
        <textarea name="message" id="msg" class="form-control my-2" placeholder="Message" cols="30" rows="10"></textarea>
        <input type="submit" value="Send" class="btn btn-success w-100">
    </form>
    <script src="../src/jquery-3.6.4.min.js"></script>
    <script src="../src/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(() => {
            $("#form").submit((event) => {
                event.preventDefault();

                $.ajax({
                    url: "./send-mail.php",
                    method: "POST",
                    data: {
                        email: $("#email").val(),
                        title: $("#title").val(),
                        msg: $("#msg").val(),
                        submit: true
                    },
                    success: (response) => {
                        response = response.split('<br>').pop();
                        response = JSON.parse(response);
                        if (response.success) {
                            $("#error").addClass("d-none");
                            $("#success").removeClass("d-none").prepend(response.message);
                        } else {
                            $("#success").addClass("d-none");
                            $("#error").removeClass("d-none").prepend(response.message);
                        }
                    },
                    error: (error) => {
                        $("#success").addClass("d-none");
                        $("#error").removeClass("d-none").prepend(response.message);
                    }
                })
            })
        })
    </script>
</body>

</html>