<?php require_once "../conf.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="./run.js"></script>
        <script>
            var key = "<?php echo $apiKey?>";
        </script>
    </head>
    <body>
        <?php require_once "../header.php"; ?>
        <div class="justify-content-center my-3 pb-5">
            <div class="container col-6 mb-3">
                <div class="form-group text-center">
                    <label for="api">Api</label>
                    <label for="ulohy"><?php echo ULOHY?></label>
                    <label for="kniznice"><?php echo KNIZNICE?></label>
                </div>
                <div class="form-group text-center">
                    <input type="radio" name="doku" id="api" value="api" checked />
                    <input type="radio" name="doku" id="ulohyinp" value="ulohy" />
                    <input type="radio" name="doku" id="knizniceinp" value="kniznice" />
                </div>
                <div class="form-group">
                    <?php if($_GET['lang'] != 'SK') {?>
                    <div id="doku">
                        <pre>
                            <strong>@POST /ajax.php (@Body body)</strong>

                case: body = {                                 api responds 2dim array in format [i][0] first value
                    <strong>action:"kyvadlo"</strong>,                                                        [i][1] second value
                    uhol: [number],                                                          [i][2] time
                    position: [number],                    
                    r: [number],
                    key: [apiKey]
                }  
                    
                case: body = {                                 api responds 2dim array in format [i][0] first value
                    <strong>action:"gulicka"</strong>,                                                            [i][1] second value
                    rychlost: [number],                                                          [i][2] time
                    zrychlenie: [number],                    
                    r: [number],
                    key: [apiKey]
                }

                case: body = {                                 api responds 2dim array in format [i][0] first value
                    <strong>action:"tlmic"</strong>,                                                              [i][1] second value
                    x1: [number],                                                                [i][2] time
                    x1d: [number],
                    x2: [number],
                    x2d: [number],                    
                    r: [number],
                    key: [apiKey]
                }

                case: body = {                                 api responds 2dim array in format [i][0] first value
                    <strong>action:"lietadlo"</strong>,                                                           [i][1] second value
                    theta: [number],                                                             [i][2] time
                    alpha: [number],
                    q: [number],                    
                    r: [number],
                    key: [apiKey]
                }

                case: body = {                                 api responds array of answers
                    <strong>action:"calcul"</strong>,
                    txt: [String],
                    key: [apiKey]
                }

                case: body = {                                 api initiates download of log file [$name] in .pdf format 
                    <strong>action:"pdfLog"</strong>,
                    name: [String],
                    key: [apiKey]
                }

                case: body = {                                 api initiates download of log file [$name] in .csv format 
                    <strong>action:"select"</strong>,
                    name: [String],
                    key: [apiKey]
                }

                case: body = {                                 api responds with statistics of endpoints usage 
                    <strong>action:"statistika"</strong>,
                    lang: [String],
                    key: [apiKey]
                }

                case: body = {                                 api sends email to receiver [$to] 
                    <strong>action:"mail"</strong>,
                    to: [Email],
                    data: [Json string],
                    key: [apiKey]
                }
    </pre>
                    </div>
                    <?php } else {?>
                    <div id="doku">
                        <pre>
                            <strong>@POST /ajax.php (@Body body)</strong>

                case: body = {                                 api odpovedá formou 2 rozmerného poľa vo formáte [i][0] prvá hodnota
                    <strong>action:"kyvadlo"</strong>,                                                                       [i][1] druhá hodnota
                    uhol: [number],                                                                         [i][2] čas
                    position: [number],                    
                    r: [number],
                    key: [apiKey]
                }  
                    
                case: body = {                                 api odpovedá formou 2 rozmerného poľa vo formáte [i][0] prvá hodnota
                    <strong>action:"gulicka"</strong>,                                                                           [i][1] druhá hodnota
                    rychlost: [number],                                                                         [i][2] čas
                    zrychlenie: [number],                    
                    r: [number],
                    key: [apiKey]
                }

                case: body = {                                 api odpovedá formou 2 rozmerného poľa vo formáte [i][0] prvá hodnota
                    <strong>action:"tlmic"</strong>,                                                                             [i][1] druhá hodnota
                    x1: [number],                                                                               [i][2] čas
                    x1d: [number],
                    x2: [number],
                    x2d: [number],                    
                    r: [number],
                    key: [apiKey]
                }

                case: body = {                                 api odpovedá formou 2 rozmerného poľa vo formáte [i][0] prvá hodnota
                    <strong>action:"lietadlo"</strong>,                                                                          [i][1] druhá hodnota
                    theta: [number],                                                                            [i][2] čas
                    alpha: [number],
                    q: [number],                    
                    r: [number],
                    key: [apiKey]
                }

                case: body = {                                 api odpovedá poľom výsledkov pre zadané príklady
                    <strong>action:"calcul"</strong>,
                    txt: [String],
                    key: [apiKey]
                }

                case: body = {                                 api iniciuje sťahovanie logu [$name] v .pdf formáte 
                    <strong>action:"pdfLog"</strong>,
                    name: [String],
                    key: [apiKey]
                }

                case: body = {                                 api iniciuje sťahovanie logu [$name] v .csv formáte 
                    <strong>action:"select"</strong>,
                    name: [String],
                    key: [apiKey]
                }

                case: body = {                                 api vracia štatistiku používania jednotlivých úloh 
                    <strong>action:"statistika"</strong>,
                    lang: [String],
                    key: [apiKey]
                }

                case: body = {                                 api pošle mail príjmaťeľovi [$to] 
                    <strong>action:"mail"</strong>,
                    to: [Email],
                    data: [Json string],
                    key: [apiKey]
                }
    </pre>
                    </div>
                    <?php }?>
                    <div id="ulohy" class="col-5" style="margin: auto;">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?php echo ASSIGMENT; ?></th>
                                    <th scope="col"><?php echo WORKER; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><?php echo TASK1; ?></td>
                                    <td>Straka</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><?php echo TASK2; ?></td>
                                    <td>Pastorek</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td><?php echo TASK3; ?></td>
                                    <td>Štrba</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td><?php echo TASK4; ?></td>
                                    <td>Móricz</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td><?php echo TASK5; ?></td>
                                    <td>Straka</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td><?php echo TASK6; ?></td>
                                    <td>Pastorek, Móricz</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td><?php echo TASK7; ?></td>
                                    <td>Štrba</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td><?php echo TASK8; ?></td>
                                    <td>Móricz</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td><?php echo TASK9; ?></td>
                                    <td>Pastorek</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td><?php echo TASK10; ?></td>
                                    <td>Štrba</td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td><?php echo TASK11; ?></td>
                                    <td>Straka</td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td><?php echo TASK12; ?></td>
                                    <td>Straka</td>
                                </tr>
                                <tr>
                                    <th scope="row">13</th>
                                    <td><?php echo TASK13; ?></td>
                                    <td>Móric</td>
                                </tr>
                                <tr>
                                    <th scope="row">14</th>
                                    <td><?php echo TASK14; ?></td>
                                    <td>Straka, Pastorek, Móricz, Štrba</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="kniznice" class="col-5" style="margin: auto;">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?php echo LIBRARY; ?></th>
                                    <th scope="col"><?php echo USAGE; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Html2pdf</td>
                                    <td><?php echo LIBRARY1; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>phpMailer</td>
                                    <td><?php echo LIBRARY2; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>CanvasJS</td>
                                    <td><?php echo LIBRARY3; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>three</td>
                                    <td><?php echo LIBRARY4; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Plotly</td>
                                    <td><?php echo LIBRARY5; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button id="btn" class="btn btn-primary">Export</button>
                </div>
            </div>
        </div>
        <?php require_once "../footer.php"; ?>
        <script>
            $(document).ready(function () {
                $(".nav-link").eq(0).addClass("active");
            });
        </script>
    </body>
</html>
