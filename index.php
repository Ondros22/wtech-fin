
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
    if(isset($_GET['lang']) && strtoupper($_GET['lang']) == 'SK') require_once "./lang/lang_sk.php";
    else require_once "./lang/lang_en.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <title>Document</title>
</head>
<body>
<header>
        <div id="nav" class="u-full-width">
            <div id = "left">
                <a href="./?lang=<?php echo $_GET['lang']?>"><button><?php echo DOMOV?></button></a>
            </div>
            <div id="right">
                <a href="./?lang=SK"><button>SK</button></a>
                <a href="./?lang=EN"><button>EN</button></a>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="one-third column centered">
            <a href="./moricz?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="./img/tlmic.png">
                    <p>
                        <?php echo TLMIC;?>
                    </p>
                </div>
            </a>
        </div>
        <div class="one-third column centered">
            <a href="./statistika?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="./img/statistics.png">
                    <p>
                        <?php echo STATISTIKA;?>
                    </p>
                </div>
            </a>
        </div>
        <div class="one-third column centered">
            <a href="./strba?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="./img/gula.png">
                    <p>
                        <?php echo GULICKA;?>
                    </p>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="one-third column centered">
            <a href="./straka?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail " >
                    <img src="./img/kyvadlo.png" style="margin-top: 30px; margin-bottom: 15px">
                    <p>
                        <?php echo KYVADLO;?>
                    </p>
                </div>
            </a>
        </div>
        <div class="one-third column centered">
            <a href="./calcul?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="./img/calculator.png">
                    <p>
                        <?php echo KALKULACKA;?>
                    </p>
                </div>
           </a>
        </div>
        <div class="one-third column centered">
            <a href="./pastorek?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="./img/lietadlo.png">
                    <p>
                        <?php echo LIETADLO;?>
                    </p>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="one-half column centered">
            <a href="./dokumentacia?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail  " >
                    <img src="./img/dokumentacia.png">
                    <p>
                        <?php echo DOKUMENTACIA;?>
                    </p>
                </div>
            </a>
        </div>
        <div class="one-half column centered">
            <a href="./logs.php?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="./img/logs.png">
                    <p>
                        <?php echo LOGY;?>
                    </p>
                </div>
            </a>
        </div>
    </div>
</body>
</html>