<?php
// Dépendances
require_once('config/config.php');
require_once('services/ServiceStudent.php');

// Récupération des données
$students = ServiceStudent::getAllStudents();

// Affichage des données
require_once('views/students.php');