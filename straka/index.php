<?php
    if($_GET['lang'] == 'SK') require_once "./lang/lang_sk.php";
    else require_once "./lang/lang_en.php";

    require_once "../conf.php";
    if($kyvadlo_speed < 0) $kyvadlo_speed = 0;
    else if($kyvadlo_speed > 1000)$kyvadlo_speed = 1000;
?>
<html>
    <head>
        <title>straka - kyvadlo</title>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
        <link rel="stylesheet" href="style.css">
        <script>
            var key ="<?php echo $apiKey?>";
        </script>
        <script src="run.js"></script>
    </head>
    <body>
    <header>
    <div id="nav" class="u-full-width">
        <div id = "left">
            <a href="http://147.175.121.210:8233/final_zadanie/?lang=<?php echo $_GET['lang']?>"><button><?php echo DOMOV?></button></a>
        </div>
        <div id="right">
            <a href="http://147.175.121.210:8233/final_zadanie/straka/?lang=SK"><button>SK</button></a>
            <a href="http://147.175.121.210:8233/final_zadanie/straka/?lang=EN"><button>EN</button></a>
        </div>
    </div>
</header>
    <svg id="scene" viewBox="0 0 100 100" width="100%" height="200px">
        <line id="string" x1="50" y1="0" x2="50" y2="100" stroke="brown" stroke-width="4"/>
    </svg>
    <div id="grafy">
            <div id="chart1"></div>
    </div>
    <form action="">
        <label for="angle" style="margin-top:5px"><?php echo UHOL;?></label>
        <input type="number" name="angle" id="angle" min="-180" max="180" value="0">
        <label for="position" style="margin-top:5px"><?php echo POZICIA;?></label>
        <input type="number" name="position" id="position" min="-250" max="250" value="0">
        <label for="r" style="margin-top:5px">r</label>
        <input type="number" name="r" id="r" min="-1" max="1" value="0">
        <label for="myRange" style="margin-top:5px"><?php echo RYCHLOST;?></label>
        <input type="range" min="0" max="1000" value="<?php echo $kyvadlo_speed?>" class="slider" id="myRange" name="myRange" style="margin-top:10px">
        <input type="submit" value="Start" id="btn">
        <label for="animacia" style="margin-top:5px"><?php echo ANIMACIA;?></label>
        <input type="checkbox" name="animacia" id="animacia" checked style="margin-top:10px">
        <label for="graf" style="margin-top:5px"><?php echo GRAF;?></label>
        <input type="checkbox" name="graf" id="graf"checked style="margin-top:10px">
    </form>
    </body>
</html>