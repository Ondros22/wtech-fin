<?php
    if(isset($_GET['lang']) && strtoupper($_GET['lang']) == 'SK') require_once "./lang/lang_sk.php";
    else require_once "./lang/lang_en.php";

    require_once "../conf.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="./three.min.js"></script>
    <script src="./GLTFLoader.js"></script>
    <script>
            var key ="<?php echo $apiKey?>";
    </script>
</head>
<body>

<header>
    <div id="nav" class="u-full-width">
        <div id="left">
            <a href="http://147.175.121.210:8233/final_zadanie/?lang=<?php echo $_GET['lang']?>"><button><?php echo DOMOV?></button></a>
        </div>
        <div id="right">
            <a href="http://147.175.121.210:8233/final_zadanie/pastorek/?lang=SK"><button>SK</button></a>
            <a href="http://147.175.121.210:8233/final_zadanie/pastorek/?lang=EN"><button>EN</button></a>
        </div>
    </div>
</header>

<?php #include('./header.php'); ?>
<div class="justify-content-center my-3 pb-5">
    <p class="h3 text-center mb-3"><?php #echo NAMEDAYBYDATE; ?></p>
    <div class="container col-12 mb-3 text-center">
        <div class="form-group">
            <div id="animation" class="scene" style="width:800px;height:150px;margin:auto;"></div>
        </div>
        <div class="form-group">
            <div id="graph" style="width:800px;height:400px;margin:auto;"></div>
        </div>
        <div class="form-group mb-2">
            <label><?php echo TILT ?>:</label>
            <input id="tilt" type="number" class="form-control col-xs-2" min="1" max="5">
        </div>
        <div class="form-group mb-2">
            <label><?php echo SPEED ?>:</label>
            <input id="speed" type="range" min="0" max="10" value="1" class="slider">
            <label id="speedDisplay">5/10</label>
        </div>
        <div class="form-check form-check-inline mb-2">
            <input id="animationCheck" type="checkbox" class="form-check-input" style="margin:auto; margin-right:3px;" onclick="Airplane.animationChange(this);" checked>
            <label class="form-check-label mr-2"><?php echo ANIMATION ?></label>
            <input id="graphCheck" type="checkbox" class="form-check-input" style="margin:auto; margin-right:3px;" onclick="Airplane.graphChange(this);" checked>
            <label class="form-check-label"><?php echo GRAPH ?></label>
        </div>
        <div class="form-group">
            <button id="calculateButton" onclick="Airplane.initConnection();" class="btn btn-primary"><?php echo CALCULATE ?></button>
            <button id="resetButton" onclick="Airplane.reset();" class="btn btn-primary"><?php echo RESET ?></button>
        </div>
    </div>
</div>

<script src="./script.js"></script>
<script>
$(document).ready(function() {
    //$(".nav-item .nav-link").eq(0).addClass("active");
    $("#tilt").attr("min", -Math.round(Math.PI*100/4)/100);
    $("#tilt").attr("max", Math.round(Math.PI*100/4)/100);
    $("#tilt").attr("step", 0.01);
    $("#tilt").attr("value", 0.5);
});
</script>

</body>
</html>