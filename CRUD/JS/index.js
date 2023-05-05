const pagination = {
    pageNumber: 1,
    maxNumber: 1,
}

const filter = {
    id: {
        flag: false,
        asc: false
    },
    name: {
        flag: false,
        asc: false
    },
    price: {
        flag: false,
        asc: false
    }
}

const changeImage = (event) => {
    $(event.data.targetId).removeClass("d-none").empty();
    Object.entries(event.target.files).forEach(([index, value]) => {
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
        method: "POST",
        data: {
            filter: filter,
            pagination: pagination,
            search: $.trim($("#search").val())
        },
        success: (res) => {
            res = JSON.parse(res);
            pagination.maxNumber = res.max_size;

            $("#reset").click();
            $("#table-data").html(res.body);
            $("#pagination").html(res.pagination);
            $("form img").attr("src", "").addClass("d-none");
            $(".page-link").removeClass("active");
            $(".page-link#" + pagination.pageNumber).parent().addClass("active");
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

const deleteImg = (id) => {
    const permission = confirm("Are you sure you want to delete?");
    if (permission) {
        $.ajax({
            url: "./action/setData.php",
            method: 'POST',
            data: {
                id: id,
                deleteImg: true
            },
            success: function (res) {
                $("#" + id).remove();
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
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
    const permission = confirm("Are you sure you want to delete?");
    if (permission) {
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
        });
    }
}

const getPage = (number) => {
    pagination.pageNumber = number;
    getData();
}

const prev = () => {
    if (pagination.pageNumber - 1 !== 0) {
        pagination.pageNumber--;
    }
    getData();
}

const next = () => {
    if (pagination.pageNumber + 1 <= pagination.maxNumber) {
        pagination.pageNumber++;
    }
    getData();
}

const sortBy = (event) => {
    const ele = event.target;

    // if 'sort' class is not added then we will add 
    if (!ele.classList.contains('sort')) {
        ele.classList.add('sort');
    }
    ele.dataset.orderBy = ele.dataset.orderBy == "asc" ? "desc" : "asc";

    // change the order by
    let asc = filter[`${ele.dataset.name}`].asc;
    delete filter[`${ele.dataset.name}`];
    filter[`${ele.dataset.name}`] = { flag: true, asc: !asc };

    getData();
}

// const columns = document.getElementsByClassName("tb-col");
$('.tb-col').each((_, ele) => {
    ele.addEventListener("click", sortBy);
});

const debounce = (cb, delay = 500) => {
    let timeout;
    return () => {
        clearTimeout(timeout);
        timeout = setTimeout(cb, delay);
    }
}

$("#search").on('input', debounce(getData));