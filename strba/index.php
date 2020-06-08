
<?php require_once "../conf.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo BALL_TITLE ?></title>
        <link rel="stylesheet" href="./style.css" />
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" />
        <script>
            var key = "<?php echo $apiKey?>";
        </script>
        <script src="JScript.js"></script>
    </head>
    <body>
        <?php require_once "../header.php"; ?>
        <svg id="scene" viewBox="0 0 100 100" width="100%" height="200px">
            <line id="string" x1="0" y1="100" x2="0" y2="70" stroke="black" stroke-width="4"></line>
            <line id="BEAM" x1="-40" y1="70" x2="40" y2="70" stroke="grey" stroke-width="4" style="transform-origin: 0px 70px;"></line>
            <circle id="gulicka" cx="0" cy="64" r="3" stroke="black" stroke-width="1" fill="red" style="transform-origin: 0px 64px;" />
        </svg>
        
        
        

        <div id="grafy">
            <div id="chart1"></div>
            <div id="chart2"></div>
        </div>

        <form action="">
            <label for="r"><?php echo ZADAJeR?></label>
            <input type="number" min="-25" max="25" name="r" id="r" value="0" />

            
            <input type="hidden" min="0" max="1" name="rychlost" id="rychlost" value="0" />

            
            <input type="hidden" min="0" max="1" name="zrychlenie" id="zrychlenie" value="0" />

            <label for="angle"><?php echo SLOW ?></label>
            <input type="range" min="0" max="1000" value="0" class="slider" id="myRange" />

            <label for="animacia"><?php echo ANIMACIA ?></label>
            <input type="checkbox" name="animacia" id="animacia" checked="" />
            <label for="graf"><?php echo GRAF ?></label>
            <input type="checkbox" name="graf" id="graf" checked="" />

            <input type="submit" value="Start" id="btn" name="btn" />
        </form>

        <br><br>
            <label style="float: left;">Aktuálna pozícia guličky N*x(:,1) [Červený graf]</label>
        
            <label style="float: right;">Aktuálny náklon tyče x(:,3) [Zelený graf]</label>
    </body>
</html>
