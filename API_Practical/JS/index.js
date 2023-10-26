const deleteUser = (id) => {
    $.ajax({
        url: "https://646b538d7d3c1cae4ce3a0b1.mockapi.io/api/v1/user/" + id,
        method: "Delete",
        success: () => {
            $("#" + id).remove();
            $("#alert").removeClass("d-none");
        },
        error: (err) => {
            console.error(err);
        }
    })
}

const createUser = (event) => {
    event.preventDefault();
    $.ajax({
        url: "https://646b538d7d3c1cae4ce3a0b1.mockapi.io/api/v1/user/" + id,
        method: "Delete",
        success: () => {
            getData();
        },
        error: (err) => {
            console.error(err);
        }
    })
}

const getData = () => {
    $.ajax({
        url: "./Action/getData.php",
        method: "Get",
        success: (res) => {
            $("#body-content").html(res);
        },
        error: (err) => {
            console.error(err);
        }
    })
}

getData();