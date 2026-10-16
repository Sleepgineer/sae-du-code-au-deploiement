<?php
// Dépendances
require_once('config/config.php');
require_once('services/ServiceStudent.php');

$students = ServiceStudent::getAllStudents();

echo "Réponse sous forme de tableau associatif :";
echo "<pre>";
print_r($students); // Affichage de la réponse dans une forme compréhensible par PHP (tableau associatif)
echo "</pre>";

echo "Réponse sous une forme humainement lisible :<br>";
foreach ($students as $student) {  
  echo $student['name'] . " - " . $student['age'] . " ans<br>"; // Affichage lisible par un humain
}