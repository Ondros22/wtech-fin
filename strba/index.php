
<?php require_once "../conf.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo PENDULUM_TITLE ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>
            var key = "<?php echo $apiKey?>";
        </script>
        <script src="./JScript.js"></script>
    </head>
    <body>
        <?php require_once "../header.php"; ?>
        <div class="justify-content-center my-3 pb-5">
            <div class="container col-8 mb-3 text-center">
                <svg id="scene" viewBox="0 0 100 100" width="100%" height="200px">
                    <line id="string" x1="0" y1="100" x2="0" y2="70" stroke="black" stroke-width="4"></line>
                    <line id="BEAM" x1="-40" y1="70" x2="40" y2="70" stroke="grey" stroke-width="4" style="transform-origin: 0px 70px;"></line>
                    <circle id="gulicka" cx="0" cy="64" r="3" stroke="black" stroke-width="1" fill="red" style="transform-origin: 0px 64px;" />
                </svg>
                <div id="grafy" class="row" style="margin-left:0px; margin-right:0px;">
                    <div id="chart1" class="col-6" style="padding:0px;"></div>
                    <div id="chart2" class="col-6" style="padding:0px;"></div>
                </div>

                <form action="" class="mt-3">
                    <label for="r">Zadajte r(nová poloha Guličky [-25,25])</label>
                    <input type="number" min="-25" max="25" name="r" id="r" value="0" />

                    <label for="rychlost">Rychlost</label>
                    <input type="number" min="0" max="1" name="rychlost" id="rychlost" value="0" />

                    <label for="zrychlenie">Zrychlenie</label>
                    <input type="number" min="0" max="1" name="zrychlenie" id="zrychlenie" value="0" />

                    <label for="angle">Spomalenie animácie</label>
                    <input type="range" min="0" max="1000" value="0" class="slider" id="myRange" />

                    <label for="animacia">Animacia</label>
                    <input type="checkbox" name="animacia" id="animacia" checked="" />
                    <label for="graf">Graf</label>
                    <input type="checkbox" name="graf" id="graf" checked="" />

                    <button id="btn" type="submit" name="btn" class="btn btn-primary">Start</button>
                </form>

                <span
                    style="
                        position: absolute;
                        left: 0px;
                        top: -20000px;
                        padding: 0px;
                        margin: 0px;
                        border: none;
                        white-space: pre;
                        line-height: normal;
                        font-family: Helvetica, sans-serif;
                        font-size: 10px;
                        font-weight: normal;
                        display: none;
                    "
                >
                    Mpgyi
                </span>
            </div>
        </div>
        <?php require_once "../footer.php"; ?>
        <script>
            $(document).ready(function () {
                $(".nav-link").eq(5).addClass("active");
            });
        </script>
    </body>
</html>
