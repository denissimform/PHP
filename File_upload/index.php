<!DOCTYPE html>
<html>

<head>
    <title>
        File upload using PHP.
    </title>
    <style>
        .img {
            height: 400px;
            height: 200px;
            margin: 10px;
        }

        .images {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="file[]" onchange="change()" id="file" multiple>
        <input type="submit" name="submit" value="Submit">
    </form>
    <div class="images">
        <?php
        try {
            if (isset($_POST['submit'])) {
                $length = count($_FILES['file']['name']);
                for ($i = 0; $i < $length; $i++) {
                    $name = $_FILES['file']['name'][$i];
                    $tmp_name = $_FILES['file']['tmp_name'][$i];
                    $content = base64_encode(file_get_contents($tmp_name));
                    echo "<img src='data:image/png;base64,$content' id='img-$key' class='img' alt='Image preview'/>";
                    move_uploaded_file($tmp_name, "./upload/$name");
                }
            }
        } catch (Throwable $th) {
            echo $th;
        }
        ?>
    </div>
    <script>
        const change = () => {
            const files = document.getElementById('file').files;
            console.log(files);
            Object.entries(files).forEach((data, index) => {
                const reader = new FileReader();
                reader.onload = () => {
                    const imgEle = document.createElement('img');
                    imgEle.setAttribute("src", reader.result);
                    imgEle.setAttribute("id", `img${index}`);
                    imgEle.setAttribute("alt", 'Image preview');
                    imgEle.setAttribute("class", 'img');
                    document.getElementsByTagName('body')[0].appendChild(imgEle);
                }

                reader.readAsDataURL(files[index]);
            })
        }
    </script>
</body>

</html>