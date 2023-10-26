// open the alert pop-up
const showAlert = () => {
    $("#alert").removeClass('d-none');
}

// close the alert pop-up
const closeAlert = () => {
    $("#alert").addClass('d-none');
}

// get result of user input
const getResult = () => {
    closeAlert();
    switch (true) {

        // check whether value is empty or not
        case $("#value").val() === "":
            $("#result").val("");
            break;

        // check the regex for validation
        case (($(".btn-success").html() !== "Temperature" && !/^[0-9]+$/.test($("#value").val())) || !/^[-]{0,1}[0-9]+$/.test($("#value").val())):
            showAlert();
            break;

        // check whether all perimeter is set or not
        case ($(".btn-success").attr("id") && $("#value").val() !== "" && $("#from").val() !== null && $('#to').val() !== null):
            $.ajax({
                url: "./PHP/ConverterController.php",
                method: "POST",
                data: {
                    value: $("#value").val(),
                    main: $(".btn-success").attr("id"),
                    from: $("#from").val(),
                    to: $('#to').val(),
                    "get_result": true,
                },
                success: (res) => {
                    res = JSON.parse(res);

                    if (res.success) {
                        // set the value on result
                        $("#result").val(res.result);
                    } else {
                        showAlert();
                        console.error(err);
                    }
                },
                error: (err) => {
                    showAlert();
                    console.error(err);
                }
            });
            break;
    }
}

// apply debouncing for get the result 
const debouncing = (cb, delay = 500) => {
    let event;
    return () => {
        clearTimeout(event);
        event = setTimeout(cb, delay);
    }
}

// get swap converter option
const swapConverter = () => {

    // swap the value
    let temp = $("#from").val();
    $("#from").val($('#to').val());
    $('#to').val(temp);

    // get result after swap the value
    getResult();
}

// to get body content according to menu button
const getContent = (e) => {
    $(".btn").removeClass('btn-success').addClass('btn-danger');
    $(e.target).removeClass('btn-danger').addClass('btn-success');
    $.ajax({
        url: "./PHP/ConverterController.php",
        method: "POST",
        data: {
            menu: e.target.id,
            "get_content": true
        },
        success: (res) => {
            res = JSON.parse(res);

            if (res.success) {
                // set body content to the body section
                $('.container-body').html(res.result);

                // add event listener on new element
                $('#from').on('input', getResult);
                $('#to').on('input', getResult);
                $('#value').on('input', debouncing(getResult, 500));
                $('#swap').on('click', swapConverter);
            } else {
                showAlert();
                console.error(err);
            }
        },
        error: (err) => {
            showAlert();
            console.error(err);
        }
    });
}

// default ajax to bring header menu
$.ajax({
    url: "./PHP/ConverterController.php",
    method: "GET",
    success: (res) => {
        res = JSON.parse(res);

        if (res.success) {
            // set html content in header section
            $(".container-header").html(res.result);

            // set event listner to every header button
            $(".btn").on("click", getContent);

            // get body content for first menu button
            $(".btn:first-child").click();
        } else {
            showAlert();
            console.error(err);
        }
    },
    error: (err) => {
        showAlert();
        console.error(err);
    }
});