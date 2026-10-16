<?php
$url = "http://localhost:5001/students";  // URL de notre API REST (écrite en Python)
$response = file_get_contents($url);  // récupération du contenu JSON (méthode GET)

echo "Réponse JSON :";
echo "<pre>";
echo $response; // Affichage de la réponse (JSON brut, non exploitable par le PHP)
echo "</pre>";

$students = json_decode($response, true); // Décode le JSON

echo "Réponse sous forme de tableau associatif :";
echo "<pre>";
print_r($students); // Affichage de la réponse dans une forme compréhensible par PHP (tableau associatif)
echo "</pre>";

echo "Réponse sous une forme humainement lisible :<br>";
foreach ($students as $student) {  
  echo $student['name'] . " - " . $student['age'] . " ans<br>"; // Affichage lisible par un humain
}