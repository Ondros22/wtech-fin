
<?php require_once "../conf.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" />
        <link rel="stylesheet" href="style.css" />
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script>
            var key = "<?php echo $apiKey?>";
            var lang = "<?php echo $_GET['lang']?>";
        </script>
        <script src="./run.js"></script>
    </head>
    <body>
        <?php require_once "../header.php"; ?>
        <div id="chart1" style="height: 450px;"></div>
        <form action="" id="mailForm" style="display: block;">
            <label for="mail">Email</label>
            <input type="email" name="mail" id="mail" />
            <input type="submit" value="send" />
        </form>
    </body>
</html>
