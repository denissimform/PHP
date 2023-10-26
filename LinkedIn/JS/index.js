const logout = () => {
    window.location.replace('./Component/logout.php');
}

// image encode 
const changeImage = (event) => {
    $("#preview-imgs").empty();
    if (["jpg", "jpeg", "png", "svg", "heif"].includes(event.target.files[0].name.split(".").pop())) {
        Object.entries(event.target.files).forEach(([index, value]) => {
            const reader = new FileReader();
            reader.onload = () => {
                let imgEle = `<img width='200' height='100' src='${reader.result}' class='m-1' alt='Product image' id='img${index}' />`;
                $("#preview-imgs").append(imgEle);
            }
            reader.readAsDataURL(value);
        });
    }
}

const closeAlert = () => {
    $("#success-alert").addClass('d-none');
    $("#error-alert").addClass('d-none');
}

const postOnLinkedIn = (e) => {
    // prevent event
    e.preventDefault();
    if ($("#form").valid()) {
        // add # on string 
        $("textarea[name='tag']").val((_, tags) => {
            return "\\r\\n\\r\\n#" + tags.replace(",", " #");
        });

        // add spinner button in form
        $("#spinner").removeClass("d-none");
        $("#submit").addClass("d-none");

        // create form data 
        const formData = new FormData(e.target);
        formData.append(e.target.dataset.form, true);

        // call ajax to send data to server
        $.ajax({
            url: "./action.php",
            data: formData,
            method: "POST",
            processData: false,
            contentType: false,
            success: (res) => {
                console.log(res);
                $("#success-alert").removeClass('d-none');
                $("#reset").click();
                $('.amsify-suggestags-input-area').remove();
            },
            error: (err) => {
                $("#error-alert").removeClass('d-none');
                console.log(err);
            },
            complete: () => {
                $("#submit").removeClass("d-none");
                $("#spinner").addClass("d-none");
                $("#preview-imgs").empty();
            }
        });
    }
}

const getContent = (e) => {
    $(".nav-link").removeClass('active');
    $(e.target).addClass('active');
    let url = "./Component/" + e.target.dataset.target + ".php";
    $.ajax({
        url: url,
        success: (res) => {
            $("#editor").html(res);
            $("#img").on("change", changeImage);
            $("#form").on("submit", postOnLinkedIn);

            // for tag view
            $('textarea[name="tag"]').amsifySuggestags({
                type: 'amsify',
            });

            $('.amsify-suggestags-area').addClass('form-control');
            $('.amsify-suggestags-input-area').addClass('border-0');

            // form validate
            formValidate();
        },
        error: (err) => {
            console.log(err);
        }
    });
}
$(".nav-link").on('click', getContent);
$(".nav-link:first").click();

const formValidate = () => {
    $("#form").validate({
        rules: {
            text: {
                required: true,
            },
            url: {
                required: true,
                url: true
            },
            desc: {
                required: true,
            },
            "img[]": {
                required: true,
                extension: "jpeg|jpg|png|svg|heif"
            },
            title: {
                required: true,
            },
            name: {
                required: true,
            },
        },
        messages: {
            url: {
                url: "Please enter valid url!!"
            },
            "img[]": {
                extension: "Image should be in .jpg, .jpeg, .png, .svg or .heif formate."
            }
        },
        errorPlacement: (error, ele) => {
            if (ele.hasClass('amsify-suggestags-input'))
                return false;
            else
                error.insertAfter(ele);
        }
    });
}