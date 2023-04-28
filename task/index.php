<!DOCTYPE html>
<html>

<head>
    <title>Task</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <form id="form">
        <input type="text" name="string" id="string">
        <input type="submit" value="Submit">
    </form>
    <p id='output'></p>
</body>
<script>
    
    $(document).ready(() => {
        $("#form").submit((event) => {
            event.preventDefault();
            $.ajax({
                url: './process.php',
                method: "POST",
                data: {
                    text: $('#string').val().toLowerCase(),
                    submit: true
                },
                success: (data) => {
                    console.log(data);
                    $('#output').html(data);
                }
            })

            return false;
        });
    })
</script>

</html>