const changeImage = (event) => {
    $(event.data.targetId).removeClass("d-none").empty();
    Object.entries(event.target.files).forEach(([index,value]) => {
        const reader = new FileReader();
        reader.onload = () => {
            const imgEle = `<img width='200' height='100' src='${reader.result}' class='mx-2' alt='Product image' id='img${index}' />`;
            $(event.data.targetId).append(imgEle);
        }
        reader.readAsDataURL(value);
    })
}
$("#img").change({ targetId: "#preview-img-body" }, changeImage);

const getData = () => {
    $.ajax({
        url: "./action/data.php",
        method: "GET",
        success: (res) => {
            $("#reset").click();
            $("#table-data").html(res);
            $("form img").attr("src", "").addClass("d-none");
        },
        error: (err) => {
            console.log(err);
        }
    })
}
getData();

const addData = (event) => {
    event.preventDefault();
    const fileData = new FormData(event.target);
    fileData.append('submit', true);
    $.ajax({
        url: "./action/setData.php",
        method: "POST",
        contentType: false,
        processData: false,
        data: fileData,
        success: (res) => {
            res = JSON.parse(res);
            if (res.success) {
                $("#error").addClass("d-none");
                $("#success").removeClass("d-none").prepend(res.message);
                getData();
            } else {
                $("#success").addClass("d-none");
                $("#error").removeClass("d-none").prepend(res.message);
            }
        },
        error: (err) => {
            console.log(err);
        }
    })
}
$('#form').submit(addData);

const updateData = (id) => {
    $.ajax({
        url: "./action/setData.php",
        method: 'POST',
        data: {
            id: id,
            getData: true
        },
        success: function (res) {
            $("#modal-body").append(res);
            $("#update-form").submit(updateHandle);
            $("#updated-product-img").change({ targetId: "#updated-img-preview" }, changeImage);
        },
        error: function (err) {
            console.log(err);
        }
    });
}

const updateHandle = (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    formData.append("update", true);
    $.ajax({
        url: "./action/setData.php",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: (res) => {
            res = JSON.parse(res);
            if (res.success) {
                $("#error").addClass("d-none");
                $("#success").removeClass("d-none").prepend(res.message);
                getData();
            } else {
                $("#success").addClass("d-none");
                $("#error").removeClass("d-none").prepend(res.message);
            }
            closeBtn();
        },
        error: (err) => {
            console.log(err);
        }
    })
}

const closeBtn = () => {
    $("#modal-body form").remove();
}

const deleteData = (id) => {
    $.ajax({
        url: "./action/setData.php",
        method: "POST",
        data: {
            id: id,
            delete: true
        },
        success: (res) => {
            getData();
        },
        error: (err) => {
            console.log(err);
        }
    })
}