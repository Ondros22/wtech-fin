<!doctype html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

if($_GET['lang'] == 'SK') require_once "./lang/lang_sk.php";
else require_once "./lang/lang_en.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script>
    <script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.7"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://unpkg.com/fabric@4.0.0-beta.8/dist/fabric.js"></script>
    <title>Tlmenie kolesa</title>
    <style>

        .center{
            display: flex;
            justify-content: center;
        }

        .chart-container {
            position: relative;
            margin: auto;
            height: 30vh;
            width: 30vw;
        }
        .right{
            float: right;
            margin-right: 3%;
        }
        .right:after{
            content: "";
            clear: both;
        }

    </style>
</head>
<body>
<header>
    <div class="right">
    <a href="https://147.175.121.210:4497/skuska_spolu/moricz/?lang=SK"><button>SK</button></a>
    <a href="https://147.175.121.210:4497/skuska_spolu/moricz/?lang=EN"><button>EN</button></a>
    </div>
</header>

<div class="center" id="anime">
    <canvas id="animation" width="300" height="200" style="border: 1px black solid"></canvas>
</div>

<div class="chart-container center" >
    <canvas id="chart1"></canvas>
    <canvas id="chart2"></canvas>
</div>

<div class="center">
<form action="">
    <label for="graph"><?php echo GRAPH;?></label>
    <input type="checkbox" name="graph" id="graph" checked>

    <label for="suspensionAnime"><?php echo ANIMATION;?></label>
    <input type="checkbox" name="suspensionAnime" id="suspensionAnime" checked>


    <label for="rSize"><?php echo OBSTACLE;?></label>
    <input type="number" step="0.1" id="rSize" name="r" value="0">

    <label for="start"></label>
    <input type="submit" value="Start" id="btn">
</form>
</div>

<input type="hidden" value="0" id="x1">
<input type="hidden" value="0" id="x1d">
<input type="hidden" value="0" id="x2">
<input type="hidden" value="0" id="x2d">
<input type="hidden" value="<?php echo UPPER?>" id="upperko">
<input type="hidden" value="<?php echo LOWER?>" id="lowerko">
<input type="hidden" value="<?php echo SUSPENSION?>" id="suspi">

<script src="forChart.js"></script>
</body>
</html>