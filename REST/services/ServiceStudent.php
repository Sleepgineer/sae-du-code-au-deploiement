<?php

class ServiceStudent {
    public static function getAllStudents() {
        $url = API_BASE_URL . "/students";  // construction de l'URL à partir de la config
        $response = file_get_contents($url);  // récupération du contenu JSON (méthode GET)
        return json_decode($response, true); // Décode le JSON
    }

    public static function addStudent(string $name, int $age) {
        $url = API_BASE_URL . "/students";
        $student = ['name' => $name, 'age' => $age];
        $options = [
            'http' => [
                'method'        => 'POST',
                'header'        => "Content-Type: application/json\r\nAccept: application/json\r\n",
                'content'       => json_encode($student),
                'ignore_errors' => true,
            ],
        ];

        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        return json_decode($response, true);
    }
}