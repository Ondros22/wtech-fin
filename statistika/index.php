
<?php require_once "../conf.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>
            var key = "<?php echo $apiKey?>";
            var lang = "<?php echo $_GET['lang']?>";
        </script>
        <script src="./run.js"></script>
    </head>
    <body>
        <?php require_once "../header.php"; ?>
        <div class="justify-content-center my-3 pb-5">
            <div class="container col-4 mb-3 text-center">
                <div id="chart1" style="height: 450px;"></div>
                <form action="" id="mailForm">
                    <div class="form-group">
                        <label for="mail">Email:</label>
                        <input id="mail" type="email" name="mail" class="form-control col-xs-2" />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Send</button>
                    </div>
                </form>
            </div>
        </div>
        <?php require_once "../footer.php"; ?>
        <script>
            $(document).ready(function () {
                $(".nav-link").eq(1).addClass("active");
            });
        </script>
    </body>
</html>
