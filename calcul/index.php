
<?php require_once "../conf.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Calcul</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>
            var key = "<?php echo $apiKey?>";
        </script>
        <script src="./run.js"></script>
    </head>
    <body>
        <?php require_once "../header.php"; ?>
        <div class="justify-content-center my-3 pb-5">
            <div class="container col-8 mb-3 text-center">
                <form action="" id="calcul">
                    <label class="first" for="inp"><?php echo VSTUP;?>:</label>
                    <label for="oup"><?php echo VYSTUP;?>:</label>
                    <br />
                    <div class="areas">
                        <textarea class="form-control" name="inp" id="inp" rows="10" style="width:50%;"></textarea>
                        <textarea class="form-control" name="oup" id="oup" rows="10" style="width:50%;" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-primary form-control"><?php echo VYPOCITAJ?></button>
                    </div>
                </form>
            </div>
        </div>
        <?php require_once "../footer.php"; ?>
        <script>
            $(document).ready(function () {
                $(".nav-link").eq(2).addClass("active");
            });
        </script>
    </body>
</html>
