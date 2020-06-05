<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <title>Tlmenie kolesa</title>
</head>
<body>
<canvas id="ch" width="200" height="200"></canvas>

<form action="">
    <label for="graph">Graph toggle</label>
    <input type="checkbox" name="graph" id="graph" checked>
    <label for="start">Start</label>
    <input type="submit" value="Start" id="btn">
</form>
<script src="forChart.js"></script>
</body>
</html>