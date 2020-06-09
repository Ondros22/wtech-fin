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
    <script>
        var key = "<?php echo $apiKey; ?>";
    </script>
    <script src="./logs.js"></script>
</head>
<body>
    <?php require_once "./header.php"; ?>
    <div class="justify-content-center my-3 pb-5">
        <div class="container col-2 mb-3" style="margin: auto;">
            <div class="form-group">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo NAME?></th>
                            <th scope="col"><?php echo ACTION?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        foreach($arr as $file){
                            if($file == "." || $file == "..") continue;
                            echo "<tr>";
                            echo "<td>".$i++."</td>";
                            echo "<td>".$file."</td>";
                            echo "<td>";
                            echo "<a class='link' href='#' onclick='csvDownload(this);' value='".$file."'>CSV</a> - ";
                            echo "<a class='link' href='#' onclick='pdfDownload(this);' value='".$file."'>PDF</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require_once "./footer.php"; ?>
    <script>
        $(document).ready(function () {
            $(".nav-link").eq(3).addClass("active");
        });
    </script>
</body>
</html>