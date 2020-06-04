<?php 
    if($_GET['lang'] == 'SK') require_once "./lang/lang_sk.php";
    else require_once "./lang/lang_en.php";
    $arr = scandir("./logs");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
    <link rel="stylesheet" href="style.css">
    <title>Logs</title>
    <script>

        function csvDownload(a){
            var data = {
                "action": "select",
                "name": a.getAttribute("value")
        };
        $.ajax({
            url: 'http://147.175.121.210:8233/final_zadanie/ajax.php?',
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
<header>
    <div id="nav" class="u-full-width">
        <div id = "left">
            <a href="http://147.175.121.210:8233/final_zadanie/?lang=<?php echo $_GET['lang']?>"><button><?php echo DOMOV?></button></a>
        </div>
        <div id="right">
            <a href="http://147.175.121.210:8233/final_zadanie/logs.php?lang=SK"><button>SK</button></a>
            <a href="http://147.175.121.210:8233/final_zadanie/logs.php?lang=EN"><button>EN</button></a>
        </div>
    </div>
</header>
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
                    echo "<td style='padding-left:25px;'>".$file."</td><td class='link' onclick='csvDownload(this);' value='".$file."'>CSV</td><td class='link'>PDF</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>