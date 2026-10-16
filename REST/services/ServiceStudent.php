<?php

class ServiceStudent {
    public static function getAllStudents() {
        $url = API_BASE_URL . "/students";  // construction de l'URL à partir de la config
        $response = file_get_contents($url);  // récupération du contenu JSON (méthode GET)
        return json_decode($response, true); // Décode le JSON
    }
}