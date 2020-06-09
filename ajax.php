<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

require __DIR__.'/vendor/autoload.php';
require_once "./conf.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Spipu\Html2Pdf\Html2Pdf;

if($_POST['key'] != $apiKey) {
  header('HTTP/1.0 401 Unauthorized');
  http_response_code (401);
  exit;
}

if (is_ajax()) {
  if (isset($_POST["action"]) && !empty($_POST["action"])) { 
    $action = $_POST["action"];
    switch($action) { 
      case "kyvadlo": kyvadlo($_POST['uhol'],$_POST['position'],$_POST['r']); break;
      case "gulicka": gulicka($_POST['rychlost'],$_POST['zrychlenie'],$_POST['r']); break;
      case "tlmic": tlmic($_POST['x1'],$_POST['x1d'],$_POST['x2'],$_POST['x2d'],$_POST['r']); break;
      case "lietadlo": lietadlo($_POST['naklon1'], $_POST['naklon2']); break;
      case "calcul": calcul($_POST['txt']); break;
      case "pdfLog": pdf_download($_POST['name']); break;
      case "docexp": pdf_doc($_POST['name'],$_POST['txt'] ); break;
      case "statistika": statistika($_POST['lang']); break;
      case "mail": sendMail($_POST['to'],$_POST['data']); break;
      case 'select': array_to_csv_download($_POST['name']); break;
      default: 
        header('HTTP/1.0 401 Bad Request');
        http_response_code (400);
        exit;
    }
  }
}

function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

  function kyvadlo($uhol,$position,$r){
    $command = 'octave -q ./scripts/kyvadlo.txt '.$position.' '.$uhol.' '.$r.' 2>&1|  tr -s " " ';
    exec($command , $output , $return_var);
    $outputt = array();
    $count = 0;
    $tmp = -1;
    for ($i = 0; $i <= count($output)-1; $i++) {
      if($output[$i] == "") continue;
      if($output[$i] == "ans =" ) {
        $count = 0;
        $tmp += 1;
        continue;
      }
      $outputt[$count][$tmp] = $output[$i];
      $count += 1;
    }
    $result = "OK";
    if(substr( $output[0], 0, 6 ) === "error:"){
      $result = "ERROR: ".$return_var." ";
      foreach($output as $out){
        $result = $result.$out;
      }
    }
    logData("kyvadlo", array($uhol, $position, $r,"",""), $result);
    echo json_encode($outputt);
  }

  function gulicka($rychlost,$zrychlenie, $r){
    $command = 'octave -q ./scripts/gulicka.txt '.$rychlost.' '.$zrychlenie.' '.$r.' 2>&1|  tr -s " " ';
    exec($command , $output , $return_var);
    $outputt = array();
    $count = 0;
    $tmp = -1;
    for ($i = 0; $i <= count($output)-1; $i++) {
      if($output[$i] == "") continue;
      if($output[$i] == "ans =" ) {
        $count = 0;
        $tmp += 1;
        continue;
      }
      $outputt[$count][$tmp] = $output[$i];
      $count += 1;
    }
    $result = "OK";
    if(substr( $output[0], 0, 6 ) === "error:"){
      $result = "ERROR: ".$return_var." ";
      foreach($output as $out){
        $result = $result.$out;
      }
    }
    logData("gulicka", array($rychlost, $zrychlenie, $r,"",""), $result);
    echo json_encode($outputt);
  }

  function tlmic($x1,$x1d, $x2, $x2d, $r){
    $command = 'octave -q ./scripts/tlmenie.txt '.$x1.' '.$x1d.' '.$x2.' '.$x2d.' '.$r.' 2>&1|  tr -s " " ';
    exec($command , $output , $return_var);
    $outputt = array();
    $count = 0;
    $tmp = -1;
    for ($i = 0; $i <= count($output)-1; $i++) {
      if($output[$i] == "") continue;
      if($output[$i] == "ans =" ) {
        $count = 0;
        $tmp += 1;
        continue;
      }
       $outputt[$count][$tmp] = $output[$i];
      $count += 1;
    }
    $result = "OK";
    if(substr( $output[0], 0, 6 ) === "error:"){
      $result = "ERROR: ".$return_var." ";
      foreach($output as $out){
        $result = $result.$out;
      }
    }
    logData("tlmic", array($x1, $x1d, $x2, $x2d, $r), $result);
    echo json_encode($outputt);
  }

  function lietadlo($naklon1, $naklon2){
    if(!is_numeric($naklon1) || $naklon1 < -round(pi()/4, 2) && $naklon1 > round(pi()/4, 2)) $naklon1 = 0.5;
    if(!is_numeric($naklon2) || $naklon2 < -round(pi()/4, 2) && $naklon2 > round(pi()/4, 2)) $naklon2 = 0.5;

    $command = 'octave -q ./scripts/lietadlo.txt '.$naklon1.' '.$naklon2.' 2>&1|  tr -s " " ';
    exec($command , $output , $return_var);

    $data = array();
    $count = 0;
    $tmp = -1;
    for ($i = 0; $i <= count($output)-1; $i++) {
      if($output[$i] == "") continue;
      if($output[$i] == "ans =" ) {
        $count = 0;
        $tmp++;
        continue;
      }
      $data[$count][$tmp] = $output[$i];
      $count += 1;
    }

    $result = "OK";
    if(substr( $output[0], 0, 6 ) === "error:"){
      $result = "ERROR: ".$return_var." ";
      foreach($output as $out){
        $result = $result.$out;
      }
    }
    
    logData("lietadlo", array($naklon1, $naklon2), $result);
    echo json_encode($data);
  }

  function calcul($eval){
    $myfile = fopen("./scripts/test.txt", "w") or die("Unable to open file!");
    $txt = $eval;
    fwrite($myfile, $txt);
    fclose($myfile);
    
    $command = 'octave -q ./scripts/test.txt ';
    exec($command , $output , $return_var);
    $result = "OK";
    if(substr( $output[0], 0, 6 ) === "error:"){
      $result = "ERROR: ".$return_var." ";
      foreach($output as $out){
        $result = $result.$out;
      }
    }
    logData("calcul", array($eval,"","","",""), $result);
    echo json_encode($output);
  }

  function logData($name, $vars, $status){

    $logData = array ();
    array_push($logData, date("F j, Y, g:i a"));
    array_push($logData, $name);
    foreach($vars as $var){
      array_push($logData, $var);
    } 
    array_push($logData, $status);
    $fp = fopen('./logs/'.date("Ymd").'.csv', 'a');
  
    fputcsv($fp, $logData, ",", '"');
    
    fclose($fp);
  }

  
function array_to_csv_download($name) {
  header('Content-Type: application/csv');
  header('Content-Disposition: attachment; filename="'.$name.'";');
  header('Expires: 0');
  header('FileName: '.$name);
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  readfile('./logs/'.$name);
} 

function statistika($lang) {
  $kyvadlo = 0;
  $lietadlo = 0;
  $calcul = 0;
  $tlmic = 0;
  $gula = 0;

  $arr = scandir("./logs");

  foreach($arr as $file){
    if($file == '.' || $file == '..' ) continue;
    $file = fopen('./logs/'.$file, 'r');
    while (($line = fgetcsv($file)) !== FALSE) {
      
      if($line[1] == "kyvadlo") $kyvadlo +=1 ;
      if($line[1] == "lietadlo") $lietadlo +=1 ;
      if($line[1] == "calcul") $calcul +=1 ;
      if($line[1] == "tlmic") $tlmic +=1 ;
      if($line[1] == "gulicka") $gula +=1 ;
    }
    fclose($file);
  }

  $out = array();
  if($lang == 'SK'){
    array_push($out, array('y'=>$kyvadlo , 'label'=> "Kyvadlo" ));
    array_push($out, array('y'=>$lietadlo , 'label'=> "Lietadlo" ));
    array_push($out, array('y'=>$calcul , 'label'=> "Calcul" ));
    array_push($out, array('y'=>$tlmic , 'label'=> "Tlmic" ));
    array_push($out, array('y'=>$gula , 'label'=> "Gulôčka" ));
  } else {
    array_push($out, array('y'=>$kyvadlo , 'label'=> "Pendulum" ));
    array_push($out, array('y'=>$lietadlo , 'label'=> "Plane" ));
    array_push($out, array('y'=>$calcul , 'label'=> "Calcul" ));
    array_push($out, array('y'=>$tlmic , 'label'=> "Suspension" ));
    array_push($out, array('y'=>$gula , 'label'=> "Ball" ));
  }
  echo json_encode($out);
} 

function pdf_download($name) {
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="'.$name.'";');
  header('Expires: 0');
  header('FileName: '.substr($name, 0, -3).'pdf');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');

  
  $content = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
			"http://www.w3.org/TR/html4/loose.dtd">
			<html>
			<head>
			<title>User Information Template</title></head>
			<body>';
  $content.= '<table border="1" cellpadding="0" cellspacing="0" style="width:500px;border:1px dotted #ccc;margin-top:0;margin-left:auto;margin-right:auto;font-family:arial;margin-bottom:10px;" >';

  $file = fopen('./logs/'.$name, 'r');
  while (($line = fgetcsv($file)) !== FALSE) {
    $content .= "<tr>";
    foreach($line as $d){
      $content .= '<td style="width: 100px;font-family:arial;font-weight:bold;font-size:14px;color:#666;"td>'.$d.'</td>';
    } 
    $content .= "</tr>";
  }
  fclose($file);

  $content .= "</table>";
  $content.='</body></html>';

  $html2pdf = new Html2Pdf('L', 'A4', 'en', false, 'UTF-8', array(5, 5, 5, 8), true);
  $html2pdf->writeHTML($content);
  $tetst =$html2pdf->output(substr($name, 0, -3).'pdf', 'S');
  
  echo $tetst;
  } 

function sendMail($to, $data){
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->Mailer = "smtp";

  $mail->SMTPDebug  = 1;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = "wtech.finzadanie@gmail.com";
  $mail->Password   = "htaccess123";

  $mail->IsHTML(true);
  $mail->AddAddress($to);
  $mail->SetFrom("wtech.finzadanie@gmail.com");
  $mail->Subject = "Wtech statistika navsetevnosti";
  $data = json_decode($data);
  $content = '<table><thead><th>Uloha</th><th>Pocet kliknuti</th></thead><tbody></tbody>';
  foreach($data as $d){
    $content .= "<tr><td>".$d->label."</td><td>".$d->y."</td></tr>";
  }
  $content .= "</tbody></table>";
  ob_clean();
  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
  } else {
    echo "Email sent successfully";
  }
}

function pdf_doc($name, $txt) {
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="'.$name.'";');
  header('Expires: 0');
  header('FileName: '.$name.'.pdf');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');

  $txt = '<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
     <style>
     body {
      font-family: freesans;
    }
    table, td, th{
      border:1px solid black;
      cellpadding:0;
      cellspacing:0;
      border-collapse:collapse;
    }
     </style>
  </head>
  <body>'.$txt.'</body></html>';
  $html2pdf = new Html2Pdf('P', 'A3', 'cs', true, 'UTF-8', array(5, 5, 5, 8), true);
  //$html2pdf->addFont('myfont', '', '/home/ondro/workspace/wtech2/final_zadanie/vendor/tecnickcom/tcpdf/fonts/myfont.php' );
  //$html2pdf->setDefaultFont('freesans'); 
  $html2pdf->writeHTML($txt);
  $tetst =$html2pdf->output(substr($name, 0, -3).'pdf', 'S');
  
  echo $tetst;
  } 
?>