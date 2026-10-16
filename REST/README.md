
Ce répertoire contient la partie REST réalisée dans le cadre de la SAÉ "Du code au déploiement".

Une API REST permet d'exposer une API (Application Programming Interface) de manière légère, en s'appuyant sur un style d'architecture basé sur le protocole HTTP.
Par exemple, on utilise GET pour récupérer des données et POST pour en créer.
Dans ce répertoire, on utilise pour commencer une API REST créée en Python avec Flask : un framework pour gérer le routage et les requêtes dans l'API. Elle permet aussi
la sérialisation de listes ou d'objets.

Cette API REST reprend le même exemple que celui utilisé dans le répertoire SOAP..

Un premier exemple d'interopérabilité se trouve dans le fichier index-students.php qui fait appel à l'API REST écrite en Python.
Différents dossiers sont également à disposition pour séparer les usages et fonctions, afin de faciliter la maintenance. Cela inclut :
- config : configuration centralisée pour éviter de modifier l'URL plusieurs fois (ou d'autres paramètres) en cas de changement
- services : décrit les services réalisés sous forme de classes
- views : contient la logique HTML et l'affichage