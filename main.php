<?php



function format_xml($input) {

  $domxml = new DOMDocument('1.0');
  $domxml->preserveWhiteSpace = false;
  $domxml->formatOutput = true;
  $domxml->loadXML($input);
  return $domxml->saveXML();
}

if(isset($_POST['parties'])) {

  $codeContent   = $_POST['code'];
  $titreContent   = $_POST['titre'];
  $dateContent    = explode("-", $_POST['date']);
  $partiesContent = $_POST['parties'];

 $nomMois = [ "01" => "janvier",   "02" => "fevrier",   "03" => "mars",   "04" => "avril",   "05" => "mais",   "06" => "juin",   "07" => "juillet",   "08" => "aout",   "09" => "septembre",   "10" => "octobre",   "11" => "novembre",   "12" => "decembre"];


  $exam = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8' standalone='no'?><!DOCTYPE examen SYSTEM 'examen.dtd'><examen></examen>");

  

  $exam->addAttribute('codeMatier', $codeContent);
  $exam->addChild("titre", $titreContent);
  $date = $exam->addChild("date");
  $date->addAttribute('annee', "$dateContent[0]");
  $date->addAttribute('mois', $nomMois[$dateContent[1]]);

  $quesions = $exam->addChild("quesions");


  for($i = 0; $i < sizeof($partiesContent); $i++) {
      $quesion = $quesions->addChild('quesion');
      for($j = 0; $j < sizeof($partiesContent[$i]); $j++) {
        $quesion->addChild('partie', $partiesContent[$i][$j]);
      }
  }


  $file = fopen("conf/examen.xml", "w") or die("Fichier introuvable!");
  fwrite($file, format_xml($exam->asXML()));
  fclose($file);

} else {
  header('Location: professeur.php');
  exit;
}
?>