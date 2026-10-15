<?php

$wsdl = "http://localhost:8000/?wsdl";

try {
    $client = new SoapClient($wsdl, [
        'trace' => 1,
        'exceptions' => true,
        'cache_wsdl' => WSDL_CACHE_NONE
    ]); // nouveau client SOAP

    // Récupérer tous les étudiants
    $rep = $client->get_all_students();
    $etudiants = $rep->get_all_studentsResult ?? [];

    if (!is_array($etudiants) && !($etudiants instanceof Traversable)) {
        $etudiants = $etudiants ? [$etudiants] : [];
    }

    foreach ($etudiants as $e) {
        echo "Étudiant : {$e->id}, {$e->name}, {$e->age} ans<br>";
    }

    // Récupérer l'étudiant d'id 1
    $rep = $client->get_student(['id' => 1]);
    $e = $rep->get_studentResult ?? null;

    if ($e && isset($e->id)) {
        echo "Étudiant : {$e->id}, {$e->name}, {$e->age} ans";
    } else {
        echo "Étudiant introuvable";
    }

} catch (SoapFault $e) {
    echo "Erreur SOAP : " . $e->getMessage();
}
