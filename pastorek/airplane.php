<?php

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$tilt1 = 0.5;
$tilt2 = 0.5;

if(is_numeric($_GET["tilt1"]) && $_GET["tilt1"] >= -round(pi()/4, 2) && $_GET["tilt1"] <= round(pi()/4, 2)) $tilt1 = $_GET["tilt1"];
if(is_numeric($_GET["tilt2"]) && $_GET["tilt2"] >= -round(pi()/4, 2) && $_GET["tilt2"] <= round(pi()/4, 2)) $tilt2 = $_GET["tilt2"];
if(is_numeric($_GET["speed"]) && $_GET["speed"] >= 1 && $_GET["speed"] <= 5) $speed = $_GET["speed"];

$file = file_get_contents('./lietadlo.txt', true);

$command = "octave --no-gui --quiet --eval \"pkg load control;r1 = ".$tilt1.";r2 = ".$tilt2.";";
$command .= implode("", $commands);
$command .= "\"";

$output = ltrim(shell_exec($command));
$output = trim(preg_replace("/[[:cntrl:]]+/", "", $output));

$variableRegex = "(t = )([0-9.e+\- ]*)|(x1 = )([0-9.e+\- ]*)|(y1 = )([0-9.e+\- ]*)|(x2 = )([0-9.e+\- ]*)|(y2 = )([0-9.e+\- ]*)";
preg_match_all("/".$variableRegex."/", $output, $matches, PREG_PATTERN_ORDER);

$t = explode(" ", trim($matches[2][0]));
$t = array_filter($t, function($value){
    if(floatval($value)) return floatval($value);
    else return false;
});
$t = array_map(function($value){
    return floatval($value);
}, $t);

$x1 = explode(" ", trim($matches[4][1]));
$x1 = array_filter($x1, function($value){
    if(floatval($value)) return floatval($value);
    else return false;
});
$x1 = array_map(function($value){
    return floatval($value);
}, $x1);

$y1 = explode(" ", trim($matches[6][2]));
$y1 = array_filter($y1, function($value){
    if(floatval($value)) return floatval($value);
    else return false;
});
$y1 = array_map(function($value){
    return floatval($value);
}, $y1);

$x2 = explode(" ", trim($matches[8][3]));
$x2 = array_filter($x2, function($value){
    if(floatval($value)) return floatval($value);
    else return false;
});
$x2 = array_map(function($value){
    return floatval($value);
}, $x2);

$y2 = explode(" ", trim($matches[10][4]));
$y2 = array_filter($y2, function($value){
    if(floatval($value)) return floatval($value);
    else return false;
});
$y2 = array_map(function($value){
    return floatval($value);
}, $y2);

$arraySize = count($t);
$i = 0;
while($i < $arraySize){
    clearstatcache();

    $data = array(
        "t" => array_values($t)[$i],
        "x1" => array_values($x1)[$i],
        "y1" => array_values($y1)[$i],
        "x2" => array_values($x2)[$i],
        "y2" => array_values($y2)[$i]
    );
    $i++;
    echo "data: ".json_encode($data);
    echo "\n\n";

    ob_end_flush();
    flush();
    usleep(1000*(1024/pow(2, ($speed - 1))));
}

?>