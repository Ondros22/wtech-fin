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
        body{
            font-size: 120%;
            background: #F8F8FF;
        }
        .center{
            display: flex;
            justify-content: center;
        }
        .left{
            float: left;
            margin-left: 3%;
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
        .error{
            background-color: red;
            color: white;
        }
        #error{
            margin-top: 10px;
            padding: 5px;
            visibility: hidden;
        }
        #btn{
            margin-top: 10px;
        }
        .btn{
            margin-top: 10px;
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #5F9EA0;
            border: none;
            border-radius: 5px;
        }
        .input-group label {
            display: block;
            text-align: center;
            margin: 3px;
        }
        .input-group input {
            height: 30px;
            width: 93%;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
        }
        .main{
            padding: 20px;
            border: 1px solid #B0C4DE;
            background: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<header>
    <div class="left">
<a><button class="btn">Ondro sem treba dat home button</button> </a>
    </div>
    <div class="right">
    <a href="https://147.175.121.210:4497/skuska_spolu/moricz/?lang=SK"><button class="btn">SK</button></a>
    <a href="https://147.175.121.210:4497/skuska_spolu/moricz/?lang=EN"><button class="btn">EN</button></a>
    </div>
</header>

<div class="main">
<div class="center" id="anime">
    <canvas id="animation" width="300" height="200" style="border: 1px black solid"></canvas>
</div>

<div class="chart-container center" >
    <canvas id="chart1"></canvas>
    <canvas id="chart2"></canvas>
</div>

<div class="center">
<form action="" name="myForm">
    <div class="input-group">
    <label for="graph"><?php echo GRAPH;?></label>
    <input type="checkbox" name="graph" id="graph" checked>
    </div>

    <div class="input-group">
    <label for="suspensionAnime"><?php echo ANIMATION;?></label>
    <input type="checkbox" name="suspensionAnime" id="suspensionAnime" checked>
    </div>

     <div class="input-group">
    <label for="rSize"><?php echo OBSTACLE;?></label>
    <input type="number" step="0.1" id="rSize" name="r" value="0">
     </div>

    <div class="center">
    <label for="start"></label>
    <input type="submit" value="Start" id="btn" class="btn">
    </div>
</form>
</div>
<div class="center">
    <span class="error" id="error"><?php echo ERROR;?></span>
</div>
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