<?php
    if($_GET['lang'] == 'SK') require_once "./lang/lang_sk.php";
    else require_once "./lang/lang_en.php";

    require_once "../conf.php";
    if($kyvadlo_speed < 0) $kyvadlo_speed = 0;
    else if($kyvadlo_speed > 1000)$kyvadlo_speed = 1000;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
    <link rel="stylesheet" href="style.css">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script>
            var key ="<?php echo $apiKey?>";
        </script>
    <script src="./run.js"></script>
    <style>
        label{
            margin-right:30px;
        }
        input{
            margin-right:50px;
        }
    </style>
</head>
<body>
<header>
        <div id="nav" class="u-full-width">
            <div id = "left">
                <a href="http://147.175.121.210:8233/final_zadanie/?lang=<?php echo $_GET['lang']?>"><button><?php echo DOMOV?></button></a>
            </div>
            <div id="right">
                <a href="http://147.175.121.210:8233/final_zadanie/dokumentacia?lang=SK"><button>SK</button></a>
                <a href="http://147.175.121.210:8233/final_zadanie/dokumentacia?lang=EN"><button>EN</button></a>
            </div>
        </div>
    </header>
    <div style="margin: 0 auto; width:300px; height:20px">
    <label for="api">Api</label>
    <label for="ulohy"><?php echo ULOHY?></label>
    <label for="kniznice"><?php echo KNIZNICE?></label>
    </div>
    <br>
    <div style="margin: 0 auto; width:300px">
    <input type="radio" name="doku" id="api" value="api" checked>
    <input type="radio" name="doku" id="ulohyinp" value="ulohy">
    <input type="radio" name="doku" id="knizniceinp" value="kniznice">
    </div>
    <br>
    <?php if($_GET['lang'] != 'SK') {?>
    <div id='doku'> 
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
    <div id='doku'>            
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

            <?php if($_GET['lang'] != 'SK') {?>
                <BR>
        <div id ="ulohy">
        <table id ="ulohy" style="margin: 0 auto;">
        <thead>
            <th>Assignment</th>
            <th>Worker</th>
        </thead>
        <tbody>
            <tr>
                <td>Multi language</td><td>Straka</td>
            </tr>
            <tr>
                <td>CAS</td><td>Pastorek, Móricz</td>
            </tr>
            <tr>
                <td>ApiKey</td><td>Štrba</td>
            </tr>
            <tr>
                <td>CAS form</td><td>Móricz</td>
            </tr>
            <tr>
                <td>Logs</td><td>Pastorek</td>
            </tr>
            <tr>
                <td>Downloading</td><td>Štrba</td>
            </tr>
            <tr>
                <td>Pdf</td><td>Straka</td>
            </tr>
            <tr>
                <td>Mail</td><td>Straka</td>
            </tr>
            <tr>
                <td>Documentation</td><td>Móric</td>
            </tr>
            <tr>
                <td>Mail</td><td>Móricz</td>
            </tr>
            <tr>
                <td>Front end</td><td>Straka, Pastorek, Móricz, Štrba</td>
            </tr>
        </tbody>
        </table>
            </div>
            <?php } else {?>
    <BR>
    <div id ="ulohy">
    <table style="margin: 0 auto;">
        <thead>
            <th>Zadanie</th>
            <th>Vypracoval</th>
        </thead>
        <tbody>
            <tr>
                <td>Viacjazyčnosť</td><td>Straka</td>
            </tr>
            <tr>
                <td>CAS</td><td>Pastorek, Móricz</td>
            </tr>
            <tr>
                <td>ApiKey</td><td>Štrba</td>
            </tr>
            <tr>
                <td>CAS formulár</td><td>Móricz</td>
            </tr>
            <tr>
                <td>Logy</td><td>Pastorek</td>
            </tr>
            <tr>
                <td>Stahovanie súborov</td><td>Štrba</td>
            </tr>
            <tr>
                <td>Pdf</td><td>Straka</td>
            </tr>
            <tr>
                <td>Mail</td><td>Straka</td>
            </tr>
            <tr>
                <td>Dokumentácia</td><td>Móricz</td>
            </tr>
            <tr>
                <td>Mail</td><td>Móricz</td>
            </tr>
            <tr>
                <td>Front end</td><td>Straka, Pastorek, Móricz, Štrba</td>
            </tr>
        </tbody>
        </table>
            </div>  
        <?php }?>

            <?php if($_GET['lang'] != 'SK') {?>
                <BR>
        <div id ="kniznice">        
        <table  style="margin: 0 auto;">
        <thead>
            <th>Library</th>
            <th>Usage</th>
        </thead>
        <tbody>
            <tr>
                <td>Html2pdf</td><td>Creating pdf documents</td>
            </tr>
            <tr>
                <td>phpMailer</td><td>Sending emails via Gmail SMTP</td>
            </tr>
            <tr>
                <td>CanvasJS</td><td>Drawing charts</td>
            </tr>
        </tbody>
        </table>
            </div>
            <?php } else {?>
        <BR>
        <div id ="kniznice"> 
        <table  style="margin: 0 auto;">
        <thead>
            <th>Knižnice</th>
            <th>Použitie</th>
        </thead>
        <tbody>
            <tr>
                <td>Html2pdf</td><td>Vytváranie pdf dokumentov</td>
            </tr>
            <tr>
                <td>phpMailer</td><td>Posielanie emailov cez gmail SMTP</td>
            </tr>
            <tr>
                <td>CanvasJS</td><td>Vykresľovanie grafov</td>
            </tr>
        </tbody>
        </table>
            </div>
    <?php }?>
    <button id="btn" style="margin: 0 auto; display:block; margin-bottom: 20px">Export</button>
</body>
</html>