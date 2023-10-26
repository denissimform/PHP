// csv file validation 
const checkFile = (event) => {
    let file = event.target;
    let extension = file.files[0]['name'].split('.').pop();
    if (extension !== "csv") {
        alert("Please upload csv file!");
        file.value = "";
        return false;
    }
}

// insert user data via form
const insertData = (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    formData.append("insert_data", true);
    $.ajax({
        url: "./Component/user.php",
        method: "POST",
        data: {
            name: $("#name").val(),
            age: $("#age").val(),
            "insert_data": true
        },
        success: (res) => {
            $("#alert").html(res);
        },
        error: (err) => {
            console.error(err);
        }
    })
}

// submit csv via form 
const importCSVFile = (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    formData.append("import_csv", true);
    $.ajax({
        url: "./Component/user.php",
        method: "POST",
        processData: false,
        contentType: false,
        data: formData,
        success: (res) => {
            $("#alert").html(res);
            $('#csv_file').val("");
        },
        error: (err) => {
            console.error(err);
        }
    })
}

// bring home html code 
const home = () => {
    $.ajax({
        url: "./Component/home.php",
        method: "get",
        success: (res) => {
            $('#body').html(res);
            $("#form1").on("submit", insertData);
            $("#form2").on("submit", importCSVFile);
            $('#csv_file').on("change", checkFile);
        },
        error: (err) => {
            console.error(err);
        }
    });
};
// it will invoke when page first time render
home();

// bring user details from database
const data = () => {
    $.ajax({
        url: "./Component/user.php",
        method: "get",
        success: (res) => {
            $('#body').html(res);
            $('#csv-file').on("change", checkFile);
        },
        error: (err) => {
            console.error(err);
        }
    });
}
