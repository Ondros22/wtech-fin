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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="./logs.js"></script>
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
    <?php require_once "./footer.php"; ?>
    <script>
        $(document).ready(function () {
            $(".nav-link").eq(3).addClass("active");
        });
    </script>
</body>
</html>