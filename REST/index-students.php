<?php

require_once 'config/config.php';
require_once 'services/ServiceStudent.php';

/* Gestion du POST */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $prenom = $_POST['name'];
  $age = $_POST['age'];

  ServiceStudent::addStudent($prenom, $age);

  // Redirection anti-doublon (PRG pattern)
  header('Location: index-students.php');
  exit;
}

/* Récupération des données */
$students = ServiceStudent::getAllStudents();

/* Affichage des données */
require_once 'views/students.php';