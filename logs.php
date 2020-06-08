<?php 
    $arr = scandir("./logs");
    require_once "./conf.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
    <link rel="stylesheet" href="style.css">
    <script>

        function csvDownload(a){
            var data = {
                "action": "select",
                "name": a.getAttribute("value"),
                "key": "<?php echo $apiKey?>"
        };
        $.ajax({
            url: '/final_zadanie/ajax.php?',
            type: 'POST',
            data: data,
        }).done(function (data, textStatus, request) {
            var blob = new Blob([data]);

            console.log(request.getAllResponseHeaders())
            var fileName = request.getResponseHeader('filename');

            if (window.navigator && window.navigator.msSaveOrOpenBlob) { // for IE
            window.navigator.msSaveOrOpenBlob(blob, fileName);
            } else {
            var url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = fileName;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            }
        });
        }
        
        function pdfDownload(a){
            var data = {
                "action": "pdfLog",
                "name": a.getAttribute("value"),
                "key": "<?php echo $apiKey?>"
            };
        $.ajax({
            url: '/final_zadanie/ajax.php?',
            type: 'POST',
            data: data,
        }).done(function (data, textStatus, request) {
            var blob = new Blob([data]);

            console.log(request.getAllResponseHeaders())
            var fileName = request.getResponseHeader('filename');

            if (window.navigator && window.navigator.msSaveOrOpenBlob) { // for IE
            window.navigator.msSaveOrOpenBlob(blob, fileName);
            } else {
            var url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = fileName;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            }
        });
        }
    </script>
</head>
<body>
    <?php require_once "./header.php"; ?>
    <table class="u-full-width">
        <thead>
            <th style='padding-left:50px;'><?php echo MENO?></th>
            <th style="text-align:center" colspan="2"><?php echo AKCIA?></th>
        </thead>
        <tbody>
            <?php
                foreach($arr as $file){
                    if($file == "." || $file == "..") continue;
                    echo "<tr>";
                    echo "<td style='padding-left:25px;'>".$file."</td><td class='link' onclick='csvDownload(this);' value='".$file."'>CSV</td><td class='link' onclick='pdfDownload(this);' value='".$file."'>PDF</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>