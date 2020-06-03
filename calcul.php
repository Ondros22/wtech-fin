<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
</head>
<body>
    
</body>


    <script>
        var data = {
                "action": "calcul",
                "txt": "965*856"
        };
        $.ajax({
            type: "POST",
            dataType: "json",
            data: data,
            url:"http://147.175.121.210:8233/final_zadanie/ajax.php?",
            complete: async function(datta) {
                console.log(datta);
            }
        });
    </script>

</html>