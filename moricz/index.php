<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    require_once "../conf.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo SUSPENSION_TITLE; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <link rel="stylesheet" href="./style.css" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script>
        <script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.7"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="https://unpkg.com/fabric@4.0.0-beta.8/dist/fabric.js"></script>
    </head>
    <body>
        <?php require_once "../header.php"; ?>
        <div class="justify-content-center my-3 pb-5">
            <div class="container col-8 mb-3 text-center">

                <div class="center" id="anime">
                    <canvas id="animation" width="300" height="200" style="border: 1px black solid;"></canvas>
                </div>

                <div class="chart-container center">
                    <canvas id="chart1"></canvas>
                    <canvas id="chart2"></canvas>
                </div>

                <div class="center">
                    <form action="" name="myForm">
                        <div class="form-group mb-2">
                            <label for="graph"><?php echo GRAPH;?></label>
                            <input type="checkbox" name="graph" id="graph" checked />
                        </div>

                        <div class="form-group mb-2">
                            <label for="suspensionAnime"><?php echo ANIMATION;?></label>
                            <input type="checkbox" name="suspensionAnime" id="suspensionAnime" checked />
                        </div>

                        <div class="form-group mb-2">
                            <label for="rSize"><?php echo OBSTACLE;?></label><br>
                            <input type="number" step="0.1" id="rSize" name="r" value="0" />
                        </div>

                        <div class="center">
                            <button id="btn" type="submit" class="btn btn-primary">Start</button>
                        </div>
                    </form>
                </div>
                <div class="center">
                    <span class="error" id="error"><?php echo ERROR;?></span>
                </div>

                <input type="hidden" value="0" id="x1" />
                <input type="hidden" value="0" id="x1d" />
                <input type="hidden" value="0" id="x2" />
                <input type="hidden" value="0" id="x2d" />
                <input type="hidden" value="<?php echo UPPER?>" id="upperko" />
                <input type="hidden" value="<?php echo LOWER?>" id="lowerko" />
                <input type="hidden" value="<?php echo SUSPENSION?>" id="suspi" />
            </div>
        </div>
        <?php require_once "../footer.php"; ?>
        <script src="forChart.js"></script>
        <script>
            $(document).ready(function () {
                $(".nav-link").eq(4).addClass("active");
            });
        </script>
    </body>
</html>

