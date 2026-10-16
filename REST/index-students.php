<?php
$url = "http://localhost:5001/students";  // URL de notre API REST (écrite en Python)
$response = file_get_contents($url);  // récupération du contenu JSON (méthode GET)

echo "<pre>";
echo $response; // Affichage de la réponse
echo "</pre>";