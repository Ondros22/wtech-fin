
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
    if($_GET['lang'] == 'SK') require_once "./lang/lang_sk.php";
    else require_once "./lang/lang_en.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
    <link rel="stylesheet" href="style.css">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>
<body>
<header>
        <div id="nav" class="u-full-width">
            <div id = "left">
                <a href="http://147.175.121.210:8233/final_zadanie/?lang=<?php echo $_GET['lang']?>"><button><?php echo DOMOV?></button></a>
            </div>
            <div id="right">
                <a href="http://147.175.121.210:8233/final_zadanie/?lang=SK"><button>SK</button></a>
                <a href="http://147.175.121.210:8233/final_zadanie/?lang=EN"><button>EN</button></a>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="one-third column centered">
            <a href="http://147.175.121.210:8233/final_zadanie/moricz?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="http://147.175.121.210:8233/final_zadanie/img/tlmic.png">
                    <p>
                        <?php echo TLMIC;?>
                    </p>
                </div>
            </a>
        </div>
        <div class="one-third column centered">
            <a href="http://147.175.121.210:8233/final_zadanie/statistika?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="http://147.175.121.210:8233/final_zadanie/img/statistics.png">
                    <p>
                        <?php echo STATISTIKA;?>
                    </p>
                </div>
            </a>
        </div>
        <div class="one-third column centered">
            <a href="http://147.175.121.210:8233/final_zadanie/strba?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="http://147.175.121.210:8233/final_zadanie/img/gula.png">
                    <p>
                        <?php echo GULICKA;?>
                    </p>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="one-third column centered">
            <a href="http://147.175.121.210:8233/final_zadanie/straka?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail " >
                    <img src="http://147.175.121.210:8233/final_zadanie/img/kyvadlo.png" style="margin-top: 30px; margin-bottom: 15px">
                    <p>
                        <?php echo KYVADLO;?>
                    </p>
                </div>
            </a>
        </div>
        <div class="one-third column centered">
            <a href="http://147.175.121.210:8233/final_zadanie/calcul?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="http://147.175.121.210:8233/final_zadanie/img/calculator.png">
                    <p>
                        <?php echo KALKULACKA;?>
                    </p>
                </div>
           </a>
        </div>
        <div class="one-third column centered">
            <a href="http://147.175.121.210:8233/final_zadanie/pastorek?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="http://147.175.121.210:8233/final_zadanie/img/lietadlo.png">
                    <p>
                        <?php echo LIETADLO;?>
                    </p>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="one-half column centered">
            <a href="http://147.175.121.210:8233/final_zadanie/dokumentacia?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail  " >
                    <img src="http://147.175.121.210:8233/final_zadanie/img/dokumentacia.png">
                    <p>
                        <?php echo DOKUMENTACIA;?>
                    </p>
                </div>
            </a>
        </div>
        <div class="one-half column centered">
            <a href="http://147.175.121.210:8233/final_zadanie/logs.php?lang=<?php echo $_GET['lang']?>">
                <div class= "thumbnail ">
                    <img src="http://147.175.121.210:8233/final_zadanie/img/logs.png">
                    <p>
                        <?php echo LOGY;?>
                    </p>
                </div>
            </a>
        </div>
    </div>
</body>
</html>