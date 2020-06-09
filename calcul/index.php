
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
        <form action="" id="calcul">
            <label class="first" for="inp"><?php echo VSTUP;?>:</label>
            <label for="oup"><?php echo VYSTUP;?>:</label>
            <br />
            <div class="areas">
                <textarea name="inp" id="inp" cols="30" rows="10"></textarea>
                <textarea name="oup" id="oup" cols="30" rows="10" readonly></textarea>
            </div>
            <input type="submit" value="<?php echo VYPOCITAJ?>" id="submit" />
        </form>
        <?php require_once "../footer.php"; ?>
        <script>
            $(document).ready(function () {
                $(".nav-link").eq(2).addClass("active");
            });
        </script>
    </body>
</html>
