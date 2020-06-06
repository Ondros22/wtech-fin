
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');
    if($_GET['lang'] == 'SK') require_once "./lang/lang_sk.php";
    else require_once "./lang/lang_en.php";

    require_once "../conf.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
    <link rel="stylesheet" href="style.css">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
        <script>
            var key ="<?php echo $apiKey?>";
        </script>
    <script src="./run.js"></script>
</head>
<body>
    <header>
        <div id="nav" class="u-full-width">
            <div id = "left">
                <a href="http://147.175.121.210:8233/final_zadanie/?lang=<?php echo $_GET['lang']?>"><button><?php echo DOMOV?></button></a>
            </div>
            <div id="right">
                <a href="http://147.175.121.210:8233/final_zadanie/calcul/?lang=SK"><button>SK</button></a>
                <a href="http://147.175.121.210:8233/final_zadanie/calcul/?lang=EN"><button>EN</button></a>
            </div>
        </div>
    </header>
    <form action="" id="calcul">
        <label class="first" for="inp"><?php echo VSTUP;?>:</label>
        <label for="oup"><?php echo VYSTUP;?>:</label>
        <br>
        <div class="areas">
            <textarea name="inp" id="inp" cols="30" rows="10"></textarea>
            <textarea name="oup" id="oup" cols="30" rows="10" readonly></textarea>
        </div>
        <input type="submit" value="<?php echo VYPOCITAJ?>" id="submit">
    </form>
</body>
</html>