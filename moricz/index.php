<!doctype html>
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
    <title>Tlmenie kolesa</title>
    <style>
        .center{
            display: flex;
            justify-content: center;
        }
        canvas{
            width: 50rem;
            height: 400px;
        }
    </style>
</head>
<body>

<div class="center">
<canvas id="chart1" ></canvas>
<canvas id="chart2"></canvas>
</div>

<form action="">
    <label for="graph">Graph toggle</label>
    <input type="checkbox" name="graph" id="graph" checked>

    <label for="rSize">Väľkosť prekážky</label>
    <input type="number" step="0.1" id="rSize" name="r" value="0">

    <label for="start">Start</label>
    <input type="submit" value="Start" id="btn">
</form>
<input type="hidden" value="0" id="x1">
<input type="hidden" value="0" id="x1d">
<input type="hidden" value="0" id="x2">
<input type="hidden" value="0" id="x2d">
<script src="forChart.js"></script>
</body>
</html>